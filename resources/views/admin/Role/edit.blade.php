@extends('layouts.admin')

@section('content')

<div class="card">
    <div class="card-header bg-warning text-white">
        Edit Role
    </div>

```
<div class="card-body">

    <form action="{{ route('admin.role.update', $role->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Role</label>
            <input type="text"
                   name="name"
                   class="form-control"
                   value="{{ $role->name }}"
                   required>
        </div>

        <div class="mb-3">
            <label>Permission</label>

            @foreach($permissions as $permission)
            <div class="form-check">

                <input type="checkbox"
                       name="permissions[]"
                       value="{{ $permission->name }}"
                       class="form-check-input"
                       {{ in_array($permission->name, $rolePermissions) ? 'checked' : '' }}>

                <label class="form-check-label">
                    {{ $permission->name }}
                </label>

            </div>
            @endforeach

        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('admin.role.index') }}" class="btn btn-secondary">Kembali</a>

    </form>

</div>
```

</div>

@endsection
