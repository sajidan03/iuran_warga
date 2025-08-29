@extends('warga.templateWarga')

@section('content')
<div class="container mt-4">
    <h3>Pembayaran</h3>
    <br>
    <h4>Daftar Pembayaran</h4>
    <hr>
    Total Tagihan: {{ $jumlah_tagihan }}<br>
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
            <td><a href="route" class="btn btn-sm btn-danger">Cancel</a></td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
