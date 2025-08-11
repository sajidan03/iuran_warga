@extends('admin.templateAdmin')
@section('content')
<div class="container py-4">
    <h2 class="mb-4 fw-semibold">Data Pengguna</h2>

    <form action="#" method="GET" class="row g-3 mb-3">
        <div class="col-auto">
            <input type="text" name="search" class="form-control" placeholder="Cari nama / username" value="{{ request('search') }}">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary">Cari</button>
        </div>
        <div class="col-auto">
            <a href="{{ route('officers.tambah') }}" class="btn btn-success">+ Tambah Pengguna</a>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">id_user</th>
                    <th scope="col" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($officers as $user)
                <tr>
                    <td>{{ $user->user->id }}</td>
                    <td>{{ $user->user->name}}</td>
                    <td class="text-center">
                        <a href="{{ route('users.edit', $user->user->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('users.delete', $user->user->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin hapus?')">
                            @csrf
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center text-muted">Tidak ada data pengguna.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
