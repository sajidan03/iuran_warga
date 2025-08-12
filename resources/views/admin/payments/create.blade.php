@extends('admin.templateAdmin')

@section('content')
<div class="container mt-4">
    <h3>Tambah Pembayaran</h3>

    <form action="{{ route('payments.store') }}" method="POST" style="max-width:500px;">
        @csrf

        <div class="mb-3">
            <label>Warga</label>
            <select name="id_user" class="form-control" required>
                <option value="">-- Pilih Warga --</option>
                @foreach($users as $u)
                    <option value="{{ $u->id }}">{{ $u->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Periode</label>
            <select name="period" class="form-control" required>
                <option value="mingguan">Mingguan</option>
                <option value="bulanan">Bulanan</option>
                <option value="tahunan">Tahunan</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Nominal</label>
            <input type="number" name="nominal" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Petugas</label>
            <input type="text" name="petugas" class="form-control" required>
        </div>

        <button class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
