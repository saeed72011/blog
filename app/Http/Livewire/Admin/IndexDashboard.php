<?php

namespace App\Http\Livewire\Admin;

use App\Actions\SettingAction;
use App\Http\Requests\Settings\UpdateSettingRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\Setting;
use App\Models\User;

class IndexDashboard extends AdminBaseComponent
{
    public Setting $setting;



    public function mount()
    {
        $this->setting = Setting::first();
    }

    public function render()
    {
        return $this->viewBase('index-dashboard');
    }

}
