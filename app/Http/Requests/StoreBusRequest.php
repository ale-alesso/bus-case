<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBusRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'license_plate' => 'required|string|max:255|unique:buses,license_plate',
            'car_brand_id' => 'required|exists:car_brands,id',
            'driver_id' => 'nullable|exists:drivers,id',
        ];
    }

    public function messages()
    {
        return [
            'license_plate.required' => 'The license plate is required.',
            'license_plate.unique' => 'This license plate is already in use.',
            'car_brand_id.required' => 'Please select a car brand.',
            'car_brand_id.exists' => 'Selected car brand does not exist.',
            'driver_id.exists' => 'Selected driver does not exist.',
        ];
    }
}
