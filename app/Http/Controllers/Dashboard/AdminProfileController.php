<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class AdminProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = auth()->user();
        return view('dashboard.profile.index',compact('admin'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $admin = auth()->user();
        return view('dashboard.profile.edit',compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $admin = Admin::findOrFail($id);
        $request->validate([
            'name' => 'required|min:2',
            'email' => 'required|email',
            
        ]);
        $data = $request->except('photo');

        if($request->hasFile('photo')){
            Storage::disk('public_path')->delete($admin->photo);
            $path = $request->file('photo')->store('admin','public_path');
            $data['photo'] = $path;
        }
        else {
            unset($data['photo']);
        }
        $admin->update($data);
        Alert::success(__('Congrates'),__('Updated seccessfly'));
        return redirect()->route('dashboard.profile.index');
    }
}
