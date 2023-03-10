<?php

namespace App\Http\Livewire\Admin\Users;

use App\Actions\UserAction;
use App\Http\Livewire\Admin\AdminBaseComponent;
use App\Http\Requests\Users\UpdateUserRequest;
use App\Http\Requests\Users\UserRequest;
use App\Models\User;

class EditUser extends AdminBaseComponent
{
    public $user;
    public $name;
    public $email;
    public $password;

    public function mount(User $user)
    {
        $this->user = $user;
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function save(UserAction $action)
    {
        $request = $this->validateBase((new UpdateUserRequest($this->user)));
        $this->tryBase(fn() => $action->update($request, $this->user));
        $this->reset([
            'password',
        ]);
        $this->alertBase();
        $this->emit('refresh');
    }

    public function render()
    {
        return $this->viewBase('users.edit-user');
    }
}
