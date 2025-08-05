<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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

        if (Auth::user()->role === 'admin') {
            return redirect()->route('admin.dashboard')->with('success', 'Login sebagai Admin berhasil!');
        } elseif (Auth::user()->role === 'warga') {
            return redirect()->route('warga.dashboard')->with('success', 'Login sebagai Warga berhasil!');
        } else {
            Auth::logout();
            return back()->withErrors([
                'login' => 'Role tidak dikenali.',
            ]);
        }
    }

    return back()->withErrors([
        'login' => 'Username atau password salah',
    ])->onlyInput('username');
}


    public function showRegister(){
        return view('login.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'username' => 'required|string|unique:users,username|max:255',
            'password' => 'required|string',
            'phone'    => 'required|string|max:20',
            'address'  => 'required|string|max:255',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'phone'    => $request->phone,
            'address'  => $request->address,
        ]);

        Auth::login($user);

        return redirect()->route('warga.dashboard')->with('success', 'Registrasi berhasil!');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('success', 'Anda telah berhasil logout.');
    }
}
