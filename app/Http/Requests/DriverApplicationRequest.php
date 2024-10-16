<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DriverApplicationRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Измените при необходимости
    }

    public function rules()
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'birthdate' => 'required|date|before:65 years ago',
        ];
    }
}
