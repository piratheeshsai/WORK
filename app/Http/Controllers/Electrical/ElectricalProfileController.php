<?php

namespace App\Http\Controllers\Electrical;

use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Models\UserDetail;
use Illuminate\Http\Request;

class ElectricalProfileController extends Controller
{
    public function index()
    {
        // Fetch the authenticated user
        $user = auth()->user();

        // Fetch all sections to be used in the form
        $section = Section::all();

        $userDetails = UserDetail::where('userID', $user->userID)->first();

        // Pass both the user and sections to the view
        return view('electrical.profile.index', compact('user', 'section', 'userDetails'));
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
        
    ]);
    // Update the 'users' table
    $user->update(['name' => $request->name]);

    // Update user details
    $userDetails = UserDetail::firstOrNew(['userID' => $user->userID]);
    $userDetails->full_name = $request->name;
    $userDetails->email = $request->email;
    $userDetails->PhoneNumber = $request->PhoneNumber;
    $userDetails->EmployeeId = $request->EmployeeId;

    $userDetails->save();
    // Redirect back with success message
    return redirect()->back()->with('success', 'Profile updated successfully!');
}
}
