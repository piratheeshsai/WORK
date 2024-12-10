<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class AdminDashboardController extends Controller
{
    public function index(): View
    {
        $totalWorkOrders = DB::table('work_order')->count();
        $pendingCount = DB::table('work_order')->where('status', 'Approved')->count();
        $inProgressCount = DB::table('work_order')->where('status', 'In Progress')->count();
        $completedCount = DB::table('work_order')->where('status', 'Completed')->count();

        // Chart Data
        $chart = (new LarapexChart)->pieChart()
        ->setTitle('Work Order Distribution')
        ->setLabels(['Pending', 'In Progress', 'Completed'])
        ->setDataset([$pendingCount, $inProgressCount, $completedCount])
        ->setHeight(300) // Set height
        ->setWidth(400); // Set width


        return view('admin.dashboard.index', compact(
            'totalWorkOrders',
            'pendingCount',
            'inProgressCount',
            'completedCount',
            'chart'
        ));
    }
}
