<?php

namespace App\Http\Requests\Articles;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:250',
            'desc' => 'required|string|max:150000',
            'author' => 'required|string|max:250',
            'study_time' => 'required|string|max:250',
            'status' => 'required|boolean',
            'image' => 'nullable|image|max:1024',
            'video' => 'nullable|file|mimes:mp4,mov,ogg|max:2048',
            'slug' => 'required|string|max:255|unique:articles,slug',
            'meta_title' => 'required|string|max:255',
            'meta_desc' => 'required|string|max:500',
        ];
    }
}
