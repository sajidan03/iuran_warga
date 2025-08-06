@extends('admin.templateAdmin')
@section('content')
<title>Tambah User</title>
<style>
    .form-container {
            max-width: 800px;
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
        .required-field::after {
            content: " *";
            color: red;
        }
        .form-section {
            margin-bottom: 25px;
        }
        .form-section h5 {
            color: #495057;
            border-bottom: 2px solid #dee2e6;
            padding-bottom: 8px;
            margin-bottom: 20px;
        }
        .action-buttons .btn {
            min-width: 120px;
        }
        .profile-preview {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #dee2e6;
            display: block;
            margin: 0 auto 20px;
        }
</style>

<div class="container-fluid py-4">
    <form id="addUserForm" action="{{ route('user.tambah.post') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-container">
            <h2 class="form-title"><i class="fas fa-user-plus me-2"></i>Add new user</h2>

            <div class="form-section">
                <h5>Informasi Dasar</h5>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="namaLengkap" class="form-label required-field">Nama Lengkap</label>
                        <input type="text" class="form-control" id="namaLengkap" name="name" required>
                    </div>
                    <div class="col-md-4">
                        <label for="username" class="form-label required-field">Username</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="telepon" class="form-label">Nomor Telepon</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                            <input type="tel" class="form-control" id="telepon" name="phone" required>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-section">
                <h5>Keamanan</h5>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="password" class="form-label required-field">Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input type="password" class="form-control" id="password" name="password" required>
                            <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="confirmPassword" class="form-label required-field">Konfirmasi Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input type="password" class="form-control" id="confirmPassword" name="password_confirmation" required>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-section">
                <h5>Upload Foto Profil</h5>
                <div class="row">
                    <div class="col-md-4">
                        <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/a47e61af-a99d-409b-ada4-7bde3507f0fd.png" alt="Preview foto profil" id="profilePreview" class="profile-preview">
                        <div class="d-flex justify-content-center">
                            <input type="file" id="profilePhoto" class="d-none" accept="image/*" name="photo">
                            <button type="button" class="btn btn-outline-primary btn-sm" id="uploadBtn">
                                <i class="fas fa-upload me-1"></i>Upload Foto
                            </button>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="mb-3">
                            <label for="jabatan" class="form-label">Jabatan</label>
                            <select class="form-select" id="jabatan" name="role" required>
                                <option value="admin">Admin</option>
                                <option value="warga">Warga</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" id="alamat" name="address" rows="2" required></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-section">
                <h5>Status</h5>
                <div class="form-check form-switch mb-3">
                    <input class="form-check-input" type="checkbox" id="statusAktif" name="status" value="1" checked>
                    <label class="form-check-label" for="statusAktif">User Aktif</label>
                </div>
            </div>

            <div class="action-buttons d-flex justify-content-end gap-2 mt-4">
                <button type="reset" class="btn btn-outline-secondary">
                    <i class="fas fa-undo me-1"></i>Reset
                </button>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-1"></i>Simpan User
                </button>
            </div>
        </div>
    </form>
</div>

<script>
    document.getElementById('togglePassword').addEventListener('click', function () {
        const passwordInput = document.getElementById('password');
        const icon = this.querySelector('i');
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            icon.classList.replace('fa-eye', 'fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            icon.classList.replace('fa-eye-slash', 'fa-eye');
        }
    });

    document.getElementById('uploadBtn').addEventListener('click', function () {
        document.getElementById('profilePhoto').click();
    });

    document.getElementById('profilePhoto').addEventListener('change', function (e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (event) {
                document.getElementById('profilePreview').src = event.target.result;
            };
            reader.readAsDataURL(file);
        }
    });

    // Validasi password JS
    document.getElementById('addUserForm').addEventListener('submit', function (e) {
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('confirmPassword').value;
        if (password !== confirmPassword) {
            e.preventDefault();
            alert('Password dan konfirmasi password tidak cocok!');
        }
    });
</script>
@endsection
