@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h2 class="mb-4">Dashboard Karyawan - Data Barang</h2>
    
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Selamat Datang, {{ auth()->user()->name }}</h3>
                </div>
                <div class="card-body">
                    <p>Anda memiliki akses ke pengelolaan Data Barang.</p>
                    <a href="{{ route('admin.barang.index') }}" class="btn btn-primary">
                        <i class="fas fa-boxes"></i> Kelola Data Barang
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
