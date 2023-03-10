<?php


namespace App\Actions;


use App\Models\Portfolio;
use App\Models\Slider;
use Illuminate\Support\Facades\Hash;

class PortfolioAction extends Action
{
    public function store($request): Portfolio
    {
        return Portfolio::create([
            'title' => $request['title'],
            'status' => $request['status'],
            'slug' => $request['slug'],
            'desc' => $request['desc'],
            'image' => $this->uploadBase($request['image'], 'portfolios'),
            'meta_title' => $request['meta_title'],
            'meta_desc' => $request['meta_desc'],
        ]);
    }


    public function update($request, Portfolio $portfolio): Portfolio
    {
        $portfolio->update([
            'title' => $request['title'],
            'status' => $request['status'],
//            'slug' => $request['slug'],
            'desc' => $request['desc'],
            'image' => $this->uploadBase($request['image'], 'portfolios', $portfolio->image),
            'meta_title' => $request['meta_title'],
            'meta_desc' => $request['meta_desc'],
        ]);
        return $portfolio;
    }
}
