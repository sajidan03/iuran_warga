<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login | Kaswarga</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    body {
      height: 100vh;
      margin: 0;
      display: flex;
    }

    .left-panel {
      background-color: #e6f0eb;
      flex: 1;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      padding: 40px;
    }

    .right-panel {
      flex: 1;
      background-color: #fff;
      display: flex;
      flex-direction: column;
      justify-content: center;
      padding: 60px;
    }

    .login-title {
      font-size: 1.5rem;
      font-weight: 600;
      margin-bottom: 24px;
    }

    .form-control {
      margin-bottom: 16px;
    }

    .btn-login {
      background-color: #5c8d7a;
      color: white;
    }

    .btn-login:hover {
      background-color: #4c7b69;
    }

    .divider {
      text-align: center;
      margin: 20px 0;
      position: relative;
    }

    .divider::before, .divider::after {
      content: "";
      height: 1px;
      background-color: #ccc;
      position: absolute;
      top: 50%;
      width: 40%;
    }

    .divider::before {
      left: 0;
    }

    .divider::after {
      right: 0;
    }
  </style>
</head>
<body>

  <div class="left-panel text-center">
    <img src="https://buserekspose.com/wp-content/uploads/2023/06/IMG-20230619-WA0122.jpg" alt="Exam Illustration" class="mb-4" style="max-width: 300px;">
    <h2 class="fw-bold">Kaswarga</h2>
    <p>.</p>
  </div>

  <div class="right-panel">
    <div class="d-flex align-items-center gap-1 mb-4">
      <div class="bg-success text-white fw-bold rounded-circle d-flex align-items-center justify-content-center"
           style="width: 56px; height: 56px; font-size: 1.5rem;">
        K
      </div>
      <span class="fw-bold" style="font-size: 1.8rem; margin-bottom: 4px">aswarga</span>
    </div>
    <div class="login-title">Sign In to Kaswarga</div>
    <form method="POST" action="/login">
      @csrf
      <p style="margin-bottom: 4px">Username</p>
      <input type="text" name="username" class="form-control" placeholder="Username or email" required>
      <p style="margin-bottom: 4px">Password</p>
      <input type="password" name="password" class="form-control" placeholder="Password" required>


      <button type="submit" class="btn btn-login w-100">Masuk</button>
    </form>
  </div>

</body>
</html>
