<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Models\workOrder;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WorkOrderController extends Controller
{
    public function index()
    {
        // Fetch all work orders with pagination
        $work_order = WorkOrder::with('userDetails')->paginate(10);

        // Pass work orders to the view
        return view('users.workorder.index', compact('work_order'));
    }

    public function create()
    {

        $user = auth()->user();

        // Fetch all sections to be used in the form
        $section = Section::all();

        // Fetch user details
        $userDetails = UserDetail::where('userID', $user->userID)->first();
        // Fetch all sections to be used in the form
        $section = Section::all();

        // Pass the sections to the view
        return view('users.workorder.create', compact('section', 'userDetails'));
    }

    public function store(Request $request)
    {


        // Validate the request data
        $request->validate([
            'work_type' => 'required|string|max:255',
            'priority' => 'required|string|in:normal,urgent',
            'complain' => 'required|string|max:1000',
        ]);

        // Get the authenticated user's EmployeeId from user_details
        $userDetails = auth()->user()->userDetails;

        if (!$userDetails) {
            return redirect()->back()->withErrors(['message' => 'User details not found.']);
        }

       // Get the employee ID
$employeeId = $userDetails->EmployeeId;

// Get the current year
$year = date('Y');


// Get the work type
$workType = strtoupper($request->work_type); // Uppercasing the work type for consistency

// Fetch the latest work order for the current year and work type
$latestWorkOrder = workOrder::whereYear('created_at', $year)
                            ->where('work_type', $workType)
                            ->orderBy('id', 'desc')
                            ->first();

// Determine the increment number
if ($latestWorkOrder) {
    // Extract the incremental number from the latest work order ID
    $latestIdParts = explode('/', $latestWorkOrder->id);
    $incrementNumber = (int) end($latestIdParts) + 1;
} else {
    // Start increment number if no work order exists for the current year and work type
    $incrementNumber = 1;
}

// Format the increment number with leading zeros (e.g., 001, 002)
$incrementFormatted = str_pad($incrementNumber, 3, '0', STR_PAD_LEFT);

// Generate the new work order ID
$id = "WMD/{$workType}/{$year}/{$incrementFormatted}";

// Create the work order
workOrder::create([
    'id' => $id,
    'work_type' => $request->work_type,
    'priority' => $request->priority,
    'complain' => $request->complain,
    'EmployeeId' => $employeeId,
]);


return redirect()->back()->with('success', 'Work order created successfully!');
    }

}
