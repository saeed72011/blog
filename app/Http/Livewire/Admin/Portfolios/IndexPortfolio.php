<?php

namespace App\Http\Livewire\Admin\Portfolios;

use App\Http\Livewire\Admin\AdminBaseComponent;
use Livewire\Component;

class IndexPortfolio extends AdminBaseComponent
{
    public function render()
    {
        return $this->viewBase('portfolios.index-portfolio');
    }
}
