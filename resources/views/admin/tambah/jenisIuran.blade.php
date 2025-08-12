@extends('admin.templateAdmin')

@section('content')
<div class="container py-4">
    <h3>Tambah Jenis Iuran</h3>
    <form action="{{ route('admin.tambah.jenisIuran') }}" method="POST" class="mt-3" style="max-width:700px">
        @csrf
        <div class="mb-3">
            <label class="form-label">Periode</label>
            <select name="period" class="form-select" required>
                <option value="">Pilih periode</option>
                <option value="mingguan" {{ old('period')=='mingguan' ? 'selected' : '' }}>Mingguan</option>
                <option value="bulanan" {{ old('period')=='bulanan' ? 'selected' : '' }}>Bulanan</option>
                <option value="tahunan" {{ old('period')=='tahunan' ? 'selected' : '' }}>Tahunan</option>
            </select>
            @error('period') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Nominal</label>
            <input type="number" name="nominal" class="form-control" value="{{ old('nominal') }}" required>
            @error('nominal') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select" required>
                <option value="active" {{ old('status')=='active' ? 'selected':'' }}>Aktif</option>
                <option value="inactive" {{ old('status')=='inactive' ? 'selected':'' }}>Tidak Aktif</option>
            </select>
            @error('status') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <button class="btn btn-success">Simpan</button>
        {{-- <a href="{{ route('jenis-iuran.index') }}" class="btn btn-secondary">Batal</a> --}}
    </form>
</div>
@endsection
