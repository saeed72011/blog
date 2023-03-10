<?php

namespace App\Http\Livewire\Admin\Sliders;

use App\Actions\SliderAction;
use App\Http\Livewire\Admin\AdminBaseComponent;
use App\Http\Requests\Sliders\SliderRequest;

class CreateSlider extends AdminBaseComponent
{

    public $image;
    public $url;
    public $title;
    public $desc;
    public $status;

    protected $listeners = ['refresh' => '$refresh'];

    public function save()
    {
        $sliderAction = new SliderAction();
        $request = $this->validateBase((new SliderRequest()));
        $sliderAction->store($request);
        $this->reset(['image', 'url', 'title', 'desc', 'status']);
        $this->alertBase();
        $this->emit('refresh');
    }

    public function render()
    {
        return $this->viewBase('sliders.create-slider');
    }
}
