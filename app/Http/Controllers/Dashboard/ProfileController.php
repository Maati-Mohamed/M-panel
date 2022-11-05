<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    public function index()
    {
        
        $admin = auth()->user();
        //dd($admin->image_path);
        return view('dashboard.profile.index', compact('admin'));
    }
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'first_name' => 'required|min:2',
            'last_name' => 'required|min:2',
            'email' => 'required|email',
            
        ]);
        $data = $request->except('photo');

        if($request->hasFile('photo')){
            if($user->photo != 'admin/admin.jpg') {
                Storage::disk('upload')->delete($user->photo);
            }
            $path = $request->file('photo')->store('admin','upload');
            $data['photo'] = $path;
        }
        else {
            unset($data['photo']);
        }
        $user->update($data);
        Alert::success(__('Congratulations'),__('Updated seccessfly'));
        return redirect()->route('admin.profile.index');
    }
}
