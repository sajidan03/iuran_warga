@extends('admin.templateAdmin')

@section('content')
<div class="container mt-4">
    <h3>Daftar Pembayaran</h3>
    {{-- <a href="{{ route('payments.create') }}" class="btn btn-success mb-3">+ Tambah Pembayaran</a> --}}

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Warga</th>
                <th>Periode</th>
                <th>Nominal</th>
                <th>Petugas</th>
                {{-- <th>Aksi</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach($payments as $p)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $p->user->name }}</td>
                <td>{{ ucfirst($p->period) }}</td>
                <td>Rp{{ number_format($p->nominal) }}</td>
                <td>{{ $p->petugas }}</td>
                {{-- <td>
                    <a href="{{ route('payments.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('payments.destroy', $p->id) }}" method="POST" style="display:inline-block">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Yakin hapus data?')" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td> --}}
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
