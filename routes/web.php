<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminIndexController;
use App\Http\Controllers\Admin\AdminUserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/admin/dashboard');
    }
    return redirect('/login');
})->name('home');

Route::get('/dashboard', function () {
    return redirect('/admin/dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Routes - Full CRUD for User/Role/Permission
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminIndexController::class, 'index'])->name('home');
    Route::get('/dashboard', [AdminIndexController::class, 'index'])->name('index');
    Route::get('/contact', function () {
        return view('admin.contact');
    })->name('contact');
    Route::resource('user', AdminUserController::class);
    Route::resource('role', \App\Http\Controllers\Admin\RoleController::class);
    Route::resource('permission', \App\Http\Controllers\Admin\PermissionController::class);
});

require __DIR__.'/auth.php';

