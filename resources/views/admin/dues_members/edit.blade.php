@extends('admin.templateAdmin')

@section('content')
<div class="container mt-4">
    <h3>Edit Anggota Iuran</h3>

    <form action="{{ route('dues_members.update', $duesMember->id) }}" method="POST" style="max-width:500px;">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Warga</label>
            <select name="id_user" class="form-control" required>
                @foreach($users as $user)
                <option value="{{ $user->id }}" {{ $duesMember->id_user == $user->id ? 'selected' : '' }}>
                    {{ $user->name }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Jenis Iuran</label>
            <select name="id_duescategory" class="form-control" required>
                @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $duesMember->id_duescategory == $category->id ? 'selected' : '' }}>
                    {{ ucfirst($category->period) }} - Rp{{ number_format($category->nominal) }}
                </option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
