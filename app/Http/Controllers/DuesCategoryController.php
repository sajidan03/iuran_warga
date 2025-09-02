<?php

namespace App\Http\Controllers;

use App\Models\dues_category;
use App\Models\DuesCategory;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class DuesCategoryController extends Controller
{
    public function index()
    {
        $categories = dues_category::all();
        return view('admin.jenis-iuran.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.jenis-iuran.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required|string|max:255',
            'period' => 'required|in:mingguan,bulanan,tahunan',
            'nominal' => 'required|integer|min:0',
            'status' => 'required|string|max:255'
        ]);

        dues_category::create($request->all());

        return redirect()->route('admin.jenisIuran.index')
            ->with('success', 'Jenis iuran berhasil dibuat.');
    }

    public function edit($id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException   $e) {
            $e->getMessage();
        }
        $category = dues_category::findOrFail($id);
        return view('admin.jenis-iuran.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'   => 'required|string|max:255',
            'period' => 'required|in:mingguan,bulanan,tahunan',
            'nominal' => 'required|integer|min:0',
            'status' => 'required|string|max:255'
        ]);

        $category = dues_category::findOrFail($id);
        $category->update($request->all());

        return redirect()->route('admin.jenisIuran.index')
            ->with('success', 'Jenis iuran berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $category = dues_category::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.jenisIuran.index')
            ->with('success', 'Jenis iuran berhasil dihapus.');
    }
}
