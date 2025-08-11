@extends('admin.templateAdmin')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Jenis Iuran</h3>
        <div>
            <a href="#" class="btn btn-success">+ Buat Iuran</a>
        </div>
    </div>

    <form class="row g-2 mb-3" method="GET" action="#">
        <div class="col-md-8">
            <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Cari periode atau status">
        </div>
        <div class="col-auto">
            <button class="btn btn-primary">Cari</button>
        </div>
    </form>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th style="width:70px">No</th>
                    <th>Periode</th>
                    <th>Nominal</th>
                    <th>Status</th>
                    <th style="width:170px" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $i => $cat)
                <tr>
                    <td>{{ $categories->firstItem() + $i }}</td>
                    <td>{{ ucfirst($cat->period) }}</td>
                    <td>Rp {{ number_format($cat->nominal, 0, ',', '.') }}</td>
                    <td>{{ $cat->status }}</td>
                    <td class="text-center">
                        <a href="#" class="btn btn-sm btn-warning">Edit</a>
                        <form action="#" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin dihapus?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">Tidak ada data</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-end">
        {{ $categories->links() }}
    </div>
</div>
@endsection
