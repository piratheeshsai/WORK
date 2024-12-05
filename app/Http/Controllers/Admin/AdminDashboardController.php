<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function index():View{
        $totalWorkOrders = DB::table('work_order')->count();
        $pendingCount = DB::table('work_order')->where('status', 'Pending')->count();
        $inProgressCount = DB::table('work_order')->where('status', 'In Progress')->count();
        $completedCount = DB::table('work_order')->where('status', 'Completed')->count();

    // Calculate percentages (avoid division by zero)
        $pendingPercentage = $totalWorkOrders ? ($pendingCount / $totalWorkOrders) * 100 : 0;
        $inProgressPercentage = $totalWorkOrders ? ($inProgressCount / $totalWorkOrders) * 100 : 0;
        $completedPercentage = $totalWorkOrders ? ($completedCount / $totalWorkOrders) * 100 : 0;

    return view('admin.dashboard.index', compact(
        'totalWorkOrders',
        'pendingCount',
        'inProgressCount',
        'completedCount',
        'pendingPercentage',
        'inProgressPercentage',
        'completedPercentage'
    ));
    }
}
