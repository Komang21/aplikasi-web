<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Foundation\Attributes\Middleware;

class RoleController extends Controller
{
    #[Middleware('permission:lihat role')]
    public function index()
    {   
        $roles = Role::with('permissions')->latest()->get();
        return view('admin.role.index', compact('roles'));
    }

    #[Middleware('permission:tambah role')]
    public function create()
    {
        $permissions = Permission::all();
        return view('admin.role.create', compact('permissions'));
    }

    #[Middleware('permission:tambah role')]
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name'
        ]);

        $role = Role::create([
            'name' => $request->name
        ]);

        if ($request->permissions) {
            $role->syncPermissions($request->permissions);
        }

        return redirect()->route('admin.role.index')
            ->with('success', 'Role berhasil ditambahkan');
    }

    #[Middleware('permission:edit role')]
    public function edit(Role $role)
    {
        $permissions = Permission::all();
        $rolePermissions = $role->permissions->pluck('name')->toArray();

        return view('admin.role.edit', compact('role', 'permissions', 'rolePermissions'));
    }

    #[Middleware('permission:edit role')]
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,' . $role->id
        ]);

        $role->update([
            'name' => $request->name
        ]);

        $role->syncPermissions($request->permissions ?? []);

        return redirect()->route('admin.role.index')
            ->with('success', 'Role berhasil diupdate');
    }

    #[Middleware('permission:hapus role')]
    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('admin.role.index')
            ->with('success', 'Role berhasil dihapus');
    }
}

