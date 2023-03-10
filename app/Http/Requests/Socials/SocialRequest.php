<?php

namespace App\Http\Requests\Socials;

use Illuminate\Foundation\Http\FormRequest;

class SocialRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
            'url' => 'required|url|max:255',
        ];
    }
}
