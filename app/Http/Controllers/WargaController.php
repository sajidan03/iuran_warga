<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WargaController extends Controller
{
    public function dashboard()
    {
        return view('warga.dashboard');
    }
    public function tagihanWarga(){
        return view('warga.payment');
    }
}
