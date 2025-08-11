<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    public function dashboard()
    {
        return view('warga.dashboard');
    }

    public function wargaAdmin()
    {
        $warga = User::where('role', 'warga')->get();

        return view('admin.warga', compact('warga'));
    }
    public function tagihanWarga(){
        return view('warga.payment');
    }

}
