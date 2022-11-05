<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Alert;

class SettingController extends Controller
{
    public function  __construct()
    {
        $this->middleware('permission:settings-update',   ['only' => ['index','update']]);
    }

    public function index()
    {
        $settings = Setting::firstOrCreate();
        return view('dashboard.settings.index', compact('settings'));
    }

    public function update(Request $request, Setting $setting)
    {
        $request->validate([
            'website_name' => 'nullable|string|max:255',
            'website_bio' => 'nullable|string',
            'website_logo' => 'nullable|image',
            'website_icon' => 'nullable|image',
            'website_cover' => 'nullable|image',

            'address' => 'nullable|string',
            'contact_email' => 'nullable|email',
            'phone' => 'nullable',
            'whatsapp_phone' => 'nullable',
        ]);
        $data = $request->except(['website_logo', 'website_icon', 'website_cover']);
        $data['dark_mode'] = $request->dark_mode == 1 ? 1 : 0;

        if (!$request->hasFile('website_logo')) {
            unset($data['website_logo']);
        } else {
            $file = $request->file('website_logo');
            if(!$setting->website_logo == null){
                Storage::disk('upload')->delete($setting->website_logo);
            }
            $path = $file->store('settings', [
                'disk' => 'upload'
            ]);
            $data['website_logo'] = $path;
        }

        if (!$request->hasFile('website_icon')) {
            unset($data['website_icon']);
        } else {
            $icon_file = $request->file('website_icon');
            if(!$setting->website_icon == null){
                Storage::disk('upload')->delete($setting->website_icon);
            }
            $icon_path = $icon_file->store('settings', [
                'disk' => 'upload'
            ]);
            $data['website_icon'] = $icon_path;
        }

        if (!$request->hasFile('website_cover')) {
            unset($data['website_cover']);
        } else {
            $cover_file = $request->file('website_cover');
            if(!$setting->website_cover == null){
                Storage::disk('upload')->delete($setting->website_cover);
            }
            $cover_file = $cover_file->store('settings', [
                'disk' => 'upload'
            ]);
            $data['website_cover'] = $cover_file;
        }
        
        $setting->update($data);
        Alert::success(__('Congratulations'), __('Updated seccessfly'));
        return redirect()->route('admin.dashboard');

    }

    protected function uploadImage(Request $request, $setting, $file_name)
    {
        if (!$request->hasFile($file_name)) {
            return;
        }
        $file = $request->file($file_name);
        Storage::disk('upload')->delete('images' . $setting->website_logo);
        $path = $file->store('settings', [
            'disk' => 'upload'
        ]);
        return $path;
    }
}
