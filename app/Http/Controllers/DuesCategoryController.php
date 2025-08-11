<?php

namespace App\Http\Controllers;

use App\Models\dues_category;
use App\Models\DuesCategory;
use Illuminate\Http\Request;

class DuesCategoryController extends Controller
{
    public function index(Request $request)
    {
        $query = dues_category::query();
        if ($request->filled('search')) {
            $s = $request->input('search');
            $query->where('period', 'like', "%{$s}%")
                  ->orWhere('status', 'like', "%{$s}%");
        }
        $categories = $query->orderBy('id', 'desc')->paginate(10)->withQueryString();
        return view('admin.jenisIuran', compact('categories'));
    }

    // public function create()
    // {
    //     return view('admin.jenisIuran');
    // }

    // public function store(Request $request)
    // {
    //     $data = $request->validate([
    //         'period' => 'required|in:mingguan,bulanan,tahunan',
    //         'nominal' => 'required|integer|min:0',
    //         'status' => 'required|in:active,inactive',
    //     ]);
    //     dues_category::create($data);
    //     return redirect()->route('admin.jenisIuran')->with('success', 'Jenis iuran berhasil dibuat.');
    // }

    // public function edit($id)
    // {
    //     $category = dues_category::findOrFail($id);
    //     return view('jenis-iuran.edit', compact('category'));
    // }

    // public function update(Request $request, $id)
    // {
    //     $category = dues_category::findOrFail($id);
    //     $data = $request->validate([
    //         'period' => 'required|in:mingguan,bulanan,tahunan',
    //         'nominal' => 'required|integer|min:0',
    //         'status' => 'required|in:active,inactive',
    //     ]);
    //     $category->update($data);
    //     return redirect()->route('jenis-iuran.index')->with('success', 'Jenis iuran berhasil diperbarui.');
    // }

    // public function destroy($id)
    // {
    //     $category = dues_category::findOrFail($id);
    //     $category->delete();
    //     return redirect()->route('jenis-iuran.index')->with('success', 'Jenis iuran dihapus.');
    // }
}
