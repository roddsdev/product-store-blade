<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreManufacturersRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function messages(): Array
    {
        return [
            'dsManufacturer.required' => 'O campo descrição precisa ser preenchido.'
        ];
    }

    public function rules(): array
    {
        return [
            'dsManufacturer' => 'required|string|max:255'
        ];
    }
}
