<?php

namespace App\Http\Controllers\Recommender;
use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Models\Subsection;
use App\Models\Department;
use App\Models\UserDetail;
use Illuminate\Http\Request;

class RecommenderProfileController extends Controller
{

    public function index()
    {
        // Fetch the authenticated user
        $user = auth()->user();

        // Fetch all sections to be used in the form
        $section = Section::all();

        $userDetails = UserDetail::where('userID', $user->userID)->first();

        // Pass both the user and sections to the view
        return view('recommender.profile.index', compact('user', 'section', 'userDetails'));
    }

    public function update(Request $request)
    {
        // Fetch the authenticated user
        $user = auth()->user();

        // Debugging: Check user instance
        if (!$user) {
            return redirect()->back()->withErrors(['user' => 'User not authenticated.']);
        }

        $user = auth()->user();

        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'PhoneNumber' => 'nullable|string|max:15',
            'EmployeeId' => 'nullable|string|max:20',
            'section' => 'required|exists:section,id', // Change 'sections' to 'section'
            'subsection' => 'nullable|exists:subsections,id',
            'department' => 'nullable|exists:departments,id',
            'recommender_id' => 'nullable|string|exists:users,userID',
        ]);
        // Update the 'users' table
        $user->update(['name' => $request->name]);

        $sectionName = Section::find($request->section)->name;
        $subsectionName = null;
        $departmentName = null;

        if ($request->subsection) {
            $subsectionName = Subsection::find($request->subsection)->name;
        }

        if ($request->department) {
            $departmentName = Department::find($request->department)->name;
        }
        // Update user details
        $userDetails = UserDetail::firstOrNew(['userID' => $user->userID]);
        $userDetails->email = $request->email;
        $userDetails->PhoneNumber = $request->PhoneNumber;
        $userDetails->EmployeeId = $request->EmployeeId;

        $userDetails->section = $sectionName;
        $userDetails->subsection = $subsectionName;
        $userDetails->department = $departmentName;
        $userDetails->save();
        // Redirect back with success message
        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
}
