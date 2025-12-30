<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->user()->is_admin;
    }

    public function rules()
    {
        return [
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|string',
        ];
    }
}
