@extends('layouts.admin')

@section('content')

<div class="card">
    <div class="card-header bg-primary text-white">
        Tambah Permission
    </div>

    <div class="card-body">

        <form action="{{ route('admin.permission.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Nama Permission</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>

            <a href="{{ route('admin.permission.index') }}" class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>
</div>

@endsection
