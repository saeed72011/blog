<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Actions\CategoryAction;
use App\Http\Livewire\Admin\AdminBaseComponent;
use App\Http\Requests\Categories\UpdateCategoryRequest;
use App\Models\Category;

class EditCategory extends AdminBaseComponent
{
    public $category;
    public $title;
    public $status;
    public $slug;
    public $desc;
    public $image;
    public $meta_title;
    public $meta_desc;

    public function mount(Category $category)
    {
        $this->category = $category;
        $this->title = $category->title;
        $this->status = $category->status;
        $this->slug = $category->slug;
        $this->desc = $category->desc;
        $this->meta_title = $category->meta_title;
        $this->meta_desc = $category->meta_desc;
    }

    public function save(CategoryAction $action)
    {
        $request = $this->validateBase((new UpdateCategoryRequest($this->category)));
        $this->tryBase(fn() => $action->update($request, $this->category));
        $this->alertBase();
        $this->emit('refresh');
    }

    public function render()
    {
        return $this->viewBase('categories.edit-category');
    }
}
