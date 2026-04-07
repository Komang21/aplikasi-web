@extends('layouts.admin')

@section('content')

<div class="card">
    <div class="card-header bg-primary text-white">
        Data Barang
        <a href="{{ route('admin.barang.create') }}" class="btn btn-light btn-sm float-end">
            Tambah Barang
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
                    <th>Nama Barang</th>
                    <th>Stok</th>
                    <th>Harga</th>
                    <th width="250">Aksi</th>
                </tr>
            </thead>

            <tbody>

@forelse ($barangs as $key => $barang)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $barang->nama_barang }}</td>
                    <td>{{ $barang->stok }}</td>
                    <td>Rp {{ number_format($barang->harga, 0, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('admin.barang.edit', $barang->id) }}" class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="{{ route('admin.barang.destroy', $barang->id) }}"
                              method="POST"
                              style="display:inline-block">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin menghapus barang ini?')">
                                Hapus
                            </button>

                        </form>

                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">
                        Belum ada data barang
                    </td>
                </tr>
                @endforelse

            </tbody>

        </table>

    </div>
</div>

@endsection