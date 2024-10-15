<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingsRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Название АТП обязательно для заполнения.',
            'logo.image' => 'Логотип должен быть изображением.',
            'description.required' => 'Краткое описание обязательно для заполнения.',
        ];
    }
}
