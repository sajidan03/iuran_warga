@extends('warga.templateWarga')
@section('content')
<body class="bg-light">
  <div class="container py-4">
    <h2 class="mb-4 fw-semibold">Dashboard Warga</h2>
    <div class="row g-4">

      <div class="col-md-4">
        <div class="card border-0 shadow-sm">
          <div class="card-body">
            <h5 class="card-title">Total Iuran Dibayar</h5>
            <p class="display-6 fw-bold text-success">Rp 350.000</p>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card border-0 shadow-sm">
          <div class="card-body">
            <h5 class="card-title">Iuran Belum Dibayar</h5>
            <p class="display-6 fw-bold text-danger">Rp 50.000</p>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card border-0 shadow-sm">
          <div class="card-body">
            <h5 class="card-title">Iuran Bulan Ini</h5>
            <p class="display-6 fw-bold text-warning">Rp 25.000</p>
          </div>
        </div>
      </div>

    </div>

    <div class="mt-5">
      <h4 class="mb-3">Riwayat Pembayaran</h4>
      <div class="table-responsive">
        <table class="table table-hover align-middle">
          <thead class="table-light">
            <tr>
              <th>Tanggal</th>
              <th>Kategori</th>
              <th>Jumlah</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>01 Agustus 2025</td>
              <td>Kas Bulanan</td>
              <td>Rp 25.000</td>
              <td><span class="badge bg-success">Lunas</span></td>
            </tr>
            <tr>
              <td>01 Juli 2025</td>
              <td>Kas Bulanan</td>
              <td>Rp 25.000</td>
              <td><span class="badge bg-success">Lunas</span></td>
            </tr>
            <tr>
              <td>01 Juni 2025</td>
              <td>Kas Bulanan</td>
              <td>Rp 25.000</td>
              <td><span class="badge bg-danger">Belum Bayar</span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <div class="mt-5">
      <h4 class="mb-3">Pengumuman RT/RW</h4>
      <div class="card border-0 shadow-sm">
        <div class="card-body">
          <ul class="list-group list-group-flush">
            <li class="list-group-item">
              <strong>07 Agustus 2025:</strong> Rapat warga di balai RW jam 19.00 WIB.
            </li>
            <li class="list-group-item">
              <strong>05 Agustus 2025:</strong> Iuran bulanan mohon dibayarkan sebelum tanggal 10.
            </li>
            <li class="list-group-item">
              <strong>01 Agustus 2025:</strong> Kegiatan kerja bakti akan dilaksanakan hari Minggu.
            </li>
          </ul>
        </div>
      </div>
    </div>

  </div>
@endsection
