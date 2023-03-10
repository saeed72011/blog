<?php

namespace App\Http\Requests\Categories;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCategoryRequest extends FormRequest
{

    public Category $category;
    public function __construct($category)
    {
        parent::__construct();
        $this->category = $category;
    }
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
            'slug' => ['required','string','max:255', Rule::unique('categories')->ignore($this->category->id)],
            'desc' => 'required|string|max:750',
            'image' => 'nullable|image|max:1024',
            'meta_title' => 'required|string|max:255',
            'meta_desc' => 'required|string|max:750',
        ];
    }
}
