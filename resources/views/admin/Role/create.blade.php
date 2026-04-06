@extends('layouts.admin')

@section('content')

<div class="card">
    <div class="card-header bg-primary text-white">
        Tambah Role
    </div>

    <div class="card-body">

        <form action="{{ route('admin.role.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Nama Role</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Permission</label>

                @foreach($permissions as $permission)
                <div class="form-check">
                    <input type="checkbox"
                           name="permissions[]"
                           value="{{ $permission->name }}"
                           class="form-check-input">

                    <label class="form-check-label">
                        {{ $permission->name }}
                    </label>
                </div>
                @endforeach

            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>

            <a href="{{ route('admin.role.index') }}" class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>
</div>

@endsection