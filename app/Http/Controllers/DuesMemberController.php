<?php

namespace App\Http\Controllers;

use App\Models\dues_category;
use App\Models\dues_members;
use App\Models\User;
use Illuminate\Http\Request;

class DuesMemberController extends Controller
{
    //
    public function index()
    {
        $members = dues_members::with(['user', 'duesCategory'])->get();
        return view('admin.dues_members.index', compact('members'));
    }

    public function create()
    {
        $users = User::where('role', 'warga')->get();
        $categories = dues_category::all();
        return view('admin.dues_members.create', compact('users', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_user' => 'required|exists:users,id',
            'id_duescategory' => 'required|exists:dues_categories,id',
        ]);

        dues_members::create($request->all());

        return redirect()->route('dues_members.index')->with('success', 'Anggota iuran berhasil ditambahkan.');
    }

    public function edit(dues_members $duesMember)
    {
        $users = User::where('role', 'warga')->get();
        $categories = dues_category::all();
        return view('admin.dues_members.edit', compact('duesMember', 'users', 'categories'));
    }

    public function update(Request $request, dues_members $duesMember)
    {
        $request->validate([
            'id_user' => 'required|exists:users,id',
            'id_duescategory' => 'required|exists:dues_categories,id',
        ]);

        $duesMember->update($request->all());

        return redirect()->route('dues_members.index')->with('success', 'Data anggota iuran berhasil diperbarui.');
    }

    public function destroy(dues_members $duesMember)
    {
        $duesMember->delete();
        return redirect()->route('dues_members.index')->with('success', 'Data berhasil dihapus.');
    }
}
