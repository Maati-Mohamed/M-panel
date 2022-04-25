<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    protected $guard = 'web';

    public function __construct(Request $request)
    {
        if($request->is('*/dashboard/*')){
            $this->guard = 'admin';
        }
           
    }
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        if($this->guard == 'admin'){
            return view('admin-auth.login');
        } else {
            return view('auth.login');
        }
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate($this->guard);

        $request->session()->regenerate();

        return redirect()->intended($this->guard == 'admin' ? '/dashboard' : RouteServiceProvider::HOME);
    }
    
    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard($this->guard)->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        if($this->guard == 'admin') {
            return redirect()->route('dashboard.login');
        }else{
            return redirect()->route('login');
        }
        
    }
}
