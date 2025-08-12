@extends('admin.templateAdmin')

@section('content')
<div class="container mt-4">
    <h3>Daftar Anggota Iuran</h3>
    <a href="{{ route('dues_members.create') }}" class="btn btn-success mb-3">+ Tambah Anggota</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

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
            @foreach($members as $member)
            <tr>
                <td>{{ $member->user->name }}</td>
                <td>{{ ucfirst($member->duesCategory->period) }}</td>
                <td>Rp{{ number_format($member->duesCategory->nominal) }}</td>
                <td>
                    <a href="{{ route('dues_members.edit', $member->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('dues_members.destroy', $member->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
