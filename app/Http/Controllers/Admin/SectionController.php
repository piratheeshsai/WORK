<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\Subsection;
use App\Models\Department;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class SectionController extends Controller
{
    // Show all sections with their subsections and departments
    public function index()
    {
        // Fetch all sections with subsections and departments using eager loading
        $sections = Section::with('subsections.departments')->get();
        $subsections = Subsection::with('departments')->get();

        $recommenders = User::where('role', 'recommender')->get();
        return view('admin.sections.index', compact('sections', 'subsections', 'recommenders'));
    }

    // Store a new subsection
    public function storeSubsection(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'section_id' => 'required|exists:section,id',
            'recommender_id' => 'nullable|exists:users,userID', // Make sure the table name is correct
        ]);

        $subsection = Subsection::create($request->all());
        return response()->json(['subsection' => $subsection]);
    }



    // Store a new department

    public function storeDepartment(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'subsections_id' => 'required|exists:subsections,id',
        ]);

        $department = Department::create([
            'name' => $request->name,
            'subsections_id' => $request->subsections_id,
        ]);

        return response()->json(['department' => $department, 'subsection_id' => $department->subsections_id]);
    }


    public function updateSubsection(Request $request)
    {
        $request->validate([
            'subsection_id' => 'required|exists:subsections,id',

        ]);

        $subsection = Subsection::findOrFail($request->subsection_id);
        $subsection->section_head = $request->section_head;
        $subsection->save();

        return response()->json(['success' => true, 'subsection' => $subsection]);
    }

    // Update department
    public function updateDepartment(Request $request)
    {
        $request->validate([
            'department_id' => 'required|exists:departments,id',
            'name' => 'required|string|max:255',
        ]);

        $department = Department::findOrFail($request->department_id);
        $department->name = $request->name;
        $department->save();

        return response()->json(['success' => true, 'department' => $department]);
    }



    public function destroyDepartment($id)
    {
        // Find the department by ID and delete it
        $department = Department::findOrFail($id);
        $department->delete();


        return redirect()->route('admin.sections.index')->with('success', 'Department deleted successfully.');
    }

    public function destroy($id)
    {
        $subsection = Subsection::findOrFail($id);
        $subsection->delete();

        return redirect()->route('admin.sections.index')->with('success', 'Subsection deleted successfully.');

    }


    // In SubsectionController.php

  // In SectionController.php
//   public function updateRecommender(Request $request, $id)
// {
//     // Retrieve the subsection by ID
//     $subsection = Subsection::findOrFail($id);

//     // Log data to check if values are correct
//     Log::info('Subsection found:', ['subsection' => $subsection]);
//     Log::info('Recommender ID:', ['recommender_id' => $request->input('recommender_id')]);

//     // Validate the recommender ID
//     $request->validate([
//         'recommender_id' => 'required|exists:users,userID', // Check if recommender exists in the users table
//     ]);

//     // Update the recommender ID for the subsection
//     $subsection->recommender_id = $request->input('recommender_id');
//     $subsection->save();

//     // Log after saving to confirm
//     Log::info('Subsection updated:', ['subsection' => $subsection]);

//     // Get the name of the newly assigned recommender for the response
//     $recommenderName = $subsection->recommender->name;

//     // Return the response with the updated recommender name and subsection_id
//     return response()->json([
//         'message' => 'Recommender updated successfully!',
//         'recommender_name' => $recommenderName, // Send the recommender's name back
//         'subsection_id' => $subsection->id, // Send the subsection_id back
//     ]);
// }

public function updateRecommender(Request $request)
{
    // Validate the input data
    $request->validate([
        'recommender_id' => 'required|exists:users,userID',  // Ensure recommender exists
    ]);

    // Retrieve the subsection by ID
    $subsection = Subsection::findOrFail($request->subsection_id);

    // Update the recommender ID for the subsection
    $subsection->recommender_id = $request->recommender_id;
    $subsection->save();

    // Return a response with the updated data
    return response()->json([
        'message' => 'Recommender updated successfully!',
        'recommender_name' => $subsection->recommender->name,  // Send the recommender name
        'subsection_id' => $subsection->id, // Return the subsection ID
    ]);
}











// public function updateRecommender(Request $request)
// {
//     // Validate input
//     $validated = $request->validate([
//         'subsection_id' => 'required|exists:subsections,id',
//         'recommender_id' => 'nullable|exists:recommenders,id', // If recommender_id is optional
//     ]);

//     // Find the subsection and update the recommender ID
//     $subsection = Subsection::findOrFail($request->subsection_id);
//     $subsection->recommender_id = $request->recommender_id;
//     $subsection->save();

//     // Return the updated data as a response
//     return response()->json([
//         'subsection_id' => $subsection->id,
//         'recommender_name' => $subsection->recommender ? $subsection->recommender->name : 'Not assigned'
//     ]);
// }









}
