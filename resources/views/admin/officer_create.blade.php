@extends('admin.templateAdmin')

@section('content')
<div class="container py-4">
    <h2 class="mb-4 fw-semibold">Tambah Officer</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('officers.store') }}" method="POST" class="card p-4 shadow-sm rounded-3">
        @csrf

        <div class="mb-3">
            <label for="id_user" class="form-label">Pilih User</label>
            <select name="id_user" id="id_user" class="form-control" required>
                <option value="">-- Pilih User --</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->username }}) - Role: {{ $user->role }}</option>
                @endforeach
            </select>
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('officers.index') }}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
@endsection
