@extends('officer.templateOfficer')

@section('content')
<div class="container mt-4">
    <h3>Pembayaran</h3>
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nama Warga</th>
            <th>Periode Pembayaran</th>
            <th>Nominal Pemyaran</th>
            <th>Aksi</th>
        </tr>
        @foreach ($member as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->user->name }}</td>
            <td>{{ $item->duesCategory->period }}</td>
            <td>{{ $item->duesCategory->nominal }}</td>
            <td><a href="{{ route('officer.payment.detail', $item->user->id) }}" class="btn btn-sm btn-primary">Lakukan Pembayaran</a></td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
          {{-- <td>
    <a href="{{ route('officer.payment.detail', Crypt::encrypt($item->user->id)) }}"
       class="btn btn-sm btn-primary">
       Lakukan Pembayaran
    </a>
</td> --}}
