<?php

namespace App\Http\Livewire\Admin\Sliders;

use App\Http\Livewire\Admin\AdminBaseComponent;
use Livewire\Component;

class IndexSlider extends AdminBaseComponent
{
    public function render()
    {
        return $this->viewBase('sliders.index-slider');
    }
}
