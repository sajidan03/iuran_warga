@extends('admin.templateAdmin')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Daftar Warga</h3>
        <form class="d-flex" style="max-width: 300px;">
            <input type="text" class="form-control me-2" placeholder="Cari warga...">
            <button class="btn btn-primary">Cari</button>
        </form>
    </div>
    <table class="table table-bordered align-middle">
        <thead class="table-light">
            <tr>
                <th style="width: 50px;">No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th style="width: 150px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($warga as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->address ?? '-' }}</td>
                <td>
                    <a href="#" class="btn btn-danger btn-sm">Hapus</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
