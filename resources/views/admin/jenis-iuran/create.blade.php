@extends('admin.templateAdmin')

@section('content')
<div class="container mt-4">
    <h3>Buat Jenis Iuran</h3>

    <form action="{{ route('admin.jenisIuran.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Periode</label>
            <select name="period" class="form-control" required>
                <option value="">-- Pilih --</option>
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
            <label>Status</label>
            <select name="status" class="form-control" required>
                <option value="active" {{ isset($data) && $data->status == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ isset($data) && $data->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.jenisIuran.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
