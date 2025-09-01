@extends('officer.templateOfficer')

@section('content')
<div class="container mt-4">
    <h3>Pembayaran</h3>
    <form action="{{ route('officer.payment.detail', Crypt::encrypt($member->id_user)) }}" method="post">
        @csrf
        Nama Warga: {{ $member->user->name }}<br>
        Nominal Pembayaran:
        <input type="number" name="nominal" id="" class="form-control">
        <br>
        <input type="submit" value="Bayar"  name="bayar" class="btn btn-sm btn-primary">
    </form>
    <br>
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
<br>
    <h4>Daftar Pembayaran</h4>
    <hr>
    Total Tagihan: {{ $jumlah_tagihan }}
    <br>
    Nominal Tagihan: {{ $nominal_tagihan }}
    <table class="table table-bordered">
        <tr>
            <th>Pembayaran ke-</th>
            <th>Periode Pembayaran</th>
            <th>Nominal Pembyaran</th>
            <th>Tanggal Bayar</th>
            <th>Aksi</th>
        </tr>
        @foreach ($payment as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->period }}</td>
            <td>{{ $item->nominal }}</td>
            <td>{{ $item->created_at }}</td>
            <td><a href="{{ route('admin.dashboard') }}" class="btn btn-sm btn-danger">Cancel</a></td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
