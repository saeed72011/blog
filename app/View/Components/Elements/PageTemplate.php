<?php

namespace App\View\Components\Elements;

use Illuminate\View\Component;

class PageTemplate extends Component
{
    public $title;
    public $routs;

    public function __construct($title, array $routs)
    {
        $this->title = $title;
        $this->routs = $routs;
    }


    public function render()
    {
        return view('components.elements.page-template');
    }
}
