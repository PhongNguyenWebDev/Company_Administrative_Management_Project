<?php

namespace App\Services;

use App\Models\Department;
use App\Models\Location;

class DepartmentDataService
{
    public function getDepartments()
    {
        return Department::all();
    }
}
