@extends('admin.templateAdmin')
@section('content')
<body class="bg-light">
  <div class="container py-4">
    <h2 class="mb-4 fw-semibold">Dashboard Admin</h2>
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
@endsection
