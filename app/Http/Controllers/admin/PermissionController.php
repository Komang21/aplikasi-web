<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Illuminate\Foundation\Attributes\Middleware;
        
class PermissionController extends Controller   

{


    #[Middleware('permission:lihat permission')]
    // Tampilkan semua permission
    public function index()
    {
        $permissions = Permission::all();
        return view('admin.permission.index', compact('permissions'));
    }

    #[Middleware('permission:tambah permission')]
    // Form untuk tambah permission baru
    public function create()
    {
        return view('admin.permission.create');
    }

    #[Middleware('permission:tambah permission')]
    // Simpan permission baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name',
        ]);

        Permission::create(['name' => $request->name]);

        return redirect()->route('admin.permission.index')->with('success', 'Permission created successfully.');
    }

    #[Middleware('permission:edit permission')]
    // Form edit permission
    public function edit(Permission $permission)
    {
        return view('admin.permission.edit', compact('permission'));
    }

    #[Middleware('permission:edit permission')]
    // Update permission
    public function update(Request $request, Permission $permission)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name,' . $permission->id,
        ]);

        $permission->update(['name' => $request->name]);

        return redirect()->route('admin.permission.index')->with('success', 'Permission updated successfully.');
    }

    #[Middleware('permission:hapus permission')]
    // Hapus permission
    public function destroy(Permission $permission)
    {
        $permission->delete();

        return redirect()->route('admin.permission.index')->with('success', 'Permission deleted successfully.');
    }
}
