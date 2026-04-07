@extends('layouts.admin')

@section('content')

<div class="card">
    <div class="card-header bg-primary text-white">
        Tambah Barang
    </div>

    <div class="card-body">

        <form action="{{ route('admin.barang.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Nama Barang</label>
                <input type="text" name="nama_barang" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Stok</label>
                <input type="number" name="stok" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Harga</label>
                <input type="number" name="harga" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>

            <a href="{{ route('admin.barang.index') }}" class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>
</div>

@endsection
