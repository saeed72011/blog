<?php

namespace App\Http\Requests\Categories;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'status' => 'required|boolean',
            'slug' => 'required|unique:categories,slug|string|max:255',
            'desc' => 'required|string|max:5000',
            'image' => 'nullable|image|max:1024',
            'meta_title' => 'required|string|max:255',
            'meta_desc' => 'required|string|max:750',
        ];
    }
}
