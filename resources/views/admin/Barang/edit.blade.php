@extends('layouts.admin')

@section('content')

<div class="card">
    <div class="card-header bg-warning text-white">
        Edit Barang
    </div>

    <div class="card-body">

        <form action="{{ route('admin.barang.update', $barang->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Nama Barang</label>
                <input type="text"
                       name="nama_barang"
                       class="form-control"
                       value="{{ $barang->nama_barang }}"
                       required>
            </div>

            <div class="mb-3">
                <label>Stok</label>
                <input type="number" name="stok" class="form-control" value="{{ $barang->stok }}" required>
            </div>

            <div class="mb-3">
                <label>Harga</label>
                <input type="number" name="harga" class="form-control" value="{{ $barang->harga }}" required>
            </div>

            <button class="btn btn-primary">Update</button>
            <a href="{{ route('admin.barang.index') }}" class="btn btn-secondary">Kembali</a>

        </form>

    </div>
</div>

@endsection

