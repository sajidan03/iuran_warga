<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Navbar Kaswarga</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>
<body>
  <nav class="container-fluid border-bottom" style="border-color: #145c40 !important;">
    <div class="container d-flex justify-content-between align-items-center py-2">
      <div class="d-flex align-items-center gap-2">
        <div class="bg-success text-white fw-bold rounded-circle d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
          K
        </div>
        <span class="fw-semibold">aswarga</span>
      </div>
              <div class="dropdown">
          <a href="#" class="d-flex align-items-center justify-content-center bg-success text-white rounded-circle text-decoration-none dropdown-toggle"
            id="dropdownProfile" role="button" data-bs-toggle="dropdown" aria-expanded="false"
            style="width: 36px; height: 36px; font-weight: bold;">
            M
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownProfile">
            <li><a class="dropdown-item" href="#">Profil</a></li>
            <li><a class="dropdown-item" href="/logout">Logout</a></li>
          </ul>
        </div>
      {{-- <div class="d-flex align-items-center gap-3">
        <a href="#" class="text-dark text-decoration-none">Fitur</a>
        <button class="btn btn-success d-flex align-items-center gap-2" {{ route('login') }}>
          <a href="/login" style="text-decoration: none; color: white;">Masuk</a>
          <i class="fas fa-arrow-right"></i>
        </button>
      </div> --}}
    </div>
  </nav>
  @yield('content')
</body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</html>
