<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Iuran Warga</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-light">

  <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container-fluid">
      <a class="navbar-brand fw-bold" href="#">IuranWarga</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link active" href="#">Dashboard</a></li>
          <li class="nav-item"><a class="nav-link" href="#">User</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Officer</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Dues Category</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Dues Members</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Payment</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Keluar</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container py-4">
    <h2 class="mb-4 fw-semibold">Dashboard</h2>
    <div class="row g-4">

      <div class="col-md-4">
        <div class="card border-0 shadow-sm">
          <div class="card-body">
            <h5 class="card-title">Total Warga</h5>
            <p class="display-6 fw-bold text-primary">120</p>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card border-0 shadow-sm">
          <div class="card-body">
            <h5 class="card-title">Iuran Masuk Bulan Ini</h5>
            <p class="display-6 fw-bold text-success">Rp 3.000.000</p>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card border-0 shadow-sm">
          <div class="card-body">
            <h5 class="card-title">Belum Bayar</h5>
            <p class="display-6 fw-bold text-danger">15 Warga</p>
          </div>
        </div>
      </div>

    </div>

    <div class="mt-5">
      <h4 class="mb-3">Data Iuran Terbaru</h4>
      <div class="table-responsive">
        <table class="table table-hover align-middle">
          <thead class="table-light">
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Blok</th>
              <th>Status</th>
              <th>Tanggal Bayar</th>
              <th>Jumlah</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Ahmad Fikri</td>
              <td>A1</td>
              <td><span class="badge bg-success">Lunas</span></td>
              <td>01-08-2025</td>
              <td>Rp 50.000</td>
            </tr>
            <tr>
              <td>2</td>
              <td>Siti Aisyah</td>
              <td>B3</td>
              <td><span class="badge bg-danger">Belum Bayar</span></td>
              <td>-</td>
              <td>-</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

  </div>

</body>
</html>

