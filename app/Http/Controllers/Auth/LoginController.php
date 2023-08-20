<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout', 'dashboard'
        ]);
    }

    public function login()
    {
        return view('auth.login');
    }

    public function login_process(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('product');
        }
 
        return back()->with('loginError', 'Gagal Login!');
    
    }

    public function dashboard()
    {
        return view('auth.dashboard');
        // if(Auth::check())
        // {
            
        // }else{
        //     return redirect()->route('login')
        //     ->with([
        //     'loginError' => 'Silahkan login untuk berbelanja!',
        //     ])->onlyInput('email');
        // }
        
        
    }

    public function logout (Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')
            ->with('success','Anda berhasil Logout!');
    }
}
