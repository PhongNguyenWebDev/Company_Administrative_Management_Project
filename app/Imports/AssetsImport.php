<?php

namespace App\Imports;

use App\Models\Asset;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class AssetsImport implements ToModel, WithHeadingRow
{
    protected $importedData = [];

    public function model(array $row)
    {
        Log::info('Importing row: ', $row);

        // Kiểm tra nếu cột 'name' bị null hoặc thiếu, bỏ qua dòng này
        if (empty($row['name'])) {
            Log::warning('Skipped row due to empty name: ', $row);
            return null;
        }
        $date = Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['date']))->format('Y-m-d');
        $asset = new Asset([
            'name' => $row['name'],
            'category_id' => $row['category_id'],
            'location_id' => $row['location_id'],
            'condition_id' => $row['condition_id'],
            'notes' => $row['notes'],
            'manufacture_id' => $row['manufacture_id'],
            'model_id' => $row['model_id'],
            'serial' => $row['serial'],
            'date' => $date,
            'warranty_months' => $row['warranty_months'],
            'price' => $row['price'],
            'supplier_id' => $row['supplier_id'],
        ]);

        // Lưu thông tin dòng đã nhập vào mảng importedData
        $this->importedData[] = $asset->toArray();

        return $asset;
    }

    public function getImportedData()
    {
        return $this->importedData;
    }
}
