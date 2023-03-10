<?php

namespace App\Http\Requests\Articles;

use App\Models\Article;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateArticleRequest extends FormRequest
{
    public Article $article;

    public function __construct(Article $article)
    {
        parent::__construct();
        $this->article = $article;
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
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:250',
            'desc' => 'nullable|string|max:150000',
            'author' => 'required|string|max:250',
            'study_time' => 'required|string|max:250',
            'status' => 'required|boolean',
            'image' => 'nullable|image|max:1024',
            'video' => 'nullable|file|mimes:mp4,mov,ogg,webm|max:2048',
            'slug' => ['required','string','max:255', Rule::unique('articles')->ignore($this->article->id)],
            'meta_title' => 'required|string|max:255',
            'meta_desc' => 'required|string|max:500',
        ];
    }
}
