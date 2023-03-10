<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Http\Livewire\Admin\AdminBaseComponent;

class IndexCategory extends AdminBaseComponent
{
    public function render()
    {
        return $this->viewBase('categories.index-category');
    }
}
