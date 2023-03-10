<?php

namespace App\Http\Livewire\Admin\Comments;

use App\Http\Livewire\Admin\AdminBaseComponent;

class IndexComment extends AdminBaseComponent
{
    public function render()
    {
        return $this->viewBase('comments.index-comment');
    }
}
