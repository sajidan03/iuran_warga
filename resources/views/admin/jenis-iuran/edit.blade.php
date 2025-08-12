@extends('admin.templateAdmin')

@section('content')
<div class="container mt-4">
    <h3>Edit Jenis Iuran</h3>

    <form action="{{ route('admin.jenisIuran.update', $category->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Periode</label>
            <select name="period" class="form-control" required>
                <option value="mingguan" {{ $category->period == 'mingguan' ? 'selected' : '' }}>Mingguan</option>
                <option value="bulanan" {{ $category->period == 'bulanan' ? 'selected' : '' }}>Bulanan</option>
                <option value="tahunan" {{ $category->period == 'tahunan' ? 'selected' : '' }}>Tahunan</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Nominal</label>
            <input type="number" name="nominal" class="form-control" value="{{ $category->nominal }}" required>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <input type="text" name="status" class="form-control" value="{{ $category->status }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.jenisIuran.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
