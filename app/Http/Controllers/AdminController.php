<?php

namespace App\Http\Controllers;

use App\Models\officer;
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
    public function userEditView($id)
    {
        $user = User::findOrFail($id);
        return view('admin.edit.user', compact('user'));
    }
    public function userTambah(Request $request){
        $request->validate([
        'name' => 'required|string|max:255',
        'username' => 'required|string|max:255|unique:users,username',
        'phone' => 'required|string|max:15',
        'address' => 'required|string',
        'password' => 'required|string|confirmed',
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
    return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan!');
    }


    public function userEdit(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'username' => 'required|string|max:255|unique:users,username,' . $id,
        'phone' => 'nullable|string|max:20',
        'address' => 'required|string|max:500',
        'role' => 'required|in:admin,warga',
        'password' => 'nullable',
    ]);

    $user = User::findOrFail($id);

    $user->name = $request->name;
    $user->username = $request->username;
    $user->phone = $request->phone;
    $user->address = $request->address;
    $user->role = $request->role;
    $user->status = $request->has('status') ? 1 : 0;

    if ($request->password) {
        $user->password = bcrypt($request->password);
    }

    // if ($request->hasFile('photo')) {
    //     if ($user->photo && Storage::exists('public/' . $user->photo)) {
    //         Storage::delete('public/' . $user->photo);
    //     }
    //     $file = $request->file('photo')->store('user_photos', 'public');
    //     $user->photo = $file;
    // }
    $user->save();
    return redirect()->route('users.index')->with('success', 'User berhasil diperbarui.');
}
    public function userTambahView(){
        $users['users'] = User::all();
        return view('admin.tambah.user', $users);
    }
    public function userDelete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User berhasil dihapus.');
    }
    public function officersView(){
        $officers = officer::with('user')->get();
        return view('admin.officers', compact('officers'));
    }
    public function officerTambah(Request $request){
        $request->validate([
            'id_user' => 'required|exists:users,id',
        ]);

        officer::create([
            'id_user' => $request->id_user,
        ]);
        return redirect()->route('officers.index')->with('success', 'Petugas berhasil ditambahkan!');
    }

    public function officerTambahView(){
        $users['users'] = User::all();
        return view('admin.tambah.pegawai', $users);
    }
}
