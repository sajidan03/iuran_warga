@extends('admin.templateAdmin')

@section('content')
<div class="container py-4">
    <h2 class="mb-4 fw-semibold">Data Officer</h2>

    <div class="mb-3">
        <a href="{{ route('officers.create') }}" class="btn btn-success">+ Tambah Officer</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Username</th>
                    <th scope="col">Role Sebelum Jadi Officer</th>
                    <th scope="col" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($officers as $officer)
                <tr>
                    <td>{{ $officer->id }}</td>
                    <td>{{ $officer->user->name ?? '-' }}</td>
                    <td>{{ $officer->user->username ?? '-' }}</td>
                    <td>{{ $officer->previous_role ?? '-' }}</td>
                    <td class="text-center">
                        <form action="{{ route('officers.destroy', $officer->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus officer ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">Belum ada officer.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
