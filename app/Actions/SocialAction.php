<?php


namespace App\Actions;


use App\Models\Social;

class SocialAction extends Action
{

    public function store($request): Social
    {
        return Social::create([
            'icon' => $request['icon'] ,
            'title' => $request['title'] ,
            'url' => $request['url'] ,
        ]);
    }


    public function update($request, Social $social): Social
    {
        $social->update([
            'icon' => $request['icon'] ,
            'title' => $request['title'] ,
            'url' => $request['url'] ,
        ]);
        return $social;
    }
}
