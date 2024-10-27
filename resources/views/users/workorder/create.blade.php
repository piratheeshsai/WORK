@extends('users.component.master')

@section('content')
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
                        {{-- <textarea class="form-control" id="workOrderDescription" name="complain" rows="3"
                            placeholder="Enter Complain Details"></textarea> --}}

                            <textarea class="form-control" id="workOrderDescription" name="complain" rows="3"
                             placeholder="Enter Complain Details"></textarea>

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



    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>

    <script>

tinymce.init({
    selector: '#workOrderDescription',
    license_key: 'gpl',  // This will accept the open-source license terms
    plugins: 'lists advlist autolink link image charmap preview anchor',
    toolbar: 'undo redo | formatselect | bold italic backcolor | \
              alignleft aligncenter alignright alignjustify | \
              bullist numlist outdent indent | removeformat',
});
        document.getElementById('workOrderType').addEventListener('change', function() {
               var otherWorkType = document.getElementById('otherWorkType');
               if (this.value === 'other') {
                otherWorkType.style.display = 'block';
            } else {
                    otherWorkType.style.display = 'none';
                }
            });


           // Check if any event listener has this pattern:
    document.querySelector("form").addEventListener("submit", function (event) {
     event.preventDefault();
        // Custom JavaScript logic
     });
    </script>

@endsection





