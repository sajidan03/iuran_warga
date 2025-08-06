<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Document</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container-fluid">
      <a class="navbar-brand fw-bold" href="#">kaswarga.ypc</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link active" href="/admin/dashboard">Dashboard</a></li>
          <li class="nav-item"><a class="nav-link" href="/user">User</a></li>
          <li class="nav-item"><a class="nav-link" href="/user">Warga</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Officer</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Dues Category</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Dues Members</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Payment</a></li>
          <li class="nav-item"><a class="nav-link" href="/logout">Keluar</a></li>
        </ul>
      </div>
    </div>
  </nav>
    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
