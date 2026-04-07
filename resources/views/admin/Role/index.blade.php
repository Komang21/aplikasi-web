@extends('layouts.admin')

@section('content')

<div class="card">
    <div class="card-header bg-primary text-white">
        Data Role
        <a href="{{ route('admin.role.create') }}" class="btn btn-light btn-sm float-end">
            Tambah Role
        </a>
    </div>

    <div class="card-body">

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th width="80">No</th>
                    <th>Nama Role</th>
                    <th>Permission</th>
                    <th width="200">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($roles as $role)
                <tr>
                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $role->name }}</td>

                    <td>
                        @if($role->permissions->count())
                            @foreach($role->permissions as $permission)
                                <span class="badge bg-primary">
                                    {{ $permission->name }}
                                </span>
                            @endforeach
                        @else
                            <span class="text-muted">Tidak ada permission</span>
                        @endif
                    </td>

                    <td>
                        <a href="{{ route('admin.role.edit', $role->id) }}"
                           class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="{{ route('admin.role.destroy', $role->id) }}"
                              method="POST"
                              style="display:inline-block">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin menghapus role ini?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>

                @empty
                <tr>
                    <td colspan="4" class="text-center">
                        Belum ada data role
                    </td>
                </tr>
                @endforelse
            </tbody>

        </table>

    </div>
</div>

@endsection