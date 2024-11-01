<?php

namespace App\Http\Controllers\Civil;

use App\Http\Controllers\Controller;
use App\Models\workOrder;
use Illuminate\Http\Request;

class CivilWorkOrderController extends Controller
{
    public function index()
    {
        $workOrders = WorkOrder::where('status', 'approved')
                               ->where('work_type', 'civil')
                               ->paginate(10);
        return view('civil.workOrder.index', compact('workOrders'));
    }

    public function show($workOrder)
{

    $decodedId = urldecode($workOrder);
    $workOrder = WorkOrder::findOrFail($decodedId);
    return view('civil.workorder.show', compact('workOrder'));
}
}
