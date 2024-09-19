<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Models\Location;
use Illuminate\Support\Facades\Hash;
use App\Mail\UserPasswordMail;
use Illuminate\Support\Facades\Mail;
use App\Models\ModelHasRole;
use App\Services\DepartmentDataService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    private $departmentDataService;
    public function __construct(DepartmentDataService $departmentDataService)
    {
        $this->departmentDataService = $departmentDataService;
    }
    public function index(Request $request): View
    {
        $query = $request->input('query');

        $user = User::when($query, function ($queryBuilder, $searchTerm) {
            return $queryBuilder->where('name', 'like', '%' . $searchTerm . '%')
                ->orWhere('email', 'like', '%' . $searchTerm . '%');
        })->get();

        $module = ModelHasRole::all();

        return view('admin.page.permission.show.user', compact('user', 'module', 'query'));
    }
    public function create(): View
    {
        $roles = Role::all();
        $locations = Location::with('departments')->get();
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
        return view('admin.page.permission.create.user', compact('roles', 'locations', 'locationData'));
    }
    public function store(UserRequest $request)
    {
        // Validate incoming request data
        $data = $request->validated();
        $TempoPassWord = $data['password'];
        $hashedPassword = Hash::make($TempoPassWord);

        try {
            // Create the user
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $hashedPassword,
                'phone' => $data['phone'],
                'company' => $data['company'],
                'location_id' => $data['location'],
                'must_change_password' => true,
                'status' => true,
            ]);

            // Ensure the user was created successfully
            if (!$user) {
                throw new \Exception('User creation failed');
            }

            // Assign the role to the user
            $user->syncRoles($data['role']);

            // Send email with the default password
            Mail::to($user->email)->send(new UserPasswordMail($user, $TempoPassWord));
            Auth::logout();
            return redirect()->route('user.index')->with('success', 'User created successfully');
        } catch (\Exception $e) {
            // Log the error message for debugging
            Log::error('User creation failed: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Failed to create user: ' . $e->getMessage());
        }
    }


    public function edit($id)
    {
    }
    public function update($id, Request $request)
    {
    }
    public function destroy($id)
    {
    }
}
