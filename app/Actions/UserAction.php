<?php


namespace App\Actions;


use App\Models\User;

class UserAction extends Action
{
    public function store($request)
    {
        return User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => $request['password'],
        ]);
    }


    public function update($request, User $user): User
    {
        $user->update([
            'name' => $request['name'],
            'email' => $request['email'],
        ]);
        if($request['password'])
        $user->update([
            'password' => $request['password'],
        ]);
        return $user;
    }

}
