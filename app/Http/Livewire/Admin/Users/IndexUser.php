<?php

namespace App\Http\Livewire\Admin\Users;

use App\Http\Livewire\Admin\AdminBaseComponent;


class IndexUser extends AdminBaseComponent
{
    protected $listeners = ['refresh' => '$refresh'];

    public function render()
    {
        return $this->viewBase('users.index-user');
    }
}
