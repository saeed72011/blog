<?php

namespace App\Http\Livewire\Admin\Socials;

use App\Http\Livewire\Admin\AdminBaseComponent;

class IndexSocial extends AdminBaseComponent
{
    public function render()
    {
        return $this->viewBase('socials.index-social');
    }
}
