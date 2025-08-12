@extends('admin.templateAdmin')

@section('content')
<div class="container mt-4">
    <h3>Edit Pembayaran</h3>

    <form action="{{ route('payments.update', $payment->id) }}" method="POST" style="max-width:500px;">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Warga</label>
            <select name="id_user" class="form-control" required>
                @foreach($users as $u)
                    <option value="{{ $u->id }}" {{ $payment->id_user == $u->id ? 'selected' : '' }}>
                        {{ $u->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Periode</label>
            <select name="period" class="form-control" required>
                <option value="mingguan" {{ $payment->period == 'mingguan' ? 'selected' : '' }}>Mingguan</option>
                <option value="bulanan" {{ $payment->period == 'bulanan' ? 'selected' : '' }}>Bulanan</option>
                <option value="tahunan" {{ $payment->period == 'tahunan' ? 'selected' : '' }}>Tahunan</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Nominal</label>
            <input type="number" name="nominal" value="{{ $payment->nominal }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Petugas</label>
            <input type="text" name="petugas" value="{{ $payment->petugas }}" class="form-control" required>
        </div>

        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
