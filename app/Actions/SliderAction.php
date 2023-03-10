<?php


namespace App\Actions;


use App\Models\Slider;
use Illuminate\Support\Facades\Hash;

class SliderAction extends Action
{
    public function store($request)
    {
        return Slider::create([
            'image' => $this->uploadBase($request['image'], 'sliders'),
            'url' => $request['url'],
            'title' => $request['title'],
            'desc' => $request['desc'],
            'status' => $request['status'],
        ]);
    }


    public function update($request, Slider $slider): Slider
    {
        $slider->update([
            'image' => $this->uploadBase($request['image'], 'sliders', $slider->image),
            'url' => $request['url'],
            'title' => $request['title'],
            'desc' => $request['desc'],
            'status' => $request['status'],
        ]);

        return $slider;
    }

}
