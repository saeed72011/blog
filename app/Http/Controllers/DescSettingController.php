<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class DescSettingController extends Controller
{
    public function update(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate(['desc' => 'required|string|max:15000']);
        Setting::query()->first()->update(['desc' => $request['desc']]);
        alert()->success('ذخیره', 'با موفقیت انجام شد.');
        return redirect()->route('dashboard');
    }
}
