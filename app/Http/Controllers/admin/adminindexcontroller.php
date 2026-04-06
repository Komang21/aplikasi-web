<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class AdminIndexController extends Controller
{
   public function index()
{
    $totalUser = User::count();
    $totalRole = Role::count();
    $totalPermission = Permission::count();

    $recentUsers = User::latest()->take(5)->get();

    $userChart = User::select(
            DB::raw("MONTH(created_at) as month"),
            DB::raw("COUNT(*) as total")
        )
        ->groupBy("month")
        ->pluck('total','month');

    return view('admin.dashboard', compact(
        'totalUser',
        'totalRole',
        'totalPermission',
        'recentUsers',
        'userChart'
    ));
}
}