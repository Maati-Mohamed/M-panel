<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RoleController extends Controller
{
    public function  __construct()
    {
        $this->middleware('permission:roles-create', ['only' => ['create','store']]);
        $this->middleware('permission:roles-read',   ['only' => ['show', 'index']]);
        $this->middleware('permission:roles-update',   ['only' => ['edit','update']]);
        $this->middleware('permission:roles-delete',   ['only' => ['delete']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::paginate();
        return view('dashboard.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.roles.create');
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
            'name' => 'required|min:2',
            'description' => 'required|min:2',
            'display_name' => 'required|min:2',
        ]);
        
        $role = Role::create([
            'name' => $request->name,
            'description' => $request->description,
            'display_name' => $request->display_name
        ]);
        $role->syncPermissions($request->permissions);
        Alert::success(__('Congratulations'), __('Added seccessfly'));
        return redirect()->route('admin.roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        $permissions = $role->permissions()->groupBy('table')->get();
        return view('dashboard.roles.show', compact('role', 'permissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('dashboard.roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|min:2',
            'description' => 'required|min:2',
            'display_name' => 'required|min:2',
        ]);
        
        $role->update([
            'name' => $request->name,
            'description' => $request->description,
            'display_name' => $request->display_name
        ]);
        $role->syncPermissions($request->permissions);
        Alert::success(__('Congratulations'), __('Updated seccessfly'));
        return redirect()->route('admin.roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        Alert::success(__('Congratulations'), __('Deleted seccessfly'));
        return redirect()->route('admin.roles.index');
    }
}
