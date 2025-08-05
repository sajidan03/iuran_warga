<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use PDO;

class LoginController extends Controller
{
    public function loginView(){
        return view('login.login');
    }
    public function login(Request $request)
{
    $request->validate([
        'username' => 'required|string',
        'password' => 'required|string',
    ]);

    $credentials = $request->only('username', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->route('warga.dashboard')->with('success', 'Login berhasil!');
    }

    return back()->withErrors([
        'login' => 'Username atau password salah',
    ])->onlyInput('username');
}
}
