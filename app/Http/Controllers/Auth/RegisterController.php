<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserDetail;
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

        $user = User::where('email', $request->email)->first();
        if($user != null){
            return back()->with('loginError', 'Email Sudah Terdaftar');
        }else{
            $data = new User;
            $data->username = $request->username;
            $data->email = $request->email;
            $data->password = Hash::make($request->password);
            $masuk = $data->save();
    
            if ($masuk) {
                $credentials = $request->only('username', 'password');
                Auth::attempt($credentials);
                $request->session()->regenerate();
                return redirect()->route('user_detail_form')->with('message', 'Berhasil register dan Login!');
            } 
        }
    }

    public function user_detail_form(){
        return view('auth.user_detail');
    }

    public function user_detail_process(Request $request){
        // dd($request->name.$request->address.$request->phone.$request->email.$request->id_user );
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'status' => 'required',
            'id_user' => 'required',
        ]);

        $data = new UserDetail;
        $data->name = $request->name;
        $data->address = $request->address;
        $data->phone = $request->phone;
        $data->status = $request->status;
        $data->id_user = $request->id_user;
        $masuk = $data->save();

        if($masuk){
            return back()->with(['success' => 'User Detail Berhasil Ditambahkan!']);
        }else {
            return back()->with('loginError', 'Gagal Tambah User Detail');
        }
    }

    public function user_profile(){
        $user = Auth::user();
        $id = $user->id;
        $detail_user = UserDetail::where('user_detail.id_user', $id)->first();
        
        return view('user.user_profile', compact('detail_user', 'id'));
    }

    
}
