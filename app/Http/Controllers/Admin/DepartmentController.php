<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\DepartmentDataService;
use App\Models\Location;

class DepartmentController extends Controller
{
    private $departmentDataService;

    public function __construct(DepartmentDataService $departmentDataService)
    {
        $this->departmentDataService = $departmentDataService;
    }

    public function show($departmentId)
    {
        $departmentData = $this->departmentDataService->getDepartments();
        // ...
    }

    public function getInfoDepart($id)
    {
        $location = Location::findOrFail($id);
        $department = $location->departments;
        return response()->json($department);
    }
}
