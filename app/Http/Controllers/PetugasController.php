<?php

namespace App\Http\Controllers;

use App\Models\dues_members;
use App\Models\Payment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    //
    public function officerAdmin(){

        $officer = User::where('role', 'officer')->get();
        return view('admin.officer', compact('officer'));
    }

    public function index()
    {
        $bulanIni = Carbon::now()->format('Y-m');

        $allMembers = dues_members::with(['user', 'category'])->get();

        $paidMemberIds = Payment::where('period', $bulanIni)->pluck('id_duesmember')->toArray();

        // Filter belum bayar
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
