<?php

use App\Http\Controllers\admin\adminindexcontroller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

route::get('/admin', [adminindexcontroller::class, 'index'])-> name('admin.index');
route::get('/admin.user', [adminuserindexcontroller::class, 'index'])-> name('admin.user');
