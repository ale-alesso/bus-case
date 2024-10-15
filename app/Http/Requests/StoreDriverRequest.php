<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class StoreDriverRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'birth_date' => [
                'required',
                'date',
                function ($attribute, $value, $fail) {
                    $age = Carbon::parse($value)->age;
                    if ($age > 65) {
                        $fail('The driver must be younger than 65 years.');
                    }
                },
            ],
            'salary' => 'required|numeric|min:0',
            'email' => 'required|email|max:255|unique:drivers,email',
            'image' => 'nullable|string', // Image path or src
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'First name is required',
            'last_name.required' => 'Last name is required',
            'birth_date.required' => 'Birth date is required',
            'salary.required' => 'Salary is required',
            'email.required' => 'Email is required',
            'email.email' => 'Please provide a valid email address',
            'email.unique' => 'This email is already in use',
        ];
    }
}
