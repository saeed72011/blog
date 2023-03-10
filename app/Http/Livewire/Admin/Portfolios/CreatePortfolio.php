<?php

namespace App\Http\Livewire\Admin\Portfolios;

use App\Actions\PortfolioAction;
use App\Http\Livewire\Admin\AdminBaseComponent;
use App\Http\Requests\Portfolios\StorePortfolioRequest;
use Livewire\Component;

class CreatePortfolio extends  AdminBaseComponent
{
    public $title;
    public $status;
    public $slug;
    public $desc;
    public $image;
    public $meta_title;
    public $meta_desc;

    public function save(PortfolioAction $action)
    {
        $request = $this->validateBase((new StorePortfolioRequest()));
        $this->tryBase(fn() => $action->store($request));
        $this->reset([
            'title',
            'status',
            'slug',
            'desc',
            'image',
            'meta_title',
            'meta_desc',
        ]);
        $this->alertBase();
        $this->emit('refresh');
    }

    public function render()
    {
        return $this->viewBase('portfolios.create-portfolio');
    }
}
