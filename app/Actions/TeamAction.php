<?php


namespace App\Actions;


use App\Models\Team;

class TeamAction extends Action
{
    public function store($request)
    {
        return Team::create([
            'image' => $this->uploadBase($request['image'], 'teams'),
            'name' => $request['name'],
            'mobile' => $request['mobile'],
            'desc' => $request['desc'],
            'position' => $request['position'],
            'status' => $request['status'],
            'gender' => $request['gender'],
            'sort' => $request['sort'],
        ]);
    }


    public function update($request, Team $team): Team
    {
        $team->update([
            'image' => $this->uploadBase($request['image'], 'teams', $team->image),
            'name' => $request['name'],
            'mobile' => $request['mobile'],
            'desc' => $request['desc'],
            'position' => $request['position'],
            'status' => $request['status'],
            'gender' => $request['gender'],
            'sort' => $request['sort'],
        ]);

        return $team;
    }

}
