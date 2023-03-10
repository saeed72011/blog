<?php

namespace App\View\Components\Elements;

use Illuminate\View\Component;

class Tab extends Component
{
    public string $idTab;
    public bool $active;

    public function __construct($idTab, $active = false)
    {
        $this->idTab = $idTab;
        $this->active = $active;
    }


    public function render()
    {
        return view('components.elements.tab');
    }
}
