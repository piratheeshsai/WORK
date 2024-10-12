{{-- @extends('admin.layouts.master')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <h6>Create Section</h6>
            <form action="{{ route('admin.sections.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Section Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Create Section</button>
            </form>
        </div>
    </div>
</div>
@endsection --}}

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
                            <div class="col-md-3 mb-3"> <button class="btn btn-secondary w-100 toggle-section"
                                    data-bs-toggle="collapse" data-bs-target="#sectionTable{{ $section->id }}"
                                    aria-expanded="false"> {{ $section->name }} </button> </div>
                            @endforeach
                    </div>
                    <div class="accordion" id="sectionAccordion">
                        @foreach ($sections as $section)
                            <div class="accordion-item">
                                <div id="sectionTable{{ $section->id }}" class="accordion-collapse collapse"
                                    aria-labelledby="heading{{ $section->id }}" data-bs-parent="#sectionAccordion">
                                    <div class="accordion-body">
                                        <div class="d-flex justify-content-end mb-3"> <button class="btn btn-primary"
                                                data-bs-toggle="modal" data-bs-target="#createSubsectionModal"
                                                data-section-id="{{ $section->id }}"> Add New Subsection </button>
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
                                                                    <li id="departmentRow{{ $department->id }}"
                                                                        class="d-flex justify-content-between align-items-center">
                                                                        {{ $department->name }} <div> <button
                                                                                class="btn btn-sm btn-primary editDepartmentBtn"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#editDepartmentModal"
                                                                                data-department-id="{{ $department->id }}"
                                                                                data-department-name="{{ $department->name }}">
                                                                                Edit </button> <button
                                                                                class="btn btn-sm btn-danger deleteDepartmentBtn"
                                                                                data-department-id="{{ $department->id }}"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#deleteDepartmentModal">
                                                                                Delete </button> </div>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </td>
                                                        <td>{{ $subsection->section_head }}</td>
                                                        <td>
                                                            <div class="btn-group"> <button
                                                                    class="btn btn-primary editSectionHeadBtn"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#editSectionHeadModal"
                                                                    data-subsection-id="{{ $subsection->id }}"
                                                                    data-section-head="{{ $subsection->section_head }}">
                                                                    Edit Section Head </button> <button
                                                                    class="btn btn-secondary createDepartmentBtn"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#createDepartmentModal"
                                                                    data-subsection-id="{{ $subsection->id }}"> Add
                                                                    Department </button> <button
                                                                    class="btn btn-sm btn-danger deleteSubsectionBtn"
                                                                    data-subsection-id="{{ $subsection->id }}"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#deleteSubsectionModal"> Delete
                                                                </button> </div>
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
</div> <!-- Delete Department Modal -->
<div class="modal fade" id="deleteDepartmentModal" tabindex="-1" aria-labelledby="deleteDepartmentModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="deleteDepartmentForm"> @csrf @method('DELETE') <div class="modal-header">
                    <h5 class="modal-title" id="deleteDepartmentModalLabel">Delete Department</h5> <button
                        type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body"> <input type="hidden" name="department_id"> Are you sure you want to delete
                    this department? </div>
                <div class="modal-footer"> <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">Cancel</button> <button type="submit"
                        class="btn btn-danger">Delete</button> </div>
            </form>
        </div>
    </div>
</div> <!-- Delete Subsection Modal -->
<div class="modal fade" id="deleteSubsectionModal" tabindex="-1" aria-labelledby="deleteSubsectionModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="deleteSubsectionForm"> @csrf @method('DELETE') <div class="modal-header">
                    <h5 class="modal-title" id="deleteSubsectionModalLabel">Delete Subsection</h5> <button
                        type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body"> <input type="hidden" name="subsection_id"> Are you sure you want to delete
                    this subsection? </div>
                <div class="modal-footer"> <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">Cancel</button> <button type="submit"
                        class="btn btn-danger">Delete</button> </div>
            </form>
        </div>
    </div>
</div>
