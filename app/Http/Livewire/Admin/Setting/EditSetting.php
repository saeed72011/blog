<?php

namespace App\Http\Livewire\Admin\Setting;

use App\Actions\SettingAction;
use App\Http\Livewire\Admin\AdminBaseComponent;
use App\Http\Requests\Settings\UpdateSettingRequest;
use App\Models\Setting;

class EditSetting extends AdminBaseComponent
{
    public Setting $setting;
    public $image;
    public $video;
    public $logo;
    public $favicon;


    protected $rules = [
        'setting.name' => 'nullable|string|max:255',
        'setting.url' => 'nullable|url|max:255',
        'setting.phone' => 'nullable|string|max:255',
        'setting.mobile' => 'nullable|string|max:255',
        'setting.city' => 'nullable|string|max:255',
        'setting.address' => 'nullable|string|max:255',
        'setting.email' => 'nullable|email|max:255',
        'setting.opens' => 'nullable|string|max:255',
        'setting.closes' => 'nullable|string|max:255',
        'setting.index' => 'nullable|boolean',
        'setting.title' => 'nullable|string|max:255',
        'setting.meta_title' => 'nullable|string|max:255',
        'setting.meta_desc' => 'nullable|string|max:255',
        'setting.latitude' => 'nullable|string|max:255',
        'setting.longitude' => 'nullable|string|max:255',
        'setting.about' => 'nullable|string|max:255',
    ];


    public function mount()
    {
        $this->setting = Setting::first();
    }

    public function save(SettingAction $action) {
        $request = $this->validateBase((new UpdateSettingRequest));
        $action->update($request, $this->setting);
        $this->alertBase();
        $this->emit('refresh');
    }

    public function render()
    {
        return $this->viewBase('setting.edit-setting');
    }
}
