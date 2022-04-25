<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $config = Config::first();
        return view('dashboard.configs.index',compact('config'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Config  $config
     * @return \Illuminate\Http\Response
     */
    public function edit(Config $config)
    {
        return view('dashboard.configs.edit',compact('config'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Config  $config
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Config $config)
    {
        $request->validate([
            'websiteName' => 'required|string',
            'description' => 'string'
        ]);
        $data = $request->except(['logo','photo']);
        if($request->hasFile('photo')){
            Storage::disk('public_path')->delete($config->photo);
            $path = $request->file('photo')->store('website','public_path');
            $data['photo'] = $path;
        }
        else {
            unset($data['photo']);
        }
        if($request->hasFile('logo')){
            Storage::disk('public_path')->delete($config->logo);
            $path = $request->file('logo')->store('website/logo','public_path');
            $data['logo'] = $path;
        }
        else {
            unset($data['logo']);
        }
        $config->update($data);
        Alert::success(__('Congrates'),__('Updated seccessfly'));
        return redirect()->route('dashboard.configs.index');
    }
    public function change_password(Request $request){
        $request->validate([
            'old_password' => 'required',
            'new_password' =>  'required|confirmed'
        ]);

        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with('error', __('Old password dose not match!'));
        }

        Admin::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password),
        ]);
        Alert::success(__('Congrates'),__('Updated seccessfly'));
        return redirect()->route('dashboard.configs.index');
        
    }
}
