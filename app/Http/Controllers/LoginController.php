<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDO;

class LoginController extends Controller
{
    public function loginView(){
        return view('login.login');
    }
    public function login(Request $request){
        
    }
}
