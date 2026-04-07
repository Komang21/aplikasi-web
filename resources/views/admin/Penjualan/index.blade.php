@extends('layouts.admin')

@section('content')

<div class="card">
    <div class="card-header bg-primary text-white">
        Data Penjualan
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
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                    <th>Tanggal</th>
                    <th width="200">Aksi</th>
                </tr>
            </thead>

            <tbody>

                @forelse ($penjualans as $key => $penjualan)
                <tr>

                    <td>{{ $key + 1 }}</td>

                    <td>{{ $penjualan->barang->nama_barang ?? '-' }}</td>

                    <td>{{ $penjualan->jumlah }}</td>

                    <td>Rp {{ number_format($penjualan->total_harga, 0, ',', '.') }}</td>

                    <td>{{ $penjualan->created_at->format('d-m-Y') }}</td>

                    <td>

                        <a href="{{ route('admin.penjualan.edit', $penjualan->id) }}"
                           class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="{{ route('admin.penjualan.destroy', $penjualan->id) }}"
                              method="POST"
                              style="display:inline-block">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin menghapus data ini?')">
                                Hapus
                            </button>

                        </form>

                    </td>

                </tr>

                @empty
                <tr>
                    <td colspan="6" class="text-center">
                        Belum ada data penjualan
                    </td>
                </tr>
                @endforelse

            </tbody>

        </table>

    </div>
</div>

@endsection