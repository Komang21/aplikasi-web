@extends('layouts.admin')

@section('content')

<div class="card">
    <div class="card-header bg-warning text-white">
        Edit Permission
    </div>

    <div class="card-body">

        <form action="{{ route('admin.permission.update', $permission->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Nama Permission</label>
                <input type="text"
                       name="name"
                       class="form-control"
                       value="{{ $permission->name }}"
                       required>
            </div>

            <button class="btn btn-primary">Update</button>
            <a href="{{ route('admin.permission.index') }}" class="btn btn-secondary">Kembali</a>

        </form>

    </div>
</div>

@endsection