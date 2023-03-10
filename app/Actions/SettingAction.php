<?php


namespace App\Actions;


use App\Models\Setting;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SettingAction extends Action
{
    public function update($request, Setting $setting): bool
    {
        return $setting->update([
            'name' => $request['setting']['name'],
            'url' => $request['setting']['url'],
            'logo' => $this->uploadBase($request['logo'], 'setting', $setting->logo),
            'image' => $this->uploadBase($request['image'], 'setting', $setting->image),
            'video' => $this->uploadBase($request['video'], 'setting', $setting->video),
            'phone' => $request['setting']['phone'],
            'mobile' => $request['setting']['mobile'],
            'city' => $request['setting']['city'],
            'address' => $request['setting']['address'],
            'email' => $request['setting']['email'],
            'opens' => $request['setting']['opens'],
            'closes' => $request['setting']['closes'],
            'index' => $request['setting']['index'],
            'favicon' => $this->uploadBase($request['favicon'], 'setting', $setting->favicon),
            'title' => $request['setting']['title'],
            'meta_title' => $request['setting']['meta_title'],
            'meta_desc' => $request['setting']['meta_desc'],
            'latitude' => $request['setting']['latitude'],
            'longitude' => $request['setting']['longitude'],
            'about' => $request['setting']['about'],
        ]);
    }


}
