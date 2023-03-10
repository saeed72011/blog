<?php

namespace App\Http\Livewire\Admin\Articles;

use App\Http\Livewire\Admin\AdminBaseComponent;


class IndexArticle extends AdminBaseComponent
{
    protected $listeners = ['refresh' => '$refresh'];

    public function render()
    {
        return $this->viewBase('articles.index-article');
    }
}
