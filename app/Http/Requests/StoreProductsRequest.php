<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProductsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function messages(): Array
    {
        return [
            'dsProduct.required' => 'O campo descrição precisa ser preenchido.',
            'price.required' => 'O campo preço precisa ser preenchido.',
            'color.required' => 'O campo cor precisa ser preenchido.',
            'weight.required' => 'O campo peso precisa ser preenchido.',
            'manufacturer_id.required' => 'O campo marca precisa ser preenchido.',
            'categories.required' => 'O campo categoria precisa ser preenchido.',
            'categories.*.exists' => 'Você selecionou uma ou mais categorias inválidas.'
        ];
    }

    public function rules(): array
    {
        return [
            'dsProduct' => 'required|string|max:255',
            'price' => 'required|numeric|min:1',
            'color' => 'required',
            'weight' => 'required',
            'manufacturer_id' => 'required|numeric|min:1',
            'categories' => 'required|array',
            'categories.*' => 'exists:App\Models\Category,id'
        ];
    }
}
