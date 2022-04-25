<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RoleController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::withCount('users')->paginate();
        return view('dashboard.roles.index',compact('roles'));
    }
    public function create()
    {
        return view('dashboard.roles.create');
    }
    public function store(Request $request,Role $role)
    {
        $request->validate([
            'name' => 'required|string',
            'abilities' => 'required|array',
        ]);

        $role->create($request->all());
        Alert::success(__('Congrates'),__('Add seccessfly'));
        return redirect()->route('dashboard.roles.index');
    }

    public function edit(Role $role)
    {
        return view('dashboard.roles.edit',['role' => $role]);
    }

    public function update(Request $request,Role $role)
    {
        $request->validate([
            'name' => 'required|string',
            'abilities' => 'required|array',
        ]);

        $role->update($request->all());
        Alert::success(__('Congrates'),__('Add seccessfly'));
        return redirect()->route('dashboard.roles.index');
    }
    public function destroy()
    {
      
    }
}
