<?php

namespace App\Http\Livewire\Admin\Teams;

use App\Actions\TeamAction;
use App\Http\Livewire\Admin\AdminBaseComponent;
use App\Http\Requests\Teams\TeamRequest;
use Livewire\Component;

class CreateTeam extends AdminBaseComponent
{
    public $name;
    public $image;
    public $mobile;
    public $desc;
    public $sort;
    public $status;
    public $position;
    public $gender;

    protected $listeners = ['refresh' => '$refresh'];

    public function save()
    {
        $socialAction = new TeamAction();
        $request = $this->validateBase((new TeamRequest()));
        $socialAction->store($request);
        $this->reset(['name', 'image', 'mobile', 'desc', 'sort', 'status', 'position', 'gender']);
        $this->alertBase();
        $this->emit('refresh');
    }


    public function render()
    {
        return $this->viewBase('teams.create-team');
    }
}
