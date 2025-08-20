@extends('officer.templateOfficer')

@section('content')
<div class="container mt-4">
    <h3>Dashboard Officer - Bulan {{ $bulanIni }}</h3>

    <h5>Belum Bayar</h5>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Warga</th>
                <th>Jenis Iuran</th>
                <th>Nominal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($belumBayar as $member)
                <tr>
                    <td>{{ $member->user->name }}</td>
                    <td>{{ ucfirst($member->category->period) }}</td>
                    <td>Rp {{ number_format($member->category->nominal) }}</td>
                    <td>
                        <form action="{{ route('officer.bayar', $member->id) }}" method="POST">
                            @csrf
                            <button class="btn btn-success btn-sm">Bayar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4">Semua sudah bayar</td></tr>
            @endforelse
        </tbody>
    </table>

    <h5 class="mt-5">Sudah Bayar</h5>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Warga</th>
                <th>Jenis Iuran</th>
                <th>Nominal</th>
            </tr>
        </thead>
        <tbody>
            @forelse($sudahBayar as $member)
                <tr>
                    <td>{{ $member->user->name }}</td>
                    <td>{{ ucfirst($member->category->period) }}</td>
                    <td>Rp {{ number_format($member->category->nominal) }}</td>
                </tr>
            @empty
                <tr><td colspan="3">Belum ada pembayaran</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
