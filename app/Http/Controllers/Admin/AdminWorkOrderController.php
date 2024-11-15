<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WorkOrder;


class AdminWorkOrderController extends Controller
{
    public function index()
{
    $workOrders = WorkOrder::paginate(5);
    return view('admin.workOrder.index', compact('workOrders'));
}


public function show($workOrder)
{

    $decodedId = urldecode($workOrder);
    $workOrder = WorkOrder::findOrFail($decodedId);
    return view('admin.workorder.show', compact('workOrder'));
}


public function destroy($workOrder)
    {
        $decodedId = urldecode($workOrder);
        $workOrder = WorkOrder::findOrFail($decodedId);
        $workOrder->delete();
        return redirect()->route('admin.workorder.index')->with('success', 'Work Order deleted successfully.');
    }
}

