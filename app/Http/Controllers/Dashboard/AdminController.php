<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Notifications\AddNewAdmin;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::where('id','!=',1)->paginate(5);
        return view('dashboard.admins.index',compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:2',
            'email' => 'required|unique:users,email',
            'password' => 'min:6'
        ]);

        $data = $request->except('photo','password');
        if($request->hasFile('photo')){
            $path = $request->file('photo')->store(
                'user','public_path'
            );
            $data['photo'] = $path;
        };
        $data['password'] = Hash::make($request->password);
        Admin::create($data);

        $admin = Admin::find(auth()->user()->id);
        $admin->notify(new AddNewAdmin($admin));


        Alert::success(__('Congrates'), __('Added seccessfly'));
       return redirect()->route('dashboard.admins.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        return view('dashboard.admins.edit',compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        $request->validate([
            'name' => 'required|string|min:2',
            'email' => [ 'required',Rule::unique('admins')->ignore($admin->id)],
            'photo' => 'image',
        ]);

        $data = $request->except('photo');
        if($request->hasFile('photo')){
            Storage::disk('public_path')->delete($admin->photo);
            $path = $request->file('photo')->store(
                'admin','public_path'
            );
            $data['photo'] = $path;
        } else {
            unset($data['photo']);
        }
        $admin->update($data);
        Alert::success(__('Congrates'), __('Updated seccessfly'));
        return redirect()->route('dashboard.admins.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $admin = Admin::findOrFail($request->id);
        if($admin->photo != 'admin/admin.jpg'){
            Storage::disk('public_path')->delete($admin->photo);
        }
        $admin->delete();
        Alert::success(__('Congrates'), __('Deleted seccessfly'));
        return redirect()->route('dashboard.admins.index');
    }
}
