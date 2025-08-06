<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login | DHQ Green</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />

  <style>
    :root {
      --green-dark: #004030;
      --green-soft: #4A9782;
      --beige: #DCD0A8;
      --light-beige: #FFF9E5;
    }

    body, html {
      margin: 0;
      padding: 0;
      height: 100%;
      font-family: 'Segoe UI', sans-serif;
      background-color: var(--light-beige);
    }

    .login-page {
      display: flex;
      height: 100vh;
    }

    .login-left {
      background-color: var(--green-dark);
      color: var(--light-beige);
      flex: 1;
      padding: 60px;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .login-left h1 {
      font-size: 2.5rem;
      font-weight: bold;
    }

    .login-left p {
      color: var(--beige);
      margin-bottom: 30px;
    }

    .form-control {
      background-color: var(--light-beige);
      border: 1px solid #ccc;
      color: #000;
    }

    .form-control::placeholder {
      color: var(--beige);
    }

    .form-control:focus {
      background-color: #ffffff;
      color: #000;
      box-shadow: 0 0 0 0.25rem rgba(74, 151, 130, 0.3);
    }

    .btn-custom {
      background-color: var(--green-soft);
      color: #fff;
      border: none;
    }

    .btn-custom:hover {
      background-color: #3e7c6d;
    }

    .login-right {
      flex: 1;
      background: url('/assets/bg.jpg') no-repeat center center;
      background-size: cover;
    }

    @media (max-width: 768px) {
      .login-page {
        flex-direction: column;
      }
      .login-right {
        height: 250px;
      }
    }
  </style>
</head>
<body>

<div class="login-page">
  <div class="login-left">
    <div class="d-flex align-items-center gap-2">
      <div class="bg-white text-dark fw-bold rounded-circle d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
        K
      </div>
      <span class="fw-semibold" style="margin-left: -6px; color: var(--beige);">aswarga</span>
    </div>
    <p style="margin-top: 10px">Log in untuk melanjutkan</p>

    <form method="POST" action="/login">
      @csrf
      <div class="mb-3">
        <input type="email" class="form-control" placeholder="Email address" name="username" required />
      </div>
      <div class="mb-3">
        <input type="password" class="form-control" placeholder="Password" name="password" required />
      </div>
      <div class="d-flex gap-2">
        <button type="submit" class="btn btn-custom w-100">Login</button>
      </div>
    </form>
  </div>

  <div class="login-right"></div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
