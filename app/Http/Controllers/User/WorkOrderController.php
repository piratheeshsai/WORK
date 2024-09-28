<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Models\workOrder;
use App\Models\userDetails; // Import the Section model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WorkOrderController extends Controller
{


    public function create()
    {

        $user = auth()->user();

        // Fetch all sections to be used in the form
        $section = Section::all();

        // Fetch user details
        $userDetails = userDetails::where('userID', $user->userID)->first();
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




return redirect()->back()->with('success', 'Work order created successfully!');
    }

}
