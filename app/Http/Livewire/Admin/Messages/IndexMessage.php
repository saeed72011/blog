<?php

namespace App\Http\Livewire\Admin\Messages;

use App\Http\Livewire\Admin\AdminBaseComponent;
use Livewire\Component;

class IndexMessage extends AdminBaseComponent
{
    public function render()
    {
        return $this->viewBase('messages.index-message');
    }
}
