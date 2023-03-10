<?php

namespace App\View\Components\Elements;

use Illuminate\View\Component;

class TabLink extends Component
{
    public string $idTab;
    public string $title;
    public bool $active;

    public function __construct($idTab, $title, $active = false)
    {
        $this->idTab = $idTab;
        $this->title = $title;
        $this->active = $active;
    }


    public function render()
    {
        return view('components.elements.tab-link');
    }
}
