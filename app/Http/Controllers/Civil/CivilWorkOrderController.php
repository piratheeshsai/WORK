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

public function Accept($id)
{
    $id = urldecode($id);
    $workOrder = WorkOrder::findOrFail($id);
    $workOrder->status = 'Work in Progress';
    $workOrder->progress = 75;
    $workOrder->save();

    return redirect()->back()->with('success', 'Work order Accepted successfully.');
}

public function Complete($id)
{
    $id = urldecode($id);
    $workOrder = WorkOrder::findOrFail($id);
    $workOrder->status = 'Completed';
    $workOrder->progress = 100;
    $workOrder->save();

    return redirect()->back()->with('success', 'Work order completed successfully.');
}





}
