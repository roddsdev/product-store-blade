<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function messages(): Array
    {
        return [
            'dsCategory.required' => 'O campo descrição precisa ser preenchido.'
        ];
    }

    public function rules(): array
    {
        return [
            'dsCategory' => 'required|string|max:255'
        ];
    }
}
