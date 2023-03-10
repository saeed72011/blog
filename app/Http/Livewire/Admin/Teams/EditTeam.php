<?php

namespace App\Http\Livewire\Admin\Teams;

use App\Actions\TeamAction;
use App\Http\Livewire\Admin\AdminBaseComponent;
use App\Http\Requests\Teams\TeamRequest;
use App\Models\Team;

class EditTeam extends AdminBaseComponent
{
    public $team;
    public $name;
    public $mobile;
    public $desc;
    public $image;
    public $sort;
    public $status;
    public $position;
    public $gender;

    protected $listeners = ['refresh' => '$refresh'];

    public function mount(Team $team)
    {
        $this->team = $team;
        $this->name = $this->team->name;
        $this->mobile = $this->team->mobile;
        $this->desc = $this->team->desc;
        $this->sort = $this->team->sort;
        $this->status = $this->team->status;
        $this->position = $this->team->position;
        $this->gender = $this->team->gender;
    }

    public function save()
    {
        $socialAction = new TeamAction();
        $request = $this->validateBase((new TeamRequest()));
        $socialAction->update($request, $this->team);
        $this->alertBase();
        $this->emit('refresh');
    }


    public function render()
    {
        return $this->viewBase('teams.edit-team');
    }
}
