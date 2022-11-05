<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:users-create', ['only' => ['create','store']]);
        $this->middleware('permission:users-read',   ['only' => ['show', 'index']]);
        $this->middleware('permission:users-update',   ['only' => ['edit','update']]);
        $this->middleware('permission:users-delete',   ['only' => ['delete']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(7);
        return view('dashboard.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get();
        return view('dashboard.users.create', compact('roles'));
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
            'first_name' => 'required|string|min:2',
            'last_name' => 'required|string|min:2',
            'email' => 'required|unique:users,email',
            'photo' => 'image',
            'password' => 'min:6',
            
        ]);
        $data = $request->except('photo','password');
        if($request->hasFile('photo')){
            $path = $request->file('photo')->store(
                'users','upload'
            );
            $data['photo'] = $path;
        };
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);
        $user->syncRoles($request->roles);
        $user->syncPermissions(DB::table('permission_role')->whereIn('role_id',$request->roles)->pluck('permission_id'));
        Alert::success(__('Congratulations'), __('Added seccessfly'));
        return redirect()->route('admin.users.index');
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
    public function edit($id)
    {
        $roles = Role::get();
        $user = User::findOrFail($id);
        return view('dashboard.users.edit',compact('user', 'roles'));
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
            'first_name' => 'required|string|min:2',
            'last_name' => 'required|string|min:2',
            'email' => [ 'required',Rule::unique('users')->ignore($user->id)],
            'photo' => 'image',
            'roles' => 'required'
        ]);
    
        $data = $request->except('photo');
        if($request->password == null){
            unset($data['password']);
        }
        if($request->hasFile('photo')){
            Storage::disk('upload')->delete($user->photo);
            $path = $request->file('photo')->store(
                'users','upload'
            );
            $data['photo'] = $path;
        } else {
            unset($data['photo']);
        }
        $user->update($data);
        $user->syncRoles($request->roles);
        $user->syncPermissions(DB::table('permission_role')->whereIn('role_id',$request->roles)->pluck('permission_id'));
        Alert::success(__('Congratulations'), __('Updated seccessfly'));
        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $user = User::findOrFail($request->id);
        if($user->photo != 'admin/admin.jpg'){
            Storage::disk('upload')->delete($user->photo);
        }
        $user->delete();
        Alert::success(__('Congratulations'), __('Deleted seccessfly'));
        return redirect()->route('admin.users.index');
    }

    public function password()
    {
        return view('dashboard.profile.change_password');
    }
    
    public function change_password(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' =>  'required|confirmed'
        ]);

        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with('error', __('Old password dose not match!'));
        }

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password),
        ]);
        Alert::success(__('Congratulations'),__('Updated seccessfly'));
        return redirect()->route('admin.change_password');
    }
}
