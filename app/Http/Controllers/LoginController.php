<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        $title = "Login";
        return view('login')->with('title', $title);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ],[
            'username.required' => 'Masukkan username!',
            'password.required' => 'Masukkan password!',
        ]);

        
        if (Auth::attempt($credentials)){
            $request->session()->regenerate();

            $user = Auth::user();

            // if ($user->jabatan === 'Pimpinan') {
            //     return redirect()->intended('/laporan_kas_masuk');
            // }

            return redirect()->intended('/home');
        }

        return back()->with('loginError', 'Login gagal! Username atau Password salah!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
