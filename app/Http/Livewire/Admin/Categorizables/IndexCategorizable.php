<?php

namespace App\Http\Livewire\Admin\Categorizables;

use App\Http\Livewire\Admin\AdminBaseComponent;
use App\Models\Category;


class IndexCategorizable extends AdminBaseComponent
{

    public $categories;
    public $modelId;
    public $modelNames;
    public $categoryId;


    protected $listeners = ['refresh' => '$refresh'];


    public function mount($modelId, $modelNames)
    {
        $this->modelId = $modelId;
        $this->modelNames = $modelNames;
        $this->categories = Category::query()->pluck('title', 'id');
    }

    public function updatedCategoryId($id)
    {
        $category = Category::query()->find($id);

        if ($category->{$this->modelNames}->contains($this->modelId)) {
            $category->{$this->modelNames}()->detach($this->modelId);
            $this->alertBase('warning', 'برداشته شد.');
        } else {
            $category->{$this->modelNames}()->attach($this->modelId);
             $this->alertBase('success', 'افزوده شد.');
        }

        $this->emitSelf('refresh');
    }

    public function checkRel($id): string
    {
        $category = Category::query()->find($id);
        if ($category->{$this->modelNames}->contains($this->modelId)) {
            return 'btn-success';
        } else {
            return 'btn-danger';
        }
    }


    public function render()
    {
        return $this->viewBase('categorizables.index-categorizable');
    }
}
