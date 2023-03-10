<?php

namespace App\View\Components\Client;

use Illuminate\View\Component;

class PageHeader extends Component
{
    public $title;
    public $routes;


    /**
     * Create a new component instance.
     *
     * @param $title
     * @param $routes
     */
    public function __construct($title, $routes = [])
    {
        $this->title = $title;
        $this->routes = $routes;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.client.page-header');
    }
}
