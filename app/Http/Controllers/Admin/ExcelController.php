<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExcelController extends Controller
{
    public function download_excel($file)
    {
        $filePath = storage_path("app/public/{$file}");
        if (!file_exists($filePath)) {
            return abort(404);
        }
        return response()->download($filePath);
    }
}
