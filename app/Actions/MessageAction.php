<?php


namespace App\Actions;


use App\Models\Message;


class MessageAction extends Action
{
    public function store($request)
    {
        return Message::create([
            'name' => $request['name'],
            'title' => $request['title'],
            'desc' => $request['desc'],
        ]);
    }

}
