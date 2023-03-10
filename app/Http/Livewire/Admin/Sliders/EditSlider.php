<?php

namespace App\Http\Livewire\Admin\Sliders;

use App\Actions\SliderAction;
use App\Http\Livewire\Admin\AdminBaseComponent;
use App\Http\Requests\Sliders\SliderRequest;
use App\Models\Slider;

class EditSlider extends AdminBaseComponent
{

    public $slider;
    public $image;
    public $url;
    public $title;
    public $desc;
    public $status;

    protected $listeners = ['refresh' => '$refresh'];

    public function mount(Slider $slider)
    {
        $this->slider = $slider;
        $this->url = $slider->url;
        $this->title = $slider->title;
        $this->desc = $slider->desc;
        $this->status = $slider->status;
    }

    public function save()
    {
        $sliderAction = new SliderAction();
        $request = $this->validateBase((new SliderRequest()));
        $sliderAction->update($request, $this->slider);
        $this->alertBase();
        $this->emit('refresh');
    }

    public function render()
    {
        return $this->viewBase('sliders.edit-slider');
    }
}
