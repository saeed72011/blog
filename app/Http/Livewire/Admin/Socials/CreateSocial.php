<?php

namespace App\Http\Livewire\Admin\Socials;

use App\Actions\SocialAction;
use App\Http\Livewire\Admin\AdminBaseComponent;
use App\Http\Requests\Socials\SocialRequest;

class CreateSocial extends AdminBaseComponent
{
    public $icon;
    public $url;
    public $title;

    protected $listeners = ['refresh' => '$refresh'];

    public function save()
    {
        $socialAction = new SocialAction();
        $request = $this->validateBase((new SocialRequest()));
        $socialAction->store($request);
        $this->reset(['title', 'icon', 'url']);
        $this->alertBase();
        $this->emit('refresh');
    }

    public function render()
    {
        return $this->viewBase('socials.create-social');
    }

}
