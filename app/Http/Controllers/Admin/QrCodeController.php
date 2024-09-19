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
        $selectedFields = $request->all();
        $assets = Asset::all();
        $assetsData = [];
        foreach ($assets as $item) {
            if ($item->is_added === 1) {
                if (in_array(1, $selectedFields)) {
                    $assetData['asset_name'] = $item->name;
                }
                if (in_array(2, $selectedFields)) {
                    $assetData['asset_code'] = $item->id;
                }
                if (in_array(3, $selectedFields)) {
                    $assetData['date_purchased'] = $item->date;
                }
                if (in_array(4, $selectedFields)) {
                    $assetData['warranty'] = $item->warranty_months;
                }
                if (in_array(5, $selectedFields)) {
                    $assetData['vendor'] = $item->supplier->name;
                }
                if (in_array(6, $selectedFields)) {
                    $assetData['model_serial'] = $item->model->name . '/' . $item->serial;
                }
                if (in_array(7, $selectedFields)) {
                    $assetData['loca_depart'] = $item->location->location_name . '/' . $item->location->departments->name;
                }
                $assetsData[] = $assetData;
            }
        }
        // QR code
        $url = route('show.info.qrcode', ['id' => $item->id]);
        $qrCode = QrCode::size(100)->generate($url);

        return view('admin.page.qrcode.print-templates.list-print', compact('assetsData', 'selectedFields', 'qrCode'));
    }
    public function showInfoQr(Request $request, $id)
    {
        $assets = Asset::findOrFail($id);
        return view('admin.page.qrcode.print-templates.infor-from-qrcode', compact('assets'));
    }
}
