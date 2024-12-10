<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Models\Subsection;
use App\Models\WorkOrder;
use App\Models\UserDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class WorkOrderController extends Controller
{
    public function index()
    {
        $user = auth()->user(); // Get the authenticated user

     //   Fetch user details to get EmployeeId
        $userDetails = UserDetail::where('userID', $user->userID)->first();

        if (!$userDetails) {
            // Handle the case where user details are not found
            return redirect()->back()->withErrors(['message' => 'User details not found.']);
        }

        // Fetch work orders associated with the logged-in user's EmployeeId
        $workOrders = WorkOrder::where('EmployeeId', $userDetails->EmployeeId)->paginate(10); // Use paginate to manage large data sets

        return view('users.workorder.index', compact('workOrders'));
    }



    public function create()
    {
        $user = auth()->user();

        // Fetch all sections for the form
        $sections = Section::all();

        // Fetch user details
        $userDetails = UserDetail::where('userID', $user->userID)->first();

        return view('users.workorder.create', compact('sections', 'userDetails'));
    }



    public function store(Request $request)
{
    // Validate the request data
    $request->validate([
        'work_type' => 'required|string|max:255',
        'priority' => 'required|string|in:normal,urgent',
        'complain' => 'required|string|max:1000',
    ]);

    // Get authenticated user details
    $userDetails = UserDetail::where('userID', auth()->user()->userID)->first();

    if (!$userDetails) {
        return redirect()->back()->withErrors(['message' => 'User details not found.']);
    }

    // Retrieve subsection from user details
    $subsection = $userDetails->subsection;

    // Check if the subsection exists
    if (!$subsection) {
        return redirect()->back()->withErrors(['message' => 'Subsection not found.']);
    }

    // Fetch the recommender ID for the subsection
    $recommenderId = $this->getRecommenderId($subsection);

    // Check if the recommender was found
    if (!$recommenderId) {
        return redirect()->back()->withErrors(['message' => 'No recommender found for this subsection.']);
    }

    // Get employee ID from user details
    $employeeId = $userDetails->EmployeeId;

    // Generate work order ID
    $year = date('Y');
    $workType = strtoupper($request->work_type);

    // Get the latest work order for this work type and year
    $latestWorkOrder = WorkOrder::whereYear('created_at', $year)
        ->where('work_type', $workType)
        ->orderBy('created_at', 'desc')
        ->first();

    // Extract the increment number if a previous record exists
    $incrementNumber = $latestWorkOrder
        ? ((int)explode('/', $latestWorkOrder->id)[3] + 1)
        : 1;

    // Format the increment number
    $incrementFormatted = str_pad($incrementNumber, 4, '0', STR_PAD_LEFT);

    // Construct the new work order ID
    $id = "WMD/{$workType}/{$year}/{$incrementFormatted}";

    // Log data for debugging
    Log::info('Creating work order: ', [
        'id' => $id,
        'work_type' => $request->work_type,
        'priority' => $request->priority,
        'complain' => $request->complain,
        'EmployeeId' => $employeeId,
        'recommender_id' => $recommenderId
    ]);

    try {
        // Create the new work order
        WorkOrder::create([
            'id' => $id,
            'work_type' => $request->work_type,
            'priority' => $request->priority,
            'complain' => $request->complain,
            'EmployeeId' => $employeeId,
            'recommender_id' => $recommenderId,
        ]);

        return redirect()->back()->with('success', 'Work order created successfully!');
    } catch (\Exception $e) {
        Log::error('Work order creation failed', [
            'error' => $e->getMessage(),
            'work_type' => $request->work_type,
            'priority' => $request->priority,
            'complain' => $request->complain,
        ]);
        return redirect()->back()->withErrors(['message' => 'An error occurred while creating the work order.']);
    }
}

private function getRecommenderId($subsection)
{
    // Fetch the recommender ID from the subsection table
    $recommender = Subsection::where('name', $subsection)
        ->whereNotNull('recommender_id')
        ->first();

    // Log the result for debugging
    Log::info('Recommender for subsection: ' . $subsection, ['recommender' => $recommender]);

    if (!$recommender) {
        return null;
    }

    return $recommender->recommender_id; // Return the recommender ID
}

}
