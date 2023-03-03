<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.settings.index', [
            'setting' => Setting::first()
        ]);
    }

    public function edit(Request $request)
    {
        return view('admin.settings.edit', [
            'setting' => Setting::first()
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'about_us' => 'required|min:2|max:5000',
            'contact' => 'required|min:10',
            'email' => 'required|email'
        ]);

        $setting = Setting::first();

        $setting->about_us = $request->about_us;
        $setting->contact = $request->contact;
        $setting->email = $request->email;
        $setting->facebook_url = $request->facebook_url;
        $setting->instagram_url = $request->instagram_url;
        $setting->twitter_url = $request->twitter_url;

        $setting->save();

        return redirect()->route('admin.settings.index')->with('success', 'Setting updated successfully');
    }
}
