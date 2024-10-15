<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingsRequest;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $setting = Setting::first();

        return view('admin.settings.index', compact('setting'));
    }

    public function update(SettingsRequest $request)
    {
        $setting = Setting::first();
        if ($setting) {
            if ($request->hasFile('logo')) {
                $path = $request->file('logo')->store('logos', 'public');
                $setting->update([
                    'name' => $request->name,
                    'logo' => $path,
                    'description' => $request->description,
                ]);
            } else {
                $setting->update($request->validated());
            }
        } else {
            if ($request->hasFile('logo')) {
                $path = $request->file('logo')->store('logos', 'public');
                Setting::create([
                    'name' => $request->name,
                    'logo' => $path,
                    'description' => $request->description,
                ]);
            } else {
                Setting::create($request->validated());
            }
        }

        return redirect()->back()->with('success', 'Настройки обновлены успешно!');
    }
}
