<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index(Request $request): View
    {
        $query = $request->input('query');

        $roles = Role::when($query, function ($queryBuilder, $searchTerm) {
            return $queryBuilder->where('name', 'like', '%' . $searchTerm . '%')
                ->orWhere('description', 'like', '%' . $searchTerm . '%');
        })->paginate(2);

        return view('admin.page.permission.show.role', compact('roles', 'query'));
    }

    public function show($id)
    {
    }
    public function create(): View
    {
        $permissions = Permission::all();
        $modules = ['location', 'user', 'role', 'asset'];
        return view('admin.page.permission.create.role', compact('permissions', 'modules'));
    }


    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|unique:roles,name',
            'permissions' => 'required|array',
        ]);

        // Create a new role with the validated name
        $role = Role::create([
            'name' => $request->name,
            'description' => $request->description,
            'guard_name' => 'web',
        ]);

        // Get permissions based on IDs and sync them to the newly created role
        foreach ($request->permissions as $permissionId) {
            $permission = Permission::find($permissionId);
            if ($permission) {
                $role->syncPermissions($permission);
            }
        }

        return redirect()->route('role.index')->with('success', 'Role created successfully.');
    }

    public function edit($id)
    {
        $role = Role::find($id);
        $permissions = Permission::all();
        $modules = ['location', 'user', 'role', 'asset'];
        return view('admin.page.permission.edit-role', compact('role', 'permissions', 'modules'));
    }
    public function update(Request $request, $id)
    {
        $role = Role::find($id);

        // Validate the incoming request
        $request->validate([
            'name' => 'required|unique:roles,name,' . $id,
            'description' => 'nullable|string',
            'permissions' => 'required|array',
        ]);

        // Update the role with the validated name
        $role->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        // Detach all existing permissions
        $role->permissions()->detach();

        // Attach the new permissions
        foreach ($request->permissions as $module => $permissionIds) {
            foreach ($permissionIds as $permissionId) {
                $permission = Permission::find($permissionId);
                if ($permission) {
                    $role->givePermissionTo($permission);
                }
            }
        }

        return redirect()->route('role.index')->with('success', 'Role updated successfully.');
    }


    public function destroy($id)
    {
        $role = Role::find($id);
        $role->delete();
        return redirect()->route('role.index')->with('success', 'Role deleted successfully.');
    }


    public function copyRole(Request $request)
    {
        $roleId = $request->input('role_id');

        // Tìm vai trò dựa trên $roleId
        $role = Role::find($roleId);

        if (!$role) {
            return response()->json(['message' => 'Role not found.'], 404);
        }

        // Tạo một bản sao của vai trò
        $newRole = $role->replicate();
        $newRole->name = $role->name . ' (Copy)'; // Đổi tên nếu cần
        $newRole->save();

        return response()->json(['message' => 'Role copied successfully.', 'role' => $newRole], 200);
    }
}
