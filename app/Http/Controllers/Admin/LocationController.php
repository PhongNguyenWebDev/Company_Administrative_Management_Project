<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\LocationRequest;
use App\Models\Location;
use App\Models\Department;
use App\Imports\LocationsImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Services\DepartmentDataService;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;

class LocationController extends Controller
{
    private $departmentDataService;

    public static function middleware(): array
    {
        return [
            'role_or_permission:super-admin|edit location',
            new Middleware('role:author', only: ['view location']),
            new Middleware(\Spatie\Permission\Middleware\RoleMiddleware::using('super-admin'), except: ['delete location']),
        ];
    }
    public function __construct(DepartmentDataService $departmentDataService)
    {
        $this->departmentDataService = $departmentDataService;
    }
    public function index(Request $request)
    {
        // Lấy giá trị 'query' từ request
        $searchQuery = $request->input('query');

        // Tìm kiếm theo 'location_name' với điều kiện nếu có 'query'
        $locations = Location::when($searchQuery, function ($queryBuilder, $searchQuery) {
            $queryBuilder->where('location_name', 'like', '%' . $searchQuery . '%');
        })->paginate(10);

        // Truyền cả 'query' và 'locations' tới view
        return view('admin.page.location.location', compact('locations', 'searchQuery'));
    }


    public function create(): View
    {
        $departments = $this->departmentDataService->getDepartments(); // Use the service to retrieve departments

        // Create a JSON object to store department data
        $departmentData = [];
        foreach ($departments as $department) {
            $departmentData[$department->id] = [
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

        return view('admin.page.location.create-location', compact('departments', 'departmentData'));
    }

    public function store(LocationRequest $request)
    {
        $data = $request->validated();
        $location = Location::create([
            'department_id' => $data['department_id'],
            'location_name' => $data['location_name'],
            'notes' => $data['notes'],
        ]);

        return redirect()->route('location')->with('success', 'Location created successfully.');
    }

    public function edit($id)
    {
        $location = Location::findOrFail($id); // Tìm location theo ID
        $departments = Department::all(); // Lấy danh sách tất cả các departments để hiển thị trong dropdown

        return view('admin.page.location.edit-location', compact('location', 'departments'));
    }

    public function update(LocationRequest $request, $id)
    {
        $location = Location::findOrFail($id);
        $location->update([
            'user_id' => Auth::id(),
            'department_id' => $request->department_id,
            'location_name' => $request->location_name,
            'notes' => $request->notes,
        ]);

        return redirect()->route('locations.edit', $location->id)->with('success', 'Location updated successfully.');
    }

    public function destroy($id)
    {
        $location = Location::findOrFail($id);
        $location->delete();
        return redirect()->route('location')->with('success', 'Location deleted successfully.');
    }

    public function import_excel(Request $request)
    {
        $request->validate([
            'excel_file' => 'required|file|mimes:xls,xlsx,csv'
        ]);
        try {
            Excel::import(new LocationsImport, $request->file('excel_file'));
            return redirect()->back()->with('success', 'File imported successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error importing file: ' . $e->getMessage());
        }
    }

    public function copyLocation(Request $request)
    {
        $locationId = $request->input('location_id');
        $location = Location::find($locationId);

        if (!$location) {
            return response()->json(['message' => 'Location not found.'], 404);
        }

        $newLocation = $location->replicate();
        $newLocation->location_name = $location->location_name . ' (Copy)';
        $newLocation->save();

        return response()->json(['message' => 'Location copied successfully.', 'location' => $newLocation], 200);
    }
}
