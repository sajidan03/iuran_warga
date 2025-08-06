<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboardAdmin()
    {
        return view('admin.dashboard');
    }
    public function userView(Request $request)
    {
        $search = $request->input('search');
        $users = User::when($search, function ($query, $search) {
            $query->where('name', 'like', "%$search%")
                  ->orWhere('username', 'like', "%$search%")
                  ->orWhere("phone", "like", "%$search%")
                  ->orWhere("address", "like", "%$search%");
        })->get();
        return view('admin.users', compact('users'));
    }
    public function userEdit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users', compact('users'));
    }
    public function userTambah(Request $request){

    }
    public function userTambahView(){
        $users['users'] = User::all();
        return view('admin.tambah.user', $users);
    }
}
