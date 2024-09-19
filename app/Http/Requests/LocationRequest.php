<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LocationRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Cho phép mọi user gửi request này (có thể cần điều chỉnh theo quy định của bạn)
    }

    public function rules()
    {
        return [
            'location_name' => 'required|string|max:255',
            'notes' => 'required|string',
            'department_id' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'location_name.required' => 'The location name is required.',
            'location_name.string' => 'The location name must be a string.',
            'location_name.max' => 'The location name may not be greater than :max characters.',
            'notes.string' => 'The notes must be a string.',
        ];
    }
}
