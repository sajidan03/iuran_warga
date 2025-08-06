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
        <div class="form-container">
            <h2 class="form-title"><i class="fas fa-user-plus me-2"></i>Add new user</h2>

            <form id="addUserForm">
                <div class="form-section">
                    <h5>Informasi Dasar</h5>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="namaLengkap" class="form-label required-field">Nama Lengkap</label>
                                <input type="text" class="form-control" id="namaLengkap" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="username" class="form-label required-field">Username</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                <input type="text" class="form-control" id="username" required>
                            </div>
                        </div>
                    </div>
                        <div class="col-md-6">
                            <label for="telepon" class="form-label">Nomor Telepon</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                <input type="tel" class="form-control" id="telepon">
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
                                <input type="password" class="form-control" id="password" required>
                                <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="confirmPassword" class="form-label required-field">Konfirmasi Password</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                <input type="password" class="form-control" id="confirmPassword" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <h5>Upload Foto Profil</h5>
                    <div class="row">
                        <div class="col-md-4">
                            <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/a47e61af-a99d-409b-ada4-7bde3507f0fd.png" alt="Preview foto profil - silakan upload gambar" id="profilePreview" class="profile-preview">
                            <div class="d-flex justify-content-center">
                                <input type="file" id="profilePhoto" class="d-none" accept="image/*">
                                <button type="button" class="btn btn-outline-primary btn-sm" id="uploadBtn">
                                    <i class="fas fa-upload me-1"></i>Upload Foto
                                </button>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label for="jabatan" class="form-label">Jabatan</label>
                                <select class="form-select" id="jabatan">
                                    <option value="">Admin</option>
                                    <option value="admin">Warga</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea class="form-control" id="alamat" rows="2"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <h5>Status</h5>
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" id="statusAktif" checked>
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
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('togglePassword').addEventListener('click', function() {
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

        document.getElementById('uploadBtn').addEventListener('click', function() {
            document.getElementById('profilePhoto').click();
        });

        document.getElementById('profilePhoto').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    document.getElementById('profilePreview').src = event.target.result;
                }
                reader.readAsDataURL(file);
            }
        });

        // Form validation and submission
        document.getElementById('addUserForm').addEventListener('submit', function(e) {
            e.preventDefault();

            // Simple validation
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirmPassword').value;

            if (password !== confirmPassword) {
                alert('Password dan konfirmasi password tidak cocok!');
                return;
            }

            // Here you would typically send the data to the server
            alert('User berhasil ditambahkan! (Ini hanya simulasi)');
            // this.reset();
        });
    </script>
@endsection
