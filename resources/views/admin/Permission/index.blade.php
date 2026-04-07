@extends('layouts.admin')

@section('content')

<div class="card">
    <div class="card-header bg-primary text-white">
        Data Permission
        <a href="{{ route('admin.permission.create') }}" class="btn btn-light btn-sm float-end">
            Tambah Permission
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
                    <th>Nama Permission</th>
                    <th width="200">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($permissions as $key => $permission)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $permission->name }}</td>
                    <td>
                        <a href="{{ route('admin.permission.edit', $permission->id) }}"
                           class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('admin.permission.destroy', $permission->id) }}"
                              method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin menghapus permission ini?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center">Belum ada data permission</td>
                </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</div>

@endsection