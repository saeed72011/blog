<?php

namespace App\Http\Requests\Settings;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSettingRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'setting.name' => 'nullable|string|max:255',
            'setting.url' => 'nullable|url|max:255',
            'setting.phone' => 'nullable|string|max:255',
            'setting.mobile' => 'nullable|string|max:255',
            'setting.city' => 'nullable|string|max:255',
            'setting.address' => 'nullable|string|max:255',
            'setting.email' => 'nullable|email|max:255',
            'setting.opens' => 'nullable|string|max:255',
            'setting.closes' => 'nullable|string|max:255',
            'setting.index' => 'nullable|boolean',
            'setting.title' => 'nullable|string|max:255',
            'setting.meta_title' => 'nullable|string|max:255',
            'setting.meta_desc' => 'nullable|string|max:255',
            'setting.latitude' => 'nullable|string|max:255',
            'setting.longitude' => 'nullable|string|max:255',
            'setting.about' => 'nullable|string|max:255',
            'logo' => 'nullable|image|max:1024',
            'image' => 'nullable|image|max:1024',
            'video' => 'nullable|file|mimes:mp4,webm|max:2048',
            'favicon' => 'nullable|image|max:1024',
        ];
    }
}
