<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AssetRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Category;
use App\Models\Location;
use App\Models\Condition;
use App\Models\Manufacturer;
use App\Models\ModelM;
use App\Models\Supplier;
use App\Models\Asset;
use App\Services\DepartmentDataService;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AssetsImport;
use Illuminate\Support\Facades\Log;
use App\Models\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $departmentDataService;
    public function __construct(DepartmentDataService $departmentDataService)
    {
        $this->departmentDataService = $departmentDataService;
    }
    public function index(): View
    {
        $assets = Asset::with('location.departments')->get();
        return view('admin.page.assets.assets-page', compact('assets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categories = Category::with('assets')->get();
        $locations = Location::with('assets')->get();
        $conditions = Condition::with('assets')->get();
        $manufacturers = Manufacturer::with('assets')->get();
        $models = ModelM::with('assets')->get();
        $suppliers = Supplier::with('assets')->get();
        $assets = Asset::all();
        $departments = $this->departmentDataService->getDepartments();
        $locationData = [];
        foreach ($locations as $location) {
            $department = $location->departments; // access the related department data
            $locationData[$location->id] = [
                'department_name' => $department->department_name,
                'street_address' => $department->street_address,
                'city' => $department->city,
                'state' => $department->state,
                'country' => $department->country,
                'floor' => $department->floor,
                'building' => $department->building,
                'zip_code' => $department->zip_code,
                'unit' => $department->unit,
            ];
        }
        return view('admin.page.assets.create', compact('categories', 'locations', 'conditions', 'manufacturers', 'models', 'suppliers', 'assets', 'locationData'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AssetRequest $request)
    {
        $asset = Asset::create($request->validated());
        return redirect()->route('assets.index')->with('success', 'Asset created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $asset)
    {
        $categories = Category::with('assets')->get();
        $asset = Asset::findOrFail($asset);
        $images = Image::where('asset_id', $asset->id)->get();
        $conditions = Condition::with('assets')->get();
        $locations = Location::with('assets')->get();
        $manufacturers = Manufacturer::with('assets')->get();
        $models = ModelM::with('assets')->get();
        $suppliers = Supplier::with('assets')->get();
        $departments = $this->departmentDataService->getDepartments();
        $locationData = [];
        foreach ($locations as $location) {
            $department = $location->departments; // access the related department data
            $locationData[$location->id] = [
                'department_name' => $department->department_name,
                'street_address' => $department->street_address,
                'city' => $department->city,
                'state' => $department->state,
                'country' => $department->country,
                'floor' => $department->floor,
                'building' => $department->building,
                'zip_code' => $department->zip_code,
                'unit' => $department->unit,
            ];
        }
        return view('admin.page.assets.edit', compact('asset', 'categories', 'locations', 'conditions', 'manufacturers', 'models', 'suppliers', 'locationData', 'images'));
    }


    public function uploadImages(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'asset_id' => 'required|exists:assets,id'
        ]);

        // Lấy asset_id từ request
        $assetId = $request->input('asset_id');

        // Lấy các file hình ảnh từ yêu cầu
        $images = $request->file('images');
        $check = Image::pluck('asset_id');
        Session::put('check', $check);
        DB::transaction(function () use ($images, $assetId) {
            foreach ($images as $image) {
                // Tạo một tên file duy nhất để tránh xung đột
                $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

                // Lưu hình ảnh vào thư mục lưu trữ
                $path = $image->storeAs('public/images', $filename);

                // Tạo bản ghi mới trong bảng images
                Image::create([
                    'asset_id' => $assetId,
                    'file_name' => $filename,
                    'file_path' => $path,
                    'mime_type' => $image->getMimeType(),
                    'size' => $image->getSize(),
                ]);
            }
        });
        return redirect()->back()->with('success', 'Tất cả hình ảnh đã được tải lên thành công.');
    }

    public function deleteImage($id)
    {
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $asset)
    {
        $asset = Asset::findOrFail($asset);
        // $locations = Location::with('assets')->get();

        $asset->update($request->all());

        return redirect()->route('assets.index')->with('success', 'Asset updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function import_excel(Request $request)
    {
        $request->validate([
            'excel_file' => 'required|file|mimes:xls,xlsx,csv'
        ]);

        try {
            Excel::import(new AssetsImport, $request->file('excel_file'));
            return redirect()->back()->with('success', __('File imported successfully!'));
        } catch (\Exception $e) {
            Log::channel('application')->error('Error importing file: ' . $e->getMessage());
            return redirect()->back()->with('error', __('Error importing file: :message', ['message' => $e->getMessage()]));
        }
    }
}
