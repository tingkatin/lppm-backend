<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function login() {
        return view('auth.login');
    }

    public function postlogin (Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->rememberMe)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
 
        return back()->with('error', 'Email atau password tidak sesuai');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
 
        return redirect('/login');
    }


}
