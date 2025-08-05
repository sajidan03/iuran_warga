<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register Kaswarga</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

  <style>
    body {
      background-color: #e8f5e9;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }

    .register-card {
      background-color: #ffffff;
      border-radius: 15px;
      padding: 40px;
      box-shadow: 0 8px 16px rgba(0, 128, 0, 0.1);
      width: 100%;
      max-width: 500px;
    }

    .btn-green {
      background-color: #43a047;
      color: white;
    }

    .btn-green:hover {
      background-color: #388e3c;
    }

    .form-control:focus {
      border-color: #66bb6a;
      box-shadow: 0 0 0 0.2rem rgba(76, 175, 80, 0.25);
    }
  </style>
</head>
<body>

  <div class="register-card">
    <h3 class="text-center text-success mb-4"><i class="fas fa-user-plus"></i> Daftar Akun</h3>
    <form action="/register" method="POST">
        @csrf
      <div class="mb-3">
        <label for="name" class="form-label">Nama Lengkap</label>
        <input type="text" id="name" name="name" class="form-control" placeholder="Masukkan nama lengkap" required>
      </div>

      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" id="username" name="username" class="form-control" placeholder="Masukkan username" required>
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan password" required>
      </div>

      <div class="mb-3">
        <label for="no_hp" class="form-label">No HP</label>
        <input type="tel" id="phone" name="phone" class="form-control" placeholder="08xxxxxxxxxx" required>
      </div>

      <div class="mb-3">
        <label for="address" class="form-label">Alamat</label>
        <textarea id="address" name="address" class="form-control" rows="2" placeholder="Masukkan alamat lengkap" required></textarea>
      </div>

      <div class="d-grid">
        <button type="submit" class="btn btn-green" name="register.post">Daftar</button>
      </div>
    </form>

    <p class="text-center mt-3">
      Sudah punya akun? <a href="/login" class="text-success">Login</a>
    </p>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
