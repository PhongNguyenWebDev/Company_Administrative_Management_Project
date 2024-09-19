<?php

namespace App\Imports;

use App\Models\Location;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class LocationsImport implements ToModel, WithHeadingRow
{
    protected $importedData = [];

    public function model(array $row)
    {
        $location = new Location([
            'user_id' => auth()->id(), // Giả sử ID người dùng đã xác thực
            'department_id' => $row['department_id'], // Thay thế với tên cột chính xác
            'location_name' => $row['location_name'],
            'notes' => $row['notes'],
            'floor' => $row['floor'],
            'unit' => $row['unit'],
            'building' => $row['building'],
            'street_address' => $row['street_address'],
            'city' => $row['city'],
            'state' => $row['state'],
            'country' => $row['country'],
        ]);

        // Lưu thông tin dòng đã nhập vào mảng importedData
        $this->importedData[] = $location->toArray();

        return $location;
    }

    public function getImportedData()
    {
        return $this->importedData;
    }
}
