<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
$permissions = [
    'admin-access',
    'dashboard-view',
    'lihat user', 'tambah user', 'edit user', 'hapus user',
    'lihat role', 'tambah role', 'edit role', 'hapus role',
    'lihat permission', 'tambah permission', 'edit permission', 'hapus permission',
    'barang-view', 'barang-create', 'barang-edit', 'barang-delete',
    'penjualan-view', 'penjualan-create',
];

foreach ($permissions as $permission) {
    Permission::firstOrCreate(['name' => $permission]);
}

// Roles
$adminRole = Role::firstOrCreate(['name' => 'Admin']);
// Admin only admin features - no barang/penjualan
$adminRole->givePermissionTo(['admin-access', 'dashboard-view', 'lihat user', 'tambah user', 'edit user', 'hapus user', 'lihat role', 'tambah role', 'edit role', 'hapus role', 'lihat permission', 'tambah permission', 'edit permission', 'hapus permission']);

// Give admin-access only to admin
$adminRole->givePermissionTo('admin-access');

$karyawanRole = Role::firstOrCreate(['name' => 'Karyawan']);
$karyawanRole->givePermissionTo(['barang-view', 'barang-create', 'barang-edit', 'barang-delete']);

$kasirRole = Role::firstOrCreate(['name' => 'Kasir']);
$kasirRole->givePermissionTo(['penjualan-view', 'penjualan-create']);

// Users
User::firstOrCreate(['email' => 'admin@example.com'], [
    'name' => 'Super Admin',
    'password' => bcrypt('admin123'),
])->assignRole('Admin');

User::firstOrCreate(['email' => 'karyawan@example.com'], [
    'name' => 'Karyawan 1',
    'password' => bcrypt('karyawan123'),
])->assignRole('Karyawan');

User::firstOrCreate(['email' => 'kasir@example.com'], [
    'name' => 'Kasir 1', 
    'password' => bcrypt('kasir123'),
])->assignRole('Kasir');
    }
}
