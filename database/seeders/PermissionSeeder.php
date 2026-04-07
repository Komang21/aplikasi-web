<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        $permissions = [
            'dashboard-view',
            'lihat user',
            'tambah user', 
            'edit user',
            'hapus user',
            // Add more permissions for other controllers as needed
            'lihat role',
            'tambah role',
            'edit role',
            'hapus role',
            'lihat permission',
            'tambah permission',
            'edit permission',
            'hapus permission',
            'lihat barang',
            'tambah barang',
            'edit barang',
            'hapus barang',
            'lihat penjualan',
            'tambah penjualan',
            'edit penjualan',
            'hapus penjualan',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Create roles and assign permissions
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $adminRole->givePermissionTo(Permission::all());

        $karyawanRole = Role::firstOrCreate(['name' => 'karyawan']);
        $karyawanRole->givePermissionTo(['lihat user', 'lihat barang', 'lihat penjualan']);

        $kasirRole = Role::firstOrCreate(['name' => 'kasir']); 
        $kasirRole->givePermissionTo(['lihat penjualan', 'tambah penjualan']);

        // Create users
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('admin123'),
            ]
        );
        $admin->assignRole('admin');

        $karyawan = User::firstOrCreate(
            ['email' => 'karyawan@example.com'],
            [
                'name' => 'Karyawan',
                'password' => Hash::make('karyawan123'),
            ]
        );
        $karyawan->assignRole('karyawan');

        $kasir = User::firstOrCreate(
            ['email' => 'kasir@example.com'],
            [
                'name' => 'Kasir',
                'password' => Hash::make('kasir123'),
            ]
        );
        $kasir->assignRole('kasir');
    }
}

