<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Foundation\Attributes\Middleware;

class AdminUserController extends Controller
{
    #[Middleware('permission:lihat user')]
    public function index()
    {
        $users = User::with('roles')->get();
        return view('admin.user.index', compact('users'));
    }

    #[Middleware('permission:tambah user')]
    public function create()
    {
        $roles = Role::all();
        return view('admin.user.create', compact('roles'));
    }

    #[Middleware('permission:tambah user')]
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required|exists:roles,id'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        $user->roles()->sync([ (int) $request->role ]);

        return redirect()->route('admin.user.index');
    }

    #[Middleware('permission:edit user')]
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.user.edit', compact('user', 'roles'));
    }

    #[Middleware('permission:edit user')]
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'sometimes|exists:roles,id'
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);
        if ($request->role) {
            $user->roles()->sync([ (int) $request->role ]);
        }

        return redirect()->route('admin.user.index');
    }

    #[Middleware('permission:hapus user')]
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'User berhasil dihapus');
    }
}

