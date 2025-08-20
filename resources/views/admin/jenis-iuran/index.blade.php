@extends('admin.templateAdmin')

@section('content')
<div class="container mt-4">
    <h3>Daftar Jenis Iuran</h3>

    <a href="{{ route('admin.jenisIuran.create') }}" class="btn btn-success mb-3">+ Buat Iuran</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Periode</th>
            <th>Nominal</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($categories as $index => $c)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $c->name }}</td> {{-- <<< Tambah disini --}}
            <td>{{ ucfirst($c->period) }}</td>
            <td>Rp {{ number_format($c->nominal,0,',','.') }}</td>
            <td>
                <span class="badge bg-{{ $c->status == 'active' ? 'success' : 'secondary' }}">
                    {{ ucfirst($c->status) }}
                </span>
            </td>
            <td>
                <a href="{{ route('admin.jenisIuran.edit', $c->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.jenisIuran.delete', $c->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</button>
                    </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="text-center text-muted">Belum ada data</td>
        </tr>
        @endforelse
    </tbody>
</table>
</div>
@endsection
