<?php

namespace App\Http\Requests\Teams;

use Illuminate\Foundation\Http\FormRequest;

class TeamRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'mobile' => 'nullable|string|max:255',
            'desc' => 'nullable|string|max:500',
            'sort' => 'required|int|max:1500',
            'image' => 'nullable|image|max:1024',
            'position' => 'required|string|max:255',
            'status' => 'required|boolean|max:255',
            'gender' => 'required|in:sir,mis|max:255',
        ];
    }
}
