<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\Subsection;
use App\Models\Department;

class SectionController extends Controller
{
    // Show all sections with their subsections and departments
    public function index()
    {
        // Fetch all sections with subsections and departments using eager loading
        $sections = Section::with('subsections.departments')->get();
        $subsections = Subsection::with('departments')->get();
        return view('admin.sections.index', compact('sections','subsections'));
    }

    // Store a new subsection
    public function storeSubsection(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'section_head' => 'required|string|max:255',
        'section_id' => 'required|exists:section,id', // Make sure the table name is correct
    ]);

    $subsection = Subsection::create($request->all());
    return response()->json(['subsection' => $subsection]);
}



    // Store a new department
    public function storeDepartment(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'subsection_id' => 'required|exists:subsections,id',
        ]);

        // Create a new department and associate it with the selected subsection
        $department = Department::create([
            'name' => $request->name,
            'subsections_id' => $request->subsection_id, // This must match the column name in your departments table
        ]);

        return response()->json(['department' => $department, 'subsection_id' => $department->subsections_id]);
    }
    public function updateSubsection(Request $request)
    {
        $request->validate([
            'subsection_id' => 'required|exists:subsections,id',
            'section_head' => 'required|string|max:255',
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
        $department = Department::find($id); // Use find to get the department by ID

        if (!$department) {
            return response()->json(['message' => 'Department not found.'], 404); // Return 404 if not found
        }

        $department->delete(); // Delete the department

        return response()->json(['message' => 'Department deleted successfully.']);
    }


    public function destroySubsection($id)
    {
        try {
            $subsection = Subsection::findOrFail($id);
            $subsection->delete();

            return response()->json(['message' => 'Subsection deleted successfully.']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error deleting subsection: ' . $e->getMessage()], 500);
        }
    }


}
