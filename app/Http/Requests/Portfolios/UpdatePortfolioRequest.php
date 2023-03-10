<?php

namespace App\Http\Requests\Portfolios;

use App\Models\Portfolio;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePortfolioRequest extends FormRequest
{
    public Portfolio $portfolio;
    public function __construct(Portfolio $portfolio)
    {
        parent::__construct();
        $this->portfolio = $portfolio;
    }

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'status' => 'required|boolean',
            'slug' => ['required','string','max:255', Rule::unique('portfolios')->ignore($this->portfolio->id)],
            'desc' => 'required|string|max:750',
            'image' => 'nullable|image|max:1024',
            'meta_title' => 'required|string|max:255',
            'meta_desc' => 'required|string|max:750',
        ];
    }
}
