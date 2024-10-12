{{-- @extends('admin.layouts.master')

@section('content')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                    <h6>Sections, Subsections, and Departments</h6>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createSubsectionModal">
                        Add New Subsection
                    </button>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach ($sections as $section)
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h5 class="mb-0">{{ $section->name }}</h5>
                                        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $section->id }}" aria-expanded="false" aria-controls="collapse{{ $section->id }}">
                                            View
                                        </button>
                                    </div>
                                    <div id="collapse{{ $section->id }}" class="collapse">
                                        <div class="card-body">
                                            <h6>Subsections</h6>
                                            <ul class="list-group mb-3">
                                                @foreach ($section->subsections as $subsection)
                                                    <li class="list-group-item">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div>
                                                                <strong>{{ $subsection->name }}</strong>
                                                                <br>
                                                                Section Head: {{ $subsection->section_head }}
                                                            </div>
                                                            <i class="fas fa-pencil-alt editSectionHeadBtn ms-auto" data-subsection-id="{{ $subsection->id }}" data-section-head="{{ $subsection->section_head }}" data-bs-toggle="modal" data-bs-target="#editSectionHeadModal"></i>
                                                        </div>
                                                        <br> Departments:
                                                        <ul id="subsectionDepartments{{ $subsection->id }}">
                                                            @foreach ($subsection->departments as $department)
                                                                <li>
                                                                    <div class="d-flex justify-content-between align-items-center">
                                                                        {{ $department->name }}
                                                                        <i class="fas fa-pencil-alt editDepartmentBtn ms-auto" data-department-id="{{ $department->id }}" data-department-name="{{ $department->name }}" data-bs-toggle="modal" data-bs-target="#editDepartmentModal"></i>
                                                                    </div>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                        <button class="btn btn-secondary btn-sm mt-2 createDepartmentBtn" data-bs-toggle="modal" data-bs-target="#createDepartmentModal" data-subsection-id="{{ $subsection->id }}">
                                                            Add New Department
                                                        </button>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    {{-- @extends('admin.layouts.master')

    @section('content') --}}

    {{-- <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                        <h6>Sections</h6>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createSubsectionModal">
                            Add New Subsection
                        </button>
                    </div>
                    <div class="card-body">
                        <!-- Section Name Row -->
                        <div class="row">
                            @foreach ($sections as $section)
                            <div class="col-md-3 mb-3">
                                <button class="btn btn-secondary w-100 toggle-section" data-bs-toggle="collapse" data-bs-target="#sectionTable{{ $section->id }}" aria-expanded="false">
                                    {{ $section->name }}
                                </button>
                            </div>
                            @endforeach
                        </div>

                        <!-- Full Width Table for Each Section (Collapsible) -->
                        <div class="accordion" id="sectionAccordion">
                            @foreach ($sections as $section)
                            <div class="accordion-item">
                                <div id="sectionTable{{ $section->id }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $section->id }}" data-bs-parent="#sectionAccordion">
                                    <div class="accordion-body">

                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Subsection</th>
                                                    <th>Departments</th>
                                                    <th>Section Head</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($section->subsections as $subsection)
                                                <tr>
                                                    <td>{{ $subsection->name }}</td>
                                                    <td>
                                                        <ul>
                                                            @foreach ($subsection->departments as $department)
                                                            <li>
                                                                <div class="d-flex justify-content-between align-items-center">
                                                                    {{ $department->name }}
                                                                    <!-- Edit Department Button -->
                                                                    <button class="btn btn-sm btn-primary editDepartmentBtn" data-bs-toggle="modal" data-bs-target="#editDepartmentModal" data-department-id="{{ $department->id }}" data-department-name="{{ $department->name }}">
                                                                        Edit
                                                                    </button>
                                                                </div>
                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                    </td>
                                                    <td>{{ $subsection->section_head }}</td>
                                                    <td>
                                                        <!-- Edit Section Head Button -->
                                                        <button class="btn btn-primary editSectionHeadBtn" data-bs-toggle="modal" data-bs-target="#editSectionHeadModal" data-subsection-id="{{ $subsection->id }}" data-section-head="{{ $subsection->section_head }}">
                                                            Edit Section Head
                                                        </button>
                                                        <!-- Add New Department Button -->
                                                        <button class="btn btn-secondary createDepartmentBtn" data-bs-toggle="modal" data-bs-target="#createDepartmentModal" data-subsection-id="{{ $subsection->id }}">
                                                            Add Department
                                                        </button>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}


    @extends('admin.layouts.master')

    @section('content')

    {{-- <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Sections</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($sections as $section)
                            <div class="col-md-3 mb-3">
                                <button class="btn btn-secondary w-100 toggle-section" data-bs-toggle="collapse" data-bs-target="#sectionTable{{ $section->id }}" aria-expanded="false">
                                    {{ $section->name }}
                                </button>
                            </div>
                            @endforeach
                        </div>

                        <div class="accordion" id="sectionAccordion">
                            @foreach ($sections as $section)
                            <div class="accordion-item">
                                <div id="sectionTable{{ $section->id }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $section->id }}" data-bs-parent="#sectionAccordion">
                                    <div class="accordion-body">
                                        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createSubsectionModal" data-section-id="{{ $section->id }}">
                                            Add New Subsection
                                        </button>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Subsection</th>
                                                    <th>Departments</th>
                                                    <th>Section Head</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody id="subsectionTable{{ $section->id }}">
                                                @foreach ($section->subsections as $subsection)
                                                <tr id="subsectionRow{{ $subsection->id }}">
                                                    <td>{{ $subsection->name }}</td>
                                                    <td>
                                                        <ul>
                                                            @foreach ($subsection->departments as $department)
                                                            <li id="departmentRow{{ $department->id }}">
                                                                <div class="d-flex justify-content-between align-items-center">
                                                                    {{ $department->name }}
                                                                    <button class="btn btn-sm btn-primary editDepartmentBtn" data-bs-toggle="modal" data-bs-target="#editDepartmentModal" data-department-id="{{ $department->id }}" data-department-name="{{ $department->name }}">
                                                                        Edit
                                                                    </button>
                                                                    <button class="btn btn-sm btn-danger deleteDepartmentBtn" data-department-id="{{ $department->id }}" data-bs-toggle="modal" data-bs-target="#deleteDepartmentModal">
                                                                        Delete
                                                                    </button>
                                                                </div>
                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                    </td>
                                                    <td>{{ $subsection->section_head }}</td>
                                                    <td>
                                                        <button class="btn btn-primary editSectionHeadBtn" data-bs-toggle="modal" data-bs-target="#editSectionHeadModal" data-subsection-id="{{ $subsection->id }}" data-section-head="{{ $subsection->section_head }}">
                                                            Edit Section Head
                                                        </button>
                                                        <button class="btn btn-secondary createDepartmentBtn" data-bs-toggle="modal" data-bs-target="#createDepartmentModal" data-subsection-id="{{ $subsection->id }}">
                                                            Add Department
                                                        </button>
                                                        <button class="btn btn-sm btn-danger deleteSubsectionBtn" data-subsection-id="{{ $subsection->id }}" data-bs-toggle="modal" data-bs-target="#deleteSubsectionModal">
                                                            Delete
                                                        </button>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



<!-- Delete Department Modal -->
<div class="modal fade" id="deleteDepartmentModal" tabindex="-1" aria-labelledby="deleteDepartmentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="deleteDepartmentForm">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteDepartmentModalLabel">Delete Department</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="department_id">
                    Are you sure you want to delete this department?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Subsection Modal -->
<div class="modal fade" id="deleteSubsectionModal" tabindex="-1" aria-labelledby="deleteSubsectionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="deleteSubsectionForm">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteSubsectionModalLabel">Delete Subsection</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="subsection_id">
                    Are you sure you want to delete this subsection?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>





    <div class="modal fade" id="editSectionHeadModal" tabindex="-1" aria-labelledby="editSectionHeadLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editSectionHeadLabel">Edit Section Head</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editSectionHeadForm">
                        <input type="hidden" id="edit_subsection_id">
                        <div class="mb-3">
                            <label for="section_head" class="form-label">Section Head</label>
                            <input type="text" class="form-control" id="section_head">
                        </div>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Department Modal -->
    <div class="modal fade" id="editDepartmentModal" tabindex="-1" aria-labelledby="editDepartmentLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editDepartmentLabel">Edit Department</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editDepartmentForm">
                        <input type="hidden" id="edit_department_id">
                        <div class="mb-3">
                            <label for="department_name" class="form-label">Department Name</label>
                            <input type="text" class="form-control" id="department_name">
                        </div>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Create Subsection Modal -->
    <div class="modal fade" id="createSubsectionModal" tabindex="-1" aria-labelledby="createSubsectionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createSubsectionModalLabel">Add New Subsection</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="createSubsectionForm">
                        @csrf
                        <div class="mb-3">
                            <label for="subsectionName" class="form-label">Subsection Name</label>
                            <input type="text" name="name" class="form-control" id="subsectionName" required>
                        </div>
                        <div class="mb-3">
                            <label for="sectionHead" class="form-label">Section Head</label>
                            <input type="text" name="section_head" class="form-control" id="sectionHead" required>
                        </div>
                        <div class="mb-3">
                            <label for="section_id" class="form-label">Select Section</label>
                            <select name="section_id" class="form-select" id="section_id" required>
                                @foreach ($sections as $section)
                                    <option value="{{ $section->id }}">{{ $section->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Subsection</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Department Modal -->
    <div class="modal fade" id="createDepartmentModal" tabindex="-1" aria-labelledby="createDepartmentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createDepartmentModalLabel">Add New Department</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="createDepartmentForm">
                        @csrf
                        <div class="mb-3">
                            <label for="departmentName" class="form-label">Department Name</label>
                            <input type="text" name="name" class="form-control" id="departmentName" required>
                        </div>
                        <input type="hidden" name="subsection_id" id="subsection_id" required>
                        <button type="submit" class="btn btn-primary">Add Department</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div> --}}

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Sections</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach ($sections as $section)
                        <div class="col-md-3 mb-3">
                            <button class="btn btn-secondary w-100 toggle-section" data-bs-toggle="collapse" data-bs-target="#sectionTable{{ $section->id }}" aria-expanded="false">
                                {{ $section->name }}
                            </button>
                        </div>
                        @endforeach
                    </div>
                    <div class="accordion" id="sectionAccordion">
                        @foreach ($sections as $section)
                        <div class="accordion-item">
                            <div id="sectionTable{{ $section->id }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $section->id }}" data-bs-parent="#sectionAccordion">
                                <div class="accordion-body">
                                    <div class="d-flex justify-content-end mb-3">
                                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createSubsectionModal" data-section-id="{{ $section->id }}">
                                            Add New Subsection
                                        </button>
                                    </div>

                                    <table class="table table-bordered table-striped">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Subsection</th>
                                                <th>Departments</th>
                                                <th>Section Head</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody id="subsectionTable{{ $section->id }}">
                                            @foreach ($section->subsections as $subsection)
                                            <tr id="subsectionRow{{ $subsection->id }}">
                                                <td>{{ $subsection->name }}</td>
                                                <td>
                                                    <ul class="list-unstyled">
                                                        @foreach ($subsection->departments as $department)
                                                        <li id="departmentRow{{ $department->id }}" class="d-flex justify-content-between align-items-center">
                                                            {{ $department->name }}
                                                            <div>
                                                                <button class="btn btn-sm btn-primary editDepartmentBtn" data-bs-toggle="modal" data-bs-target="#editDepartmentModal" data-department-id="{{ $department->id }}" data-department-name="{{ $department->name }}">
                                                                    Edit
                                                                </button>
                                                                <button class="btn btn-sm btn-danger deleteDepartmentBtn" data-department-id="{{ $department->id }}" data-bs-toggle="modal" data-bs-target="#deleteDepartmentModal">
                                                                    Delete
                                                                </button>
                                                            </div>
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                </td>
                                                <td>{{ $subsection->section_head }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button class="btn btn-primary editSectionHeadBtn" data-bs-toggle="modal" data-bs-target="#editSectionHeadModal" data-subsection-id="{{ $subsection->id }}" data-section-head="{{ $subsection->section_head }}">
                                                            Edit Section Head
                                                        </button>
                                                        <button class="btn btn-secondary createDepartmentBtn" data-bs-toggle="modal" data-bs-target="#createDepartmentModal" data-subsection-id="{{ $subsection->id }}">
                                                            Add Department
                                                        </button>
                                                        <button class="btn btn-sm btn-danger deleteSubsectionBtn" data-subsection-id="{{ $subsection->id }}" data-bs-toggle="modal" data-bs-target="#deleteSubsectionModal">
                                                            Delete
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Department Modal -->
<div class="modal fade" id="deleteDepartmentModal" tabindex="-1" aria-labelledby="deleteDepartmentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="deleteDepartmentForm">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteDepartmentModalLabel">Delete Department</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="department_id">
                    Are you sure you want to delete this department?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Subsection Modal -->
<div class="modal fade" id="deleteSubsectionModal" tabindex="-1" aria-labelledby="deleteSubsectionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="deleteSubsectionForm">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteSubsectionModalLabel">Delete Subsection</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="subsection_id">
                    Are you sure you want to delete this subsection?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Section Head Modal -->
<div class="modal fade" id="editSectionHeadModal" tabindex="-1" aria-labelledby="editSectionHeadLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editSectionHeadLabel">Edit Section Head</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editSectionHeadForm">
                    @csrf
                    <input type="hidden" id="edit_subsection_id">
                    <div class="mb-3">
                        <label for="section_head" class="form-label">Section Head</label>
                        <input type="text" class="form-control" id="section_head">
                    </div>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Department Modal -->
<div class="modal fade" id="editDepartmentModal" tabindex="-1" aria-labelledby="editDepartmentLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editDepartmentLabel">Edit Department</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editDepartmentForm">
                    <input type="hidden" id="edit_department_id">
                    <div class="mb-3">
                        <label for="department_name" class="form-label">Department Name</label>
                        <input type="text" class="form-control" id="department_name">
                    </div>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Create Subsection Modal -->
<div class="modal fade" id="createSubsectionModal" tabindex="-1" aria-labelledby="createSubsectionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createSubsectionModalLabel">Add New Subsection</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="createSubsectionForm">
                    @csrf
                    <div class="mb-3">
                        <label for="subsectionName" class="form-label">Subsection Name</label>
                        <input type="text" name="name" class="form-control" id="subsectionName" required>
                    </div>
                    <div class="mb-3">
                        <label for="sectionHead" class="form-label">Section Head</label>
                        <input type="text" name="section_head" class="form-control" id="sectionHead" required>
                    </div>
                    <div class="mb-3">
                        <label for="section_id" class="form-label">Select Section</label>
                        <select name="section_id" class="form-select" id="section_id" required>
                            @foreach ($sections as $section)
                                <option value="{{ $section->id }}">{{ $section->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Subsection</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Create Department Modal -->
<div class="modal fade" id="createDepartmentModal" tabindex="-1" aria-labelledby="createDepartmentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDepartmentModalLabel">Add New Department</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="createDepartmentForm">
                    @csrf
                    <div class="mb-3">
                        <label for="departmentName" class="form-label">Department Name</label>
                        <input type="text" name="name" class="form-control" id="departmentName" required>
                    </div>
                    <input type="hidden" name="subsection_id" id="subsection_id" required>
                    <button type="submit" class="btn btn-primary">Add Department</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>

<script src="{{ asset('js/ajex.js') }}"></script>



<script>
    var createSubsectionUrl = "{{ route('admin.subsections.store') }}";
    var createDepartmentUrl = "{{ route('admin.departments.store') }}";
    var editSectionHeadUrl = "{{ route('admin.subsections.update') }}";
    var editDepartmentUrl = "{{ route('admin.departments.update') }}";
    var csrfToken = '{{ csrf_token() }}';
</script>

