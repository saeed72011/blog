<?php

namespace App\Http\Requests\Sliders;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'image' => 'required|image|max:1024',
            'title' => 'nullable|string|max:255',
            'desc' => 'nullable|string|max:255',
            'url' => 'nullable|url|max:255',
            'status' => 'nullable|boolean',
        ];
    }
}
