<?php

namespace App\Http\Livewire\Admin\Socials;

use App\Actions\SocialAction;
use App\Http\Livewire\Admin\AdminBaseComponent;
use App\Http\Requests\Socials\SocialRequest;
use App\Models\Social;

class EditSocial extends AdminBaseComponent
{
    public $social;
    public $icon;
    public $url;
    public $title;

    public function mount(Social $social)
    {
        $this->social = $social;
        $this->icon = $this->social->icon;
        $this->url = $this->social->url;
        $this->title = $this->social->title;
    }

    protected $listeners = ['refresh' => '$refresh'];

    public function save()
    {
        $socialAction = new SocialAction();
        $request = $this->validateBase((new SocialRequest()));
        $socialAction->update($request, $this->social);
        $this->alertBase();
        $this->emit('refresh');
    }

    public function render()
    {
        return $this->viewBase('socials.edit-social');
    }

}
