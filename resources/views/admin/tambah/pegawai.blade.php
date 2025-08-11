@extends('admin.templateAdmin')
@section('content')
<title>Tambah Officer</title>
<style>
    .form-wrapper {
        background: #ffffff;
        border-radius: 8px;
        padding: 30px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }
    .form-title {
        color: #198754; /* warna hijau Bootstrap, mirip Kas Warga */
        margin-bottom: 25px;
        font-weight: 700;
        font-size: 1.6rem;
    }
    .form-label {
        font-weight: 500;
        color: #333;
    }
    .form-select {
        border-radius: 8px;
        padding: 0.6rem;
        border: 1px solid #ced4da;
        transition: border-color 0.3s ease;
    }
    .form-select:focus {
        border-color: #198754;
        box-shadow: 0 0 0 0.15rem rgba(25, 135, 84, 0.25);
    }
    .btn-primary {
        background-color: #198754;
        border: none;
        border-radius: 8px;
        padding: 0.5rem 1rem;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }
    .btn-primary:hover {
        background-color: #157347;
        transform: translateY(-1px);
    }
    .btn-outline-secondary {
        border-radius: 8px;
        padding: 0.5rem 1rem;
        transition: background-color 0.3s ease, color 0.3s ease;
    }
    .btn-outline-secondary:hover {
        background-color: #f1f1f1;
    }
</style>

<div class="container-fluid py-4">
    <div class="container">
        <form action="{{ route('officers.tambah.post') }}" method="POST">
            @csrf
            <div class="form-wrapper">
                <h2 class="form-title">
                    <i class="fas fa-user-plus me-2"></i>Tambah Officer
                </h2>

                <div class="mb-3">
                    <label for="id_user" class="form-label">Pilih User</label>
                    <select name="id_user" id="id_user" class="form-select" required>
                        <option value="">-- Pilih User --</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="d-flex justify-content-end gap-2 mt-4">
                    <button type="reset" class="btn btn-outline-secondary">
                        <i class="fas fa-undo me-1"></i>Reset
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i>Simpan Officer
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
