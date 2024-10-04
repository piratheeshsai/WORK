@extends('admin.layouts.master')

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
                                            Toggle
                                        </button>
                                    </div>
                                    <div id="collapse{{ $section->id }}" class="collapse">
                                        <div class="card-body">
                                            <h6>Subsections</h6>
                                            <ul class="list-group mb-3">
                                                @foreach ($section->subsections as $subsection)
                                                    <li class="list-group-item">
                                                        <strong>{{ $subsection->name }}</strong>
                                                        <br> Section Head: {{ $subsection->section_head }}
                                                        <br> Departments:
                                                        <ul id="subsectionDepartments{{ $subsection->id }}">
                                                            @foreach ($subsection->departments as $department)
                                                                <li>{{ $department->name }}</li>
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

</div>

@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>

<script>
$(document).ready(function () {
    // Handle the submission of the subsection form
    $('#createSubsectionForm').submit(function (e) {
        e.preventDefault(); // Prevent the default form submission

        var formData = $(this).serialize(); // Serialize the form data

        $.ajax({
            url: "{{ route('admin.subsections.store') }}", // Ensure this route is correct
            type: 'POST',
            data: formData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                $('#createSubsectionModal').modal('hide'); // Hide the modal
                alert('Subsection added successfully!');

                // Optionally, you can update the UI here to show the new subsection
            },
            error: function (xhr) {
                console.log(xhr.responseText); // Log the error response
                alert('An error occurred while adding the subsection.');
            }
        });
    });

    // Handle the submission of the department form
    $('#createDepartmentForm').submit(function (e) {
        e.preventDefault(); // Prevent the default form submission

        var formData = $(this).serialize(); // Serialize the form data

        $.ajax({
            url: "{{ route('admin.departments.store') }}", // Ensure this route is correct
            type: 'POST',
            data: formData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                $('#createDepartmentModal').modal('hide'); // Hide the modal
                alert('Department added successfully!');

                // Update department list dynamically under the selected subsection
                $('#subsectionDepartments' + response.subsection_id).append(`<li>${response.department.name}</li>`);
            },
            error: function (xhr) {
                console.log(xhr.responseText); // Log the error response
                alert('An error occurred while adding the department.');
            }
        });
    });

    // Set subsection_id when creating a department
    $(document).on('click', '.createDepartmentBtn', function () {
        var subsectionId = $(this).data('subsection-id');
        $('#subsection_id').val(subsectionId);
    });
});
</script>