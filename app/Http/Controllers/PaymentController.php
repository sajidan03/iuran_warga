<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\User;
use Faker\Provider\ar_EG\Payment as Ar_EGPayment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    //
    public function index()
    {
        $payments = Payment::with('user')->latest()->get();
        return view('admin.payments.index', compact('payments'));
    }

    public function create()
    {
        $users = User::where('role', 'warga')->get();
        return view('admin.payments.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_user' => 'required|exists:users,id',
            'period' => 'required|string',
            'nominal' => 'required|numeric',
            'petugas' => 'required|string'
        ]);

        Payment::create($request->all());

        return redirect()->route('payments.index')->with('success', 'Pembayaran berhasil ditambahkan.');
    }

    public function edit(Payment $payment)
    {
        $users = User::where('role', 'warga')->get();
        return view('admin.payments.edit', compact('payment', 'users'));
    }

    public function update(Request $request, Payment $payment)
    {
        $request->validate([
            'id_user' => 'required|exists:users,id',
            'period' => 'required|string',
            'nominal' => 'required|numeric',
            'petugas' => 'required|string'
        ]);

        $payment->update($request->all());

        return redirect()->route('payments.index')->with('success', 'Data pembayaran berhasil diperbarui.');
    }

    public function destroy(Payment $payment)
    {
        $payment->delete();
        return redirect()->route('payments.index')->with('success', 'Data pembayaran berhasil dihapus.');
    }
}
