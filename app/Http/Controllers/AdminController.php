<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        $request->validate([
        'name' => 'required|string|max:255',
        'username' => 'required|string|max:255|unique:users,username',
        'phone' => 'required|string|max:15',
        'address' => 'required|string',
        'password' => 'required|string|min:6|confirmed',
        'role' => 'required|in:admin,warga',
        'status' => 'required',
    ]);

    // $photoPath = null;
    // if ($request->hasFile('photo')) {
    //     $photoPath = $request->file('photo')->store('profile_photos', 'public');
    // }

    User::create([
        'name' => $request->name,
        'username' => $request->username,
        'phone' => $request->phone,
        'address' => $request->address,
        'password' => bcrypt($request->password),
        'role' => $request->role,
        'status' => $request->has('is_active') ? 1 : 0,
    ]);
    return redirect()->back()->with('success', 'User berhasil ditambahkan!');
    }

    public function userTambahView(){
        $users['users'] = User::all();
        return view('admin.tambah.user', $users);
    }
}
