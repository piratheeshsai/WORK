<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WorkOrder;
use Illuminate\Http\Request;
use Log;

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


    public function updateStatus(Request $request, $id)
{
    $id = urldecode($id); // Decode the work order ID
    $workOrder = WorkOrder::findOrFail($id);

    // Validate the new status
    $validated = $request->validate([
        'status' => 'required|in:Pending,Work in Progress,Completed',
    ]);

    $status = $request->input('status');
    Log::info("Updating work order {$id} status from {$workOrder->status} to {$status}");
    $workOrder->status = $validated['status'];


    // Update progress based on status
    $workOrder->progress = match ($validated['status']) {
        'Pending' => 25,
        'Work in Progress' => 75,
        'Completed' => 100,
    };

    $workOrder->save();

    return response()->json([
        'status' => $workOrder->status,
        'progress' => $workOrder->progress,
    ]);
}



}

