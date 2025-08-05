<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login - DHQ Green</title>

  <!-- Bootstrap 5 CDN -->
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

    .login-card {
      background-color: #ffffff;
      border-radius: 15px;
      padding: 40px;
      box-shadow: 0 8px 16px rgba(0, 128, 0, 0.1);
      width: 100%;
      max-width: 400px;
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

  <div class="login-card">
    <h3 class="text-center text-success mb-4"><i class="fas fa-people-group"></i></i>Login</h3>

    <form action="/login" method="POST">
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" id="username" name="username" class="form-control" placeholder="Masukkan username" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan password" required>
      </div>
      <div class="d-grid">
        <button type="submit" class="btn btn-green">Masuk</button>
      </div>
    </form>

    <p class="text-center mt-3">
      Belum punya akun? <a href="/register" class="text-success">Daftar</a>
    </p>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
