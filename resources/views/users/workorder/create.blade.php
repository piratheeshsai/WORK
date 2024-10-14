@extends('users.component.master')

@section('content')
{{-- <div class="container">
    <div class="form-container-create">
        <div class="container mt-5">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <h2 class="form-header-create text-center mb-4" style="font-weight: bold; color: #343a40;">Create Here</h2>
            <form action="{{ route('user.work.store') }}" method="POST">
                @csrf


                <!-- Type of Work -->
                <div class="mb-3">
                    <label for="workOrderType" class="form-label-create" style="font-weight: 600;">Type Of Work</label>
                    <select class="form-select-create form-control" id="workOrderType" name="work_type" required
                        style="background-color: #f1f1f1; border-radius: 8px;">
                        <option value="" disabled selected>Select type</option>
                        <option value="civil">Plumbing & Water Supply</option>
                        <option value="electrical">Electrical</option>
                        <option value="carpentry">Carpentry & Masonry</option>
                        <option value="other">Other</option>
                    </select>
                </div>

                <!-- Priority -->
                <div class="mb-3">
                    <label for="priorityLevel" class="form-label-create" style="font-weight: 600;">Priority</label>
                    <select class="form-select-create form-control" id="priorityLevel" name="priority" required
                        style="background-color: #f1f1f1; border-radius: 8px;">
                        <option value="" disabled selected>Select priority</option>
                        <option value="normal">Normal</option>
                        <option value="urgent">Urgent</option>
                    </select>
                </div>

                <!-- Section -->
                <div class="mb-3">
                    <label for="section" class="form-label-create" style="font-weight: 600;">Section</label>
                    <input type="text" class="form-control" id="section" name="section" placeholder="Section"
                        value="{{ old('section', $userDetails->section ?? '') }}" readonly
                        style="background-color: #e9ecef; border-radius: 8px;">
                </div>

                <!-- Subsection -->
                <div class="mb-3" id="subsectionsContainer-create">
                    <label for="subsections" class="form-label-create" style="font-weight: 600;">Subsection</label>
                    <input type="text" class="form-control" id="subsections" name="subsection" placeholder="Subsection"
                        value="{{ old('subsection', $userDetails->subsection ?? '') }}" readonly
                        style="background-color: #d1d7dd; border-radius: 8px;">
                </div>

                <!-- Department -->
                <div class="mb-3" id="departmentsContainer">
                    <label for="departments" class="form-label-create" style="font-weight: 600;">Department</label>
                    <input type="text" class="form-control" id="departments" name="department"
                        value="{{ old('department', $userDetails->department ?? '') }}" readonly
                        style="background-color: #e9ecef; border-radius: 8px;">
                </div>

                <!-- Complaint Description -->
                <div class="mb-3">
                    <label for="workOrderDescription" class="form-label-create" style="font-weight: 600;">Complain</label>
                    <textarea class="form-control" id="workOrderDescription" name="complain" rows="4" placeholder="Enter Complain Details" required
                        style="background-color: #f8f9fa; border-radius: 8px;"></textarea>
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="btn btn-success px-4"
                        style="border-radius: 50px; font-weight: 600;">Submit</button>
                </div>
            </form>
        </div>
    </div> --}}

    <div class="container mt-5 d-flex justify-content-center">
        <div class="card shadow-lg p-4 col-lg-8 col-md-8 col-sm-10" style="max-width: 1000px;">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <h2 class="text-center mb-4" style="font-weight: bold; color: #343a40;">Work Order Form</h2>

            <form action="{{ route('user.work.store') }}" method="POST">
                @csrf

                <!-- Work Information Section -->
                <fieldset class="border p-2 mb-2" style="border-radius: 10px;">
                    <legend class="w-auto px-2" style="font-size: 1rem; font-weight: bold;">Work Information</legend>

                    <!-- Type of Work -->
                    <div class="mb-2">
                        <label for="workOrderType" class="form-label" style="font-weight: 400;">Type Of Work</label>
                        <select class="form-select" id="workOrderType" name="work_type" required>
                            <option value="" disabled selected>Select type</option>
                            <option value="civil">Plumbing & Water Supply</option>
                            <option value="electrical">Electrical</option>
                            <option value="carpentry">Carpentry & Masonry</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    <!-- Other Work Type (Hidden by default) -->
                    <div class="mb-2" id="otherWorkType" style="display: none;">
                        <label for="otherWorkInput" class="form-label" style="font-weight: 400;">Please specify</label>
                        <input type="text" class="form-control" id="otherWorkInput" name="other_work" placeholder="Specify work type">
                    </div>

                    <!-- Priority -->
                    <div class="mb-2">
                        <label for="priorityLevel" class="form-label" style="font-weight: 400;">Priority</label>
                        <select class="form-select" id="priorityLevel" name="priority" required>
                            <option value="" disabled selected>Select priority</option>
                            <option value="normal">Normal</option>
                            <option value="urgent">Urgent</option>
                        </select>
                    </div>
                </fieldset>

                <!-- User Details Section -->
                <fieldset class="border p-2 mb-2" style="border-radius: 10px;">
                    <legend class="w-auto px-2" style="font-size: 1rem; font-weight: bold;">User Details</legend>

                    <!-- Section -->
                    <div class="mb-2">
                        <label for="section" class="form-label" style="font-weight: 400;">Section</label>
                        <input type="text" class="form-control" id="section" name="section" placeholder="Section"
                            value="{{ old('section', $userDetails->section ?? '') }}" readonly>
                    </div>

                    <!-- Subsection -->
                    <div class="mb-2">
                        <label for="subsections" class="form-label" style="font-weight: 400;">Subsection</label>
                        <input type="text" class="form-control" id="subsections" name="subsection" placeholder="Subsection"
                            value="{{ old('subsection', $userDetails->subsection ?? '') }}" readonly>
                    </div>

                    <!-- Department -->
                    <div class="mb-2">
                        <label for="departments" class="form-label" style="font-weight: 400;">Department</label>
                        <input type="text" class="form-control" id="departments" name="department"
                            value="{{ old('department', $userDetails->department ?? '') }}" readonly>
                    </div>
                </fieldset>

                <!-- Complaint Section -->
                <fieldset class="border p-2 mb-2" style="border-radius: 10px;">
                    <legend class="w-auto px-2" style="font-size: 1rem; font-weight: bold;">Complaint Details</legend>

                    <!-- Complaint Description -->
                    <div class="mb-2">
                        <label for="workOrderDescription" class="form-label" style="font-weight: 400;">Complain</label>
                        <textarea class="form-control" id="workOrderDescription" name="complain" rows="3"
                            placeholder="Enter Complain Details" required></textarea>
                    </div>
                </fieldset>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-lg rounded-pill px-5" style="font-weight: 400;">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('workOrderType').addEventListener('change', function() {
            var otherWorkType = document.getElementById('otherWorkType');
            if (this.value === 'other') {
                otherWorkType.style.display = 'block';
            } else {
                otherWorkType.style.display = 'none';
            }
        });
    </script>


@endsection
