<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Warga - Iuran Warga</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-light">

  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand fw-bold" href="#">IuranWarga</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link active" href="#">Beranda</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Info Iuran</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Riwayat Pembayaran</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Profil Saya</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Keluar</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container py-4">
    <h2 class="mb-4">Selamat Datang, Warga!</h2>

    <div class="row g-4">
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Tagihan Bulan Ini</h5>
            <p class="fs-4 text-danger">Rp 100.000</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Total Sudah Dibayar</h5>
            <p class="fs-4 text-success">Rp 2.500.000</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Status Pembayaran</h5>
            <p class="fs-4 text-warning">Belum Lunas</p>
          </div>
        </div>
      </div>
    </div>

    <div class="mt-5">
      <h4 class="mb-3">Riwayat Pembayaran</h4>
      <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <thead class="table-primary">
            <tr>
              <th>#</th>
              <th>Tanggal</th>
              <th>Kategori</th>
              <th>Jumlah</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>01-08-2025</td>
              <td>Iuran Bulanan</td>
              <td>Rp 100.000</td>
              <td><span class="badge bg-success">Lunas</span></td>
            </tr>
            <tr>
              <td>2</td>
              <td>01-07-2025</td>
              <td>Iuran Bulanan</td>
              <td>Rp 100.000</td>
              <td><span class="badge bg-success">Lunas</span></td>
            </tr>
            <tr>
              <td>3</td>
              <td>01-06-2025</td>
              <td>Iuran Bulanan</td>
              <td>Rp 100.000</td>
              <td><span class="badge bg-danger">Belum Bayar</span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <div class="mt-5">
      <h4 class="mb-3">Profil Saya</h4>
      <div class="card">
        <div class="card-body">
          <p><strong>Nama:</strong> Muhammad Firdaus</p>
          <p><strong>No HP:</strong> 081234567890</p>
          <p><strong>Alamat:</strong> Jl. Melati No. 10</p>
          <p><strong>Username:</strong> firdaus123</p>
        </div>
      </div>
    </div>
  </div>

</body>
</html>
