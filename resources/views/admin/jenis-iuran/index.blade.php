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
                <th>Periode</th>
                <th>Nominal</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $index => $c)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ ucfirst($c->period) }}</td>
                <td>Rp {{ number_format($c->nominal,0,',','.') }}</td>
                <td>{{ $c->status }}</td>
                <td>
                    <a href="{{ route('admin.jenisIuran.edit', $c->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.jenisIuran.delete', $c->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
