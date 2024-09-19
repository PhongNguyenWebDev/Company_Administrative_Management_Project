<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssetRequest extends FormRequest
{
    public function authorize()
    {
        // Return true if you want to allow this request, false otherwise.
        return true;
    }

    public function rules()
    {
        // Define the validation rules for the request
        return [
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'location_id' => 'required|exists:locations,id',
            'condition_id' => 'required|exists:conditions,id',
            'manufacture_id' => 'required|exists:manufacturers,id',
            'model_id' => 'required|exists:models,id',
            'serial' => 'nullable|string|max:255',
            'date' => 'required|date',
            'warranty_months' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'supplier_id' => 'required|exists:suppliers,id',
            'notes' => 'nullable|string',
        ];
    }

    public function messages()
    {
        // Define the custom error messages
        return [
            'name.required' => 'The asset name is required.',
            'category.required' => 'Please select a valid category.',
            'category.exists' => 'The selected category is invalid.',
            'location_id.required' => 'Please select a valid location.',
            'location_id.exists' => 'The selected location is invalid.',
            'condition_id.required' => 'Please select a valid condition.',
            'condition_id.exists' => 'The selected condition is invalid.',
            'manufacture_id.required' => 'Please select a valid manufacturer.',
            'manufacture_id.exists' => 'The selected manufacturer is invalid.',
            'model_id.required' => 'Please select a valid model.',
            'model_id.exists' => 'The selected model is invalid.',
            'serial.max' => 'The serial number must not exceed 255 characters.',
            'date.required' => 'Please select a valid date.',
            'warranty_months.required' => 'Please enter a valid warranty period in months.',
            'warranty_months.integer' => 'The warranty period must be an integer.',
            'warranty_months.min' => 'The warranty period must be at least 0 months.',
            'price.required' => 'Please enter a valid price.',
            'price.numeric' => 'The price must be a number.',
            'price.min' => 'The price must be at least 0.',
            'supplier_id.required' => 'Please select a valid supplier.',
            'supplier_id.exists' => 'The selected supplier is invalid.',
            'notes.string' => 'The notes must be a string.',
        ];
    }
}
