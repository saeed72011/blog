<?php

namespace App\View\Components\Categories;

use App\Models\Category;
use Illuminate\View\Component;

class CardCategory extends Component
{
  public $category;
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function render()
    {
        return view('components.categories.card-category');
    }
}
