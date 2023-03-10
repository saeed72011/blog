<?php

namespace App\Http\Livewire\Admin\Users;

use App\Actions\UserAction;
use App\Http\Livewire\Admin\AdminBaseComponent;
use App\Http\Requests\Users\StoreUserRequest;
use App\Http\Requests\Users\UserRequest;


class CreateUser extends AdminBaseComponent
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    public function save(UserAction $action)
    {
        $request = $this->validateBase((new StoreUserRequest()));
        $this->tryBase(fn() => $action->store($request));
        $this->reset([
            'name',
            'email',
            'password',
            'password_confirmation',
        ]);
        $this->alertBase();
        $this->emit('refresh');
    }

    public function render()
    {
        return $this->viewBase('users.create-user');
    }
}
