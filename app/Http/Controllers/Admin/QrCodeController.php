<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Asset;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Log;
use PDF;

class QrCodeController extends Controller
{
    public function index(Request $request): View
    {
        $query = $request->input('query');
        $assets = Asset::where(function ($queryBuilder) use ($query) {
            $queryBuilder->where('name', 'like', '%' . $query . '%');
        });
        return view('admin.page.qrcode.qrcode', compact('query', 'assets'));
    }

    public function template(Request $request): View
    {
        $query = $request->input('query');
        if ($query) {
            $assets = Asset::where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('name', 'like', '%' . $query . '%');
            })->get();
        } else {
            $assets = Asset::all();
        }

        return view('admin.page.qrcode.print-templates.print-templates-page', compact('assets', 'query'));
    }
    public function select_asset(Request $request, $id)
    {
        // Tìm tài sản theo ID
        $asset = Asset::find($id);

        if ($asset) {
            // Kiểm tra xem 'is_added' có được gửi trong yêu cầu không và cập nhật trạng thái của tài sản
            $asset->is_added = $request->has('is_added');
            $asset->save();

            // Trả về phản hồi thành công và lưu thông báo vào session
            return redirect()->back()->with('success', 'Asset updated successfully!');
        }

        // Trả về phản hồi lỗi nếu tài sản không tìm thấy
        return response()->json(['success' => false, 'message' => 'Asset not found.'], 404);
    }

    public function print_template()
    {
        return view('admin.page.qrcode.print-templates.list-print');
    }

    public function print(Request $request)
    {
        $selectedFields = $request->except('_token');

        // Chuyển hướng đến trang hiển thị và truyền dữ liệu
        return redirect()->route('show.print', $selectedFields);
    }

    public function showPrint(Request $request)
    {
        // Lấy tất cả các giá trị từ request
        $selectedFields = $request->all();

        // Sử dụng eager loading để tối ưu hóa truy vấn
        $assets = Asset::with(['supplier', 'model', 'location.departments'])
            ->where('is_added', 1)
            ->get();

        // Mảng cấu hình các field có thể hiển thị
        $fieldMapping = [
            1 => 'asset_name',
            2 => 'asset_code',
            3 => 'date_purchased',
            4 => 'warranty',
            5 => 'vendor',
            6 => 'model_serial',
            7 => 'loca_depart',
        ];

        // Khởi tạo mảng để chứa dữ liệu tài sản
        $assetsData = [];

        foreach ($assets as $item) {
            $assetData = [];

            // Dùng foreach để kiểm tra các field cần hiển thị
            foreach ($selectedFields as $field) {
                if (array_key_exists($field, $fieldMapping)) {
                    $fieldName = $fieldMapping[$field];

                    // Gán giá trị tương ứng vào assetData
                    switch ($field) {
                        case 1:
                            $assetData[$fieldName] = $item->name;
                            break;
                        case 2:
                            $assetData[$fieldName] = $item->id;
                            break;
                        case 3:
                            $assetData[$fieldName] = $item->date;
                            break;
                        case 4:
                            $assetData[$fieldName] = $item->warranty_months;
                            break;
                        case 5:
                            $assetData[$fieldName] = $item->supplier ? $item->supplier->name : null;
                            break;
                        case 6:
                            $assetData[$fieldName] = $item->model ? $item->model->name . '/' . $item->serial : null;
                            break;
                        case 7:
                            $assetData[$fieldName] = $item->location && $item->location->departments
                                ? $item->location->location_name . '/' . $item->location->departments->name
                                : null;
                            break;
                    }
                }
            }

            // Nếu assetData có dữ liệu thì thêm vào mảng assetsData
            if (!empty($assetData)) {
                $assetsData[] = $assetData;
            }
        }

        // QR code cho bản ghi cuối cùng (nếu có)
        $qrCode = null;
        if ($assets->isNotEmpty()) {
            $lastItem = $assets->last();
            $url = route('show.info.qrcode', ['id' => $lastItem->id]);
            $qrCode = QrCode::size(100)->generate($url);
        }

        // Trả về view với dữ liệu cần thiết
        return view('admin.page.qrcode.print-templates.list-print', compact('assetsData', 'selectedFields', 'qrCode'));
    }


    public function showInfoQr(Request $request, $id)
    {
        $assets = Asset::findOrFail($id);
        return view('admin.page.qrcode.print-templates.infor-from-qrcode', compact('assets'));
    }
}
