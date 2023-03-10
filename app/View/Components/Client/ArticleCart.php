<?php

namespace App\View\Components\Client;

use Illuminate\View\Component;

class ArticleCart extends Component
{
    public $articles;
    public $col;

    /**
     * Create a new component instance.
     *
     * @param $articles
     * @param $col
     */
    public function __construct($articles, $col = null)
    {
        $this->articles = $articles;
        $this->col = $col;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.client.article-cart');
    }
}
