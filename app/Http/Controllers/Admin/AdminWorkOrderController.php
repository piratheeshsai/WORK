<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WorkOrder;


class AdminWorkOrderController extends Controller
{
    public function index()
{
    $workOrders = WorkOrder::where('status', 'approved')->paginate(10);
    return view('admin.workOrder.index', compact('workOrders'));
}
}
