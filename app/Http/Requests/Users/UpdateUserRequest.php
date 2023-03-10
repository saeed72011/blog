<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    public $user;
    public function __construct($user)
    {
        parent::__construct();
        $this->user = $user;
    }

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => ['required','email', Rule::unique('users')->ignore($this->user->id)],
            'password' => 'nullable|string|min:6|max:12',
        ];
    }
}
