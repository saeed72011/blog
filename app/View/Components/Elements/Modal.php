<?php

namespace App\View\Components\Elements;

use Illuminate\View\Component;

class Modal extends Component
{
    public $live;
    public $title;
    public $color;
    public $size;

    public function __construct($live, $title, $size = 'small' , $color = 'success')
    {
        $this->live = $live;
        $this->title = $title;
        $this->color = $color;
        $this->size = $size;
    }


    public function render()
    {
        return view('components.elements.modal');
    }
}
