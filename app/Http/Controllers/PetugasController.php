<?php

namespace App\Http\Controllers;

use App\Models\dues_members;
use App\Models\officer;
use App\Models\Payment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    //
    public function officerAdmin()
    {
        $officers = officer::with('user')->get();
        return view('admin.officers', compact('officers'));
    }

    public function create()
    {
        $users = User::where('role', '!=', 'officer')->get();
        return view('admin.officer_create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_user' => 'required|exists:users,id',
        ]);

        $user = User::findOrFail($request->id_user);

        Officer::create([
            'id_user' => $user->id,
            'previous_role' => $user->role,
        ]);

        $user->update(['role' => 'officer']);

        return redirect()->route('officers.index')->with('success', 'User berhasil dijadikan officer.');
    }

    public function destroy(officer $officer)
    {
        $user = $officer->user;

        $user->update(['role' => $officer->previous_role]);

        $officer->delete();

        return redirect()->route('officers.index')->with('success', 'Officer berhasil dihapus & role user dikembalikan.');
    }

    public function index()
    {
        $bulanIni = Carbon::now()->format('Y-m');

        $allMembers = dues_members::with(['user', 'category'])->get();

        $paidMemberIds = Payment::where('period', $bulanIni)->pluck('id_duesmember')->toArray();

        $belumBayar = $allMembers->whereNotIn('id', $paidMemberIds);
        $sudahBayar = $allMembers->whereIn('id', $paidMemberIds);

        return view('officer.dashboard', compact('belumBayar', 'sudahBayar', 'bulanIni'));
    }

    public function bayar(dues_members $member)
    {
        $bulanIni = Carbon::now()->format('Y-m');

        Payment::create([
            'id_user' => $member->id_user,
            'period' => $bulanIni,
            'nominal' => $member->category->nominal,
            // 'petugas' => auth()->user()->name,
        ]);

        return back()->with('success', 'Pembayaran berhasil dicatat.');
    }

}
