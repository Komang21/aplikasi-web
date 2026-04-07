<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Barang;
use Illuminate\Foundation\Attributes\Middleware;

class DataBarangController extends Controller
{
    #[Middleware(['permission:barang-view'])]
    public function index()
    {
        $barangs = Barang::latest()->get();
        return view('admin.barang.index', compact('barangs'));
    }

    #[Middleware(['permission:barang-create'])]
    public function create()
    {
        return view('admin.barang.create');
    }

    #[Middleware(['permission:barang-create'])]
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'stok' => 'required|integer',
            'harga' => 'required|integer',
        ]);

        Barang::create($request->all());

        return redirect()->route('admin.barang.index')
            ->with('success', 'Barang berhasil ditambahkan');
    }

    #[Middleware('permission:barang-edit')]
    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        return view('admin.barang.edit', compact('barang'));
    }

    #[Middleware('permission:barang-edit')]
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required',
            'stok' => 'required|integer',
            'harga' => 'required|integer',
        ]);

        $barang = Barang::findOrFail($id);
        $barang->update($request->all());

        return redirect()->route('admin.barang.index')
            ->with('success', 'Barang berhasil diupdate');
    }

    #[Middleware('permission:barang-delete')]
    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        return redirect()->route('admin.barang.index')
            ->with('success', 'Barang berhasil dihapus');
    }
}

