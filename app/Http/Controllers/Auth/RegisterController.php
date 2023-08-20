<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required',
        ]);

        $data = new User;
        $data->username = $request->username;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $masuk = $data->save();

        if ($masuk) {
            $credentials = $request->only('username', 'password');
            Auth::attempt($credentials);
            $request->session()->regenerate();
            // return redirect()->route('dashboard')->with('message', 'Berhasil register dan Login!');
            return redirect()->intended('product');
        } 
        

        
    }

    
}
