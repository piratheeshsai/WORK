@extends('admin.layouts.master')
<link rel="stylesheet" href="{{ asset('css/responsives.css') }}">

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h5>Sections</h5>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            @foreach ($sections as $section)
                                <div class="col-md-3 mb-3">
                                    <button class="btn btn-secondary w-100 toggle-section" data-bs-toggle="collapse"
                                        data-bs-target="#sectionTable{{ $section->id }}" aria-expanded="false">
                                        {{ $section->name }}
                                    </button>
                                </div>
                            @endforeach
                        </div>

                        <div class="accordion" id="sectionAccordion">
                            @foreach ($sections as $section)
                                <div class="accordion-item">
                                    <div id="sectionTable{{ $section->id }}" class="accordion-collapse collapse"
                                        aria-labelledby="heading{{ $section->id }}" data-bs-parent="#sectionAccordion">
                                        <div class="accordion-body">
                                            <div class="d-flex justify-content-end mb-3">
                                                <button class="btn bg-gradient-primary" data-bs-toggle="modal"
                                                    data-bs-target="#createSubsectionModal"
                                                    data-section-id="{{ $section->id }}"><i
                                                        class="fa-solid fa-circle-plus me-2"></i>
                                                    Add New Subsection
                                                </button>
                                            </div>
                                            <div class="table-responsive-wrapper">
                                                <table class="table align-items-center justify-content-center mb-0">

                                                    <thead>
                                                        <tr>
                                                            <th
                                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                                Subsection</th> <!-- Subsection Column Header -->
                                                            <th
                                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                                Departments</th> <!-- Departments Column Header -->
                                                            <th
                                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                                Section Head</th> <!-- Section Head Column Header -->
                                                        </tr>
                                                    </thead>

                                                    <tbody id="subsectionTable{{ $section->id }}">
                                                        @foreach ($section->subsections as $subsection)
                                                            <tr id="subsectionRow{{ $subsection->id }}">
                                                                <!-- Subsection Column -->
                                                                <td>
                                                                    <div class="d-flex px-3">
                                                                        <div class="my-auto">
                                                                            <h6 class="mb-0">
                                                                                <span>{{ $subsection->name }}</span>
                                                                            </h6>
                                                                        </div>

                                                                        <button
                                                                            class="btn btn-link p-0 text-secondary mb-0 ms-auto "
                                                                            type="button" data-bs-toggle="dropdown"
                                                                            aria-expanded="false">
                                                                            <i class="fa fa-ellipsis-v text-xs"></i>
                                                                        </button>

                                                                        <ul class="dropdown-menu">
                                                                            <li>
                                                                                <button class="dropdown-item"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#createDepartmentModal"
                                                                                    data-subsection-id="{{ $subsection->id }}">
                                                                                    <i class="fa-solid fa-file-circle-plus me-2"></i>
                                                                                      <span class="fw-bold"> Add Department </span>
                                                                                </button>
                                                                            </li>
                                                                            <li>
                                                                                <form
                                                                                    action="{{ route('admin.subsections.destroy', $subsection->id) }}"
                                                                                    method="POST"
                                                                                    class="delete-subsection-form">
                                                                                    @csrf
                                                                                    @method('DELETE')
                                                                                    <button type="button"
                                                                                        class="dropdown-item deleteSubsectionBtn"
                                                                                        data-subsection-id="{{ $subsection->id }}">
                                                                                        <i class="fa-solid fa-trash me-2"></i>
                                                                                      <span class="fw-bold">  Delete Subsection </span>
                                                                                    </button>
                                                                                </form>

                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </td>

                                                                <!-- Departments Column -->
                                                                <td>
                                                                    <ul class="list-unstyled mb-0">
                                                                        @foreach ($subsection->departments as $department)
                                                                            <li>
                                                                                <div class="d-flex px-3 align-items-center">
                                                                                    <div class="my-auto">
                                                                                        <h7 class="mb-0">
                                                                                            <span>{{ $department->name }}</span>
                                                                                        </h7>
                                                                                    </div>
                                                                                    <button
                                                                                        class="btn btn-link p-0 text-secondary mb-0 ms-auto"
                                                                                        type="button"
                                                                                        data-bs-toggle="dropdown"
                                                                                        aria-expanded="false">
                                                                                        <i
                                                                                            class="fa fa-ellipsis-v text-xs"></i>
                                                                                        <!-- Dropdown icon -->
                                                                                    </button>

                                                                                    <ul class="dropdown-menu">
                                                                                        <li>
                                                                                            <button
                                                                                                class="dropdown-item editDepartmentBtn"
                                                                                                data-bs-toggle="modal"
                                                                                                data-bs-target="#editDepartmentModal"
                                                                                                data-department-id="{{ $department->id }}"
                                                                                                data-department-name="{{ $department->name }}">
                                                                                                <i class="fa-solid fa-file-pen me-2"></i>
                                                                                               <span class="fw-bold"> Edit Department </span
                                                                                            </button>
                                                                                        </li>
                                                                                        <li>
                                                                                            <form
                                                                                                action="{{ route('admin.departments.destroy', $department->id) }}"
                                                                                                method="POST"
                                                                                                class="delete-form">
                                                                                                @csrf
                                                                                                @method('DELETE')
                                                                                                <button type="button"
                                                                                                    class="dropdown-item delete-btn"
                                                                                                    data-department-id="{{ $department->id }}">
                                                                                                    <i class="fa-solid fa-trash me-2"></i>
                                                                                      <span class="fw-bold">  Delete Department </span>

                                                                                                </button>
                                                                                            </form>
                                                                                        </li>

                                                                                    </ul>
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                            </div>
                                            </td>

                                            <!-- Section Head Column -->
                                            <td>

                                                <div class="d-flex px-3 align-items-center">
                                                    <div class="my-auto">

                                                        <span>{{ $subsection->section_head }}</span>
                                                    </div>
                                                    <!-- Button aligned to the right -->
                                                    <button
                                                        class="btn btn-link p-0 mb-0 ms-auto text-primary editSectionHeadBtn"
                                                        data-bs-toggle="modal" data-bs-target="#editSectionHeadModal"
                                                        data-subsection-id="{{ $subsection->id }}"
                                                        data-section-head="{{ $subsection->section_head }}">
                                                        <i class="fa-solid fa-pen-to-square"></i>
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
            </div>
            @endforeach
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>

    <!-- Delete Subsection Modal -->
    <div class="modal fade" id="deleteSubsectionModal" tabindex="-1" aria-labelledby="deleteSubsectionModalLabel"
        aria-hidden="true">
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
    <div class="modal fade" id="editSectionHeadModal" tabindex="-1" aria-labelledby="editSectionHeadLabel"
        aria-hidden="true">
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
    <div class="modal fade" id="editDepartmentModal" tabindex="-1" aria-labelledby="editDepartmentLabel"
        aria-hidden="true">
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




    <!-- Modal for Adding New Subsection -->
    <div class="modal fade" id="createSubsectionModal" tabindex="-1" aria-labelledby="createSubsectionModalLabel"
        aria-hidden="true">
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


                        <div class="mb-3">
                            <label for="recommender_id" class="form-label">Recommender</label>
                            <select name="recommender_id" id="recommender_id" class="form-select">
                                @foreach ($recommenders as $recommender)
                                    <option value="{{ $recommender->userID }}">{{ $recommender->name }}</option>
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
    <div class="modal fade" id="createDepartmentModal" tabindex="-1" aria-labelledby="createDepartmentModalLabel"
        aria-hidden="true">
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
                            <input type="hidden" name="subsections_id" value="">
                            <input type="text" name="name" placeholder="Department Name" required>
                        </div>
                        <!-- Hidden input for subsection_id -->

                        <button type="submit" class="btn btn-primary">Add Department</button>
                    </form>
                </div>
            </div>
        </div>
    </div>




    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        $(document).ready(function() {
            $('.toggle-buttons').on('click', function() {
                // Toggle visibility of the delete and add department buttons
                $(this).closest('div').find('.delete-btn, .createDepartmentBtn').toggle();
            });
        });


        $(document).on('click', '.deleteSubsectionBtn', function(event) {
            event.preventDefault();
            var form = $(this).closest('form');

            Swal.fire({
                title: 'Are you sure?',
                text: "This action cannot be undone!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                    Swal.fire('Deleted!', 'The subsection has been deleted.', 'success');
                }
            });
        });
    </script>
@endsection


<script>
    var createSubsectionUrl = "{{ route('admin.subsections.store') }}";
    var createDepartmentUrl = "{{ route('admin.departments.store') }}";
    var editSectionHeadUrl = "{{ route('admin.subsections.update') }}";
    var editDepartmentUrl = "{{ route('admin.departments.update') }}";
    var csrfToken = '{{ csrf_token() }}';
    var storeSubsectionUrl = "{{ route('admin.subsections.store') }}";
</script>

<script src="{{ asset('js/ajex.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.2.0/js/bootstrap.min.js"></script>
