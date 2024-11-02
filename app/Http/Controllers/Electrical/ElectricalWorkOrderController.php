<?php

namespace App\Http\Controllers\Electrical;

use App\Http\Controllers\Controller;
use App\Models\workOrder;
use Illuminate\Http\Request;

class ElectricalWorkOrderController extends Controller
{
    public function index()
    {
        $workOrders = workOrder::where('status', 'approved')
                               ->where('work_type', 'electrical')
                               ->paginate(10);
        return view('electrical.workOrder.index', compact('workOrders'));
    }

    public function show($workOrder)
{

    $decodedId = urldecode($workOrder);
    $workOrder = WorkOrder::findOrFail($decodedId);
    return view('electrical.workorder.show', compact('workOrder'));
}
}
