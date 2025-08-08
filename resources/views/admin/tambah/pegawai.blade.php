@extends('admin.templateAdmin')
@section('content')
<title>Tambah Officer</title>
<style>
    .form-container {
        max-width: 500px;
        margin: 30px auto;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        background-color: #fff;
    }
    .form-title {
        color: #0d6efd;
        margin-bottom: 25px;
        text-align: center;
        font-weight: 600;
    }
</style>

<div class="container-fluid py-4">
    <form action="{{ route('officers.tambah.post') }}" method="POST">
        @csrf
        <div class="form-container">
            <h2 class="form-title"><i class="fas fa-user-plus me-2"></i>Tambah Officer</h2>

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
@endsection
