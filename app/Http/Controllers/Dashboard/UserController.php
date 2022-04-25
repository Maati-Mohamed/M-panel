<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(5);
        return view('dashboard.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('dashboard.users.create',['roles' => $roles]);
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
            'photo' => 'image',
            'password' => 'min:6',
            'role_id' => 'required',
        ]);
        $data = $request->except('photo','password','role_id');
        if($request->hasFile('photo')){
            $path = $request->file('photo')->store(
                'user','public_path'
            );
            $data['photo'] = $path;
        };
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);
        $user->roles()->sync($request->role_id);
        Alert::success(__('Congrates'), __('Added seccessfly'));
        return redirect()->route('dashboard.users.index');
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
    public function edit(User $user)
    {
        $roles = Role::all();

        return view('dashboard.users.edit',['user' => $user,'roles' => $roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|min:2',
            'email' => [ 'required',Rule::unique('users')->ignore($user->id)],
            'photo' => 'image',
            'role_id' => 'required',
        ]);

        $data = $request->except('photo','role_id');
        if($request->hasFile('photo')){
            Storage::disk('public_path')->delete($user->photo);
            $path = $request->file('photo')->store(
                'user','public_path'
            );
            $data['photo'] = $path;
        } else {
            unset($data['photo']);
        }
        $user->update($data);
        $user->roles()->sync($request->role_id);
        Alert::success(__('Congrates'), __('Updated seccessfly'));
        return redirect()->route('dashboard.users.index');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user = User::findOrFail($request->id);
        if($user->photo != 'user/user.png'){
            Storage::disk('public_path')->delete($user->photo);
        }
        $user->delete();
        Alert::success(__('Congrates'), __('Deleted seccessfly'));
        return redirect()->route('dashboard.users.index');
    }
}
