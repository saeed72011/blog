<?php


namespace App\Actions;

use App\Models\Image;

class ImageAction extends Action
{
    public function store($request): Image
    {
        return Image::create([
            'image' => $this->uploadBase($request['image'], 'articles'),
        ]);
    }



}
