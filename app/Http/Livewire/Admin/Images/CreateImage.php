<?php

namespace App\Http\Livewire\Admin\Images;

use App\Actions\ImageAction;
use App\Http\Livewire\Admin\AdminBaseComponent;
use App\Http\Requests\Images\StoreImageRequest;

class CreateImage extends AdminBaseComponent
{
    public $image;

    public function save(ImageAction $action)
    {
        $request = $this->validateBase((new StoreImageRequest()));
        $this->tryBase(fn() => $action->store($request));
        $this->reset([
            'image',
        ]);
        $this->emit('refresh');
        $this->alertBase();
    }

    public function render()
    {
        return $this->viewBase('images.create-image');
    }
}
