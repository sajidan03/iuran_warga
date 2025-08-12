@extends('admin.templateAdmin')

@section('content')
<div class="container mt-4">
    <h3>Tambah Anggota Iuran</h3>

    <form action="{{ route('dues_members.store') }}" method="POST" style="max-width:500px;">
        @csrf

        <div class="mb-3">
            <label>Warga</label>
            <select name="id_user" class="form-control" required>
                <option value="">Pilih Warga</option>
                @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Jenis Iuran</label>
            <select name="id_duescategory" class="form-control" required>
                <option value="">Pilih Jenis Iuran</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ ucfirst($category->period) }} - Rp{{ number_format($category->nominal) }}</option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
