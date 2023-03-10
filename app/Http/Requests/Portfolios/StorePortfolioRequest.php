<?php

namespace App\Http\Requests\Portfolios;

use Illuminate\Foundation\Http\FormRequest;

class StorePortfolioRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'status' => 'required|boolean',
            'slug' => 'required|unique:portfolios,slug|string|max:255',
            'desc' => 'required|string|max:5000',
            'image' => 'nullable|image|max:1024',
            'meta_title' => 'required|string|max:255',
            'meta_desc' => 'required|string|max:750',
        ];
    }
}
