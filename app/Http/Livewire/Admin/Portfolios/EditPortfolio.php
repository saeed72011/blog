<?php

namespace App\Http\Livewire\Admin\Portfolios;

use App\Actions\PortfolioAction;
use App\Http\Livewire\Admin\AdminBaseComponent;
use App\Http\Requests\Portfolios\UpdatePortfolioRequest;
use App\Models\Portfolio;
use Livewire\Component;

class EditPortfolio extends AdminBaseComponent
{
    public $portfolio;
    public $title;
    public $status;
    public $slug;
    public $desc;
    public $image;
    public $meta_title;
    public $meta_desc;

    public function mount(Portfolio $portfolio)
    {
        $this->portfolio = $portfolio;
        $this->title = $portfolio->title;
        $this->status = $portfolio->status;
        $this->slug = $portfolio->slug;
        $this->desc = $portfolio->desc;
        $this->meta_title = $portfolio->meta_title;
        $this->meta_desc = $portfolio->meta_desc;
    }

    public function save(PortfolioAction $action)
    {
        $request = $this->validateBase((new UpdatePortfolioRequest($this->portfolio)));
        $this->tryBase(fn() => $action->update($request, $this->portfolio));
        $this->alertBase();
        $this->emit('refresh');
    }

    public function render()
    {
        return $this->viewBase('portfolios.edit-portfolio');
    }
}
