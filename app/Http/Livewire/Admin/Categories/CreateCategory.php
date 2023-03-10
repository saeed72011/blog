<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Actions\CategoryAction;
use App\Http\Livewire\Admin\AdminBaseComponent;
use App\Http\Requests\Categories\StoreCategoryRequest;

class CreateCategory extends AdminBaseComponent
{
    public $title;
    public $status;
    public $slug;
    public $desc;
    public $image;
    public $meta_title;
    public $meta_desc;

    public function save(CategoryAction $action)
    {
        $request = $this->validateBase((new StoreCategoryRequest()));
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
        return $this->viewBase('categories.create-category');
    }
}
