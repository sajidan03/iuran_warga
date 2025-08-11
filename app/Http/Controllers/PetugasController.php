<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    //
    public function officerAdmin(){

        $officer = User::where('role', 'officer')->get();
        return view('admin.officer', compact('officer'));
    }
}
