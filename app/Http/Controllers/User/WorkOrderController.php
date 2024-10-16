<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Models\WorkOrder; // Note: Make sure you use the correct casing for the model
use App\Models\UserDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WorkOrderController extends Controller
{
    public function index()
    {
        // Fetch all work orders with pagination
        $work_order = WorkOrder::with('userDetails')->paginate(10);
        $user = auth()->user();

        // Get user details
        $userDetails = UserDetail::where('userID', $user->userID)->first();

        // Get work orders assigned to the logged-in recommender
        $workOrders = WorkOrder::where('recommender_id', $user->userID)->get();

        // Pass work orders and userDetails to the view
        return view('users.workorder.index', compact('work_order', 'userDetails'));
    }

    public function create()
    {
        $user = auth()->user();

        // Fetch all sections to be used in the form
        $section = Section::all();

        // Fetch user details
        $userDetails = UserDetail::where('userID', $user->userID)->first();

        // Pass the sections and userDetails to the view
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

        // Get the authenticated user's details
        $userDetails = UserDetail::where('userID', auth()->user()->userID)->first();

        if (!$userDetails) {
            return redirect()->back()->withErrors(['message' => 'User details not found.']);
        }

        // Retrieve the subsection and recommender ID
        $subsection = $userDetails->subsection;
        $recommenderId = $this->getRecommenderId($subsection);
        $employeeId = $userDetails->EmployeeId;

        // Get the current year and generate work order ID
        $year = date('Y');
        $workType = strtoupper($request->work_type);
        $latestWorkOrder = WorkOrder::whereYear('created_at', $year)
            ->where('work_type', $workType)
            ->orderBy('id', 'desc')
            ->first();

        // Determine the increment number
        $incrementNumber = $latestWorkOrder ? (int) explode('/', $latestWorkOrder->id)[2] + 1 : 1;
        $incrementFormatted = str_pad($incrementNumber, 3, '0', STR_PAD_LEFT);
        $id = "WMD/{$workType}/{$year}/{$incrementFormatted}";

        // Create the work order
        WorkOrder::create([
            'id' => $id,
            'work_type' => $request->work_type,
            'priority' => $request->priority,
            'complain' => $request->complain,
            'EmployeeId' => $employeeId,
            'recommender_id' => $recommenderId,
        ]);

        return redirect()->back()->with('success', 'Work order created successfully!');
    }

    private function getRecommenderId($subsection)
    {
        // Fetch the recommender based on the subsection and role
        return User::whereHas('userDetails', function ($query) use ($subsection) {
            $query->where('subsection', $subsection);
        })->where('role', 'Recommender')->value('userID');
    }
}
