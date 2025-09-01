<?php

namespace App\Http\Controllers;

use App\Models\dues_members;
use App\Models\officer;
use App\Models\Payment;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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


    public function payment(){
        $data['member'] = dues_members::get();
        return view('officer.payment', $data);
    }

    public function payment_detail(Request $request, $id){
        $member= dues_members::where('id_user',$id)->first();
        $payment = Payment::where('id_user', $member->id_user)->get();

        $tanggalAwal = "01-08-2025";
        $tanggalAkhir = date('d-m-Y');
        $jumlahMinggu = $this->hitungJumlahMinggu($tanggalAwal, $tanggalAkhir);

        if($payment->count() > $jumlahMinggu){
            $jumlah_tagihan = "Tidak Ada";
            $nominal_tagihan = 0;
        }else{
            $jumlah_tagihan = $jumlahMinggu - $payment->count() . " kali pembayaran";
            $nominal_tagihan = ($jumlahMinggu - $payment->count()) * $member->duesCategory->nominal;
        }

        if($request->bayar){
            $nominal_bayar = $request->nominal;
            $nominal_kategori = $member->duesCategory->nominal;

            $jumlah_bayar = $nominal_bayar / $nominal_kategori;
            for($i = 0; $i < $jumlah_bayar; $i++){
                Payment::create([
                    'id_user' => $member->id_user,
                    'nominal' => $nominal_kategori,
                    'period' => $member->duesCategory->period,
                    'id_petugas' => Auth::user()->id
                ]);
            }

        }

        $data['jumlah_tagihan'] = $jumlah_tagihan;
        $data['nominal_tagihan'] = $nominal_tagihan;
        $data['payment'] = $payment;
        $data['member'] = $member;
        return view('officer.payment_detail', $data);
    }

    function hitungJumlahMinggu($tanggalAwal, $tanggalAkhir) {
        $awal = new DateTime($tanggalAwal);
        $akhir = new DateTime($tanggalAkhir);

        if ($akhir < $awal) {
            return "Tanggal akhir harus lebih besar dari tanggal awal!";
        }

        $selisih = $awal->diff($akhir)->days;

        $jumlahMinggu = ceil($selisih / 7);

        return $jumlahMinggu;
    }

}
