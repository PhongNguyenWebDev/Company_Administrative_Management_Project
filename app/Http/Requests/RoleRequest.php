<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Allow everyone to send this request
    }

    public function rules()
    {
        return [
            'role_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'permissions' => 'required|in:none,full,select', // Validate the permissions option
            'view' => 'nullable|boolean',
            'create' => 'nullable|boolean',
            'edit' => 'nullable|boolean',
            'delete' => 'nullable|boolean',
        ];
    }

    public function messages()
    {
        return [
            'role_name.required' => 'Role name is required.',
            'role_name.string' => 'Role name must be a string.',
            'role_name.max' => 'Role name may not be greater than :max characters.',
            'description.string' => 'Description must be a string.',
            'permissions.required' => 'Please select a permission level.',
            'permissions.in' => 'Invalid permission level selected.',
            'view.boolean' => 'View permission must be a boolean value.',
            'create.boolean' => 'Create permission must be a boolean value.',
            'edit.boolean' => 'Edit permission must be a boolean value.',
            'delete.boolean' => 'Delete permission must be a boolean value.',
        ];
    }
}
