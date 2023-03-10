<?php

namespace App\Http\Livewire\Admin\Teams;

use App\Http\Livewire\Admin\AdminBaseComponent;
use Livewire\Component;

class IndexTeam extends AdminBaseComponent
{
    public function render()
    {
        return $this->viewBase('teams.index-team');
    }
}
