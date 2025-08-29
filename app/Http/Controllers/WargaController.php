<?php

namespace App\Http\Controllers;

use App\Models\dues_members;
use App\Models\Payment;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WargaController extends Controller
{
    public function dashboard(Request $request, $id)
    {
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
                    'petugas' => Auth::user()->id
                ]);
            }

        }

        $data['jumlah_tagihan'] = $jumlah_tagihan;
        $data['nominal_tagihan'] = $nominal_tagihan;
        $data['payment'] = $payment;
        $data['member'] = $member;
        return view('warga.dashboard', $data);
    }

    function hitungJumlahMinggu($tanggalAwal, $tanggalAkhir) {
        // Ubah ke format DateTime
        $awal = new DateTime($tanggalAwal);
        $akhir = new DateTime($tanggalAkhir);

        // Pastikan akhir lebih besar dari awal
        if ($akhir < $awal) {
            return "Tanggal akhir harus lebih besar dari tanggal awal!";
        }

        // Hitung selisih hari
        $selisih = $awal->diff($akhir)->days;

        // Hitung jumlah minggu (dibulatkan ke atas)
        $jumlahMinggu = ceil($selisih / 7);

        return $jumlahMinggu;
    }

    public function wargaAdmin()
    {
        $warga = User::where('role', 'warga')->get();

        return view('admin.warga', compact('warga'));
    }
    public function tagihanWarga(){
        $data['member'] = dues_members::get();
        return view('warga.payment', $data);
    }

}
