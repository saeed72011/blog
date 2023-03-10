<?php

namespace App\Http\Livewire\Admin\Auth;

use App\Http\Livewire\Admin\AdminBaseComponent;
use Illuminate\Support\Facades\Auth;

class LoginIndex extends AdminBaseComponent
{
    public $email;
    public $password;

    public function login()
    {
        $validatedDate = $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [], [
            'email' => 'ایمیل',
            'password' => 'رمز عبور',
        ]);

        if (Auth::attempt($validatedDate)) {

            redirect()->route('dashboard');

        } else {
            $this->alert('warning', 'کد کاربری یا رمز عبور اشتباه می باشد.');
        }
    }

    public function render()
    {
        return view('livewire.admin.auth.login-index')
            ->extends('layouts.admin.app-auth')
            ->section('content');
    }
}
