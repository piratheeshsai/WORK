<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\Subsection;
use App\Models\Department;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Validator;

class SectionController extends Controller
{
    // Show all sections with their subsections and departments
    public function index()
    {
        // Fetch all sections with subsections and departments using eager loading
        $sections = Section::with('subsections.departments')->get();
        $subsections = Subsection::with('departments')->get();
        $recommenders = User::getRecommenders();
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

    public function updateRecommender(Request $request)
    {
        // Validate the input
        $request->validate([
            'subsection_id' => 'required|exists:subsections,id',
            'recommender_id' => 'required|exists:users,userID',
        ]);

        Log::info('Subsection ID:', ['subsection_id' => $request->subsection_id]);
        Log::info('Recommender ID:', ['recommender_id' => $request->recommender_id]);

        // Find and update the subsection
        $subsection = Subsection::findOrFail($request->subsection_id);
        $subsection->recommender_id = $request->recommender_id;
        $subsection->save();

        return redirect()->route('admin.sections.index')->with('success', 'Recommender updated successfully.');

    }




















}
