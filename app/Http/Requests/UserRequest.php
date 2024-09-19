<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\phoneNumber;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required',
            'password' => 'required|min:8',
            'role' => 'required|exists:roles,name',
            'location' => 'required|exists:locations,id',
            'company' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'User name is required.',
            'email.required' => 'Email is required.',
            'email.email' => 'Invalid email format.',
            'email.unique' => 'Email already exists in the system.',
            'role.required' => 'Please choose a role.',
            'role.exists' => 'The selected role is invalid.',
            'location.required' => 'Please choose a location.',
            'location.exists' => 'The selected location is invalid.',
            'password.required' => 'Password is required.',
            'password.min' => 'Password must be at least :min characters.',
            'company.required' => 'Company name is required.',
        ];
    }
}
