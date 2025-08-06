<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
  <title>Kas Warga</title>
</head>

<body>
  <nav class="border-bottom" style="border-color: #145c40 !important;">
    <div class="container d-flex justify-content-between align-items-center py-2">
      <div class="d-flex align-items-center gap-2">
        <div class="bg-success text-white fw-bold rounded-circle d-flex justify-content-center align-items-center"
          style="width: 32px; height: 32px;">
          K
        </div>
        <span class="fw-semibold">kaswarga.ypc</span>
      </div>

      <div class="d-flex align-items-center gap-3">
        <a href="#" class="text-dark text-decoration-none">Fitur</a>
        <style>

        </style>
        <a href="{{ route('users.index') }}">User</a>
        <a href="">Warga</a>
        <a href="">Petugas</a>
        <a href="/login" class="btn btn-success d-flex align-items-center gap-2">
          Masuk
          <i class="fas fa-arrow-right"></i>
        </a>
      </div>
    </div>
  </nav>

  @yield('content')

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
