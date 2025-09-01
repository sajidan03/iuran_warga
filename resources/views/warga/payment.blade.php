@extends('warga.templateWarga')

@section('content')
<div class="container mt-4">
    <h4>History pembayaran</h4>
    <hr>
    <table class="table table-bordered">
        <tr>
            <th>Pembayaran ke-</th>
            <th>Periode Pembayaran</th>
            <th>Nominal Pembayaran</th>
            <th>Tanggal Bayar</th>
        </tr>
        @foreach ($member as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->period }}</td>
            <td>{{ $item->nominal }}</td>
            <td>{{ $item->created_at }}</td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
