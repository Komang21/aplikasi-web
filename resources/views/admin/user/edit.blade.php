@extends('layouts.admin')

@section('content')

<div class="card">
    <div class="card-header bg-warning">
        Edit User
    </div>
    <div class="card-body">

        <form action="{{ route('admin.user.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="name" 
                       value="{{ $user->name }}" 
                       class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" 
                       value="{{ $user->email }}" 
                       class="form-control" required>
            </div>

            <div class="mb-3">
                <!--<label>Password (Kosongkan jika tidak diubah)</label>-->
                <input type="password" name="password" class="form-control">
            </div>

            <div class="mb-3">
                <label>Role</label>
                <select name="role" class="form-control">
                    @foreach($roles as $role)
                    <option value="{{ $role->id }}" {{ $user->roles->contains($role->id) ? 'selected' : '' }}>{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>

            <button class="btn btn-primary">Update</button>
            <a href="{{ route('admin.user.index') }}" class="btn btn-secondary">Kembali</a>

        </form>
    </div>
</div>

@endsection