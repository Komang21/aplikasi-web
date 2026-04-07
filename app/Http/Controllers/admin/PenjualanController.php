<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Penjualan;
use App\Models\Admin\Barang;
use Illuminate\Foundation\Attributes\Middleware;

class PenjualanController extends Controller
{
    #[Middleware(['permission:penjualan-view'])]
    public function index()
    {
        $penjualans = Penjualan::with('barang')->latest()->get();
        return view('admin.penjualan.index', compact('penjualans'));
    }

    #[Middleware('permission:penjualan-create')]
    public function create()
    {
        $barangs = Barang::all();
        return view('admin.penjualan.create', compact('barangs'));
    }

    #[Middleware('permission:penjualan-create')]
    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'jumlah' => 'required|integer',
            'total_harga' => 'required|integer',
        ]);

        Penjualan::create($request->all());

        return redirect()->route('admin.penjualan.index')
            ->with('success', 'Penjualan berhasil ditambahkan');
    }
}

