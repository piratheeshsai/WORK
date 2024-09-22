
@extends('tamplate.master')
@section('content')


<div class="container">
    <div class="form-container-create">
        <h2 class="form-header-create text-center">Create Here</h2>
        <form>
            <!-- Type of Work -->
            <div class="mb-3">
                <label for="workOrderType" class="form-label-create">Type Of Work</label>
                <select class="form-select-create" id="workOrderType" required>
                    <option value="" disabled selected>Select type</option>
                    <option value="civil">Plumbing & Water Supply</option>
                    <option value="electrical">Electrical</option>
                    <option value="carpentry">Carpentry & Masonry</option>
                    <option value="other">Other</option>
                </select>
            </div>

            <!-- Section -->
            <div class="mb-3">
                <label for="section" class="form-label-create">Section</label>
                <input type="text" class="form-control" id="section" placeholder="Section">
            </div>

            <!-- Subsection -->
            <div class="mb-3" id="subsectionsContainer-create">
                <label for="subsections" class="form-label-create">Subsection</label>
                <input type="text" class="form-control" id="subsections" placeholder="Subsection">
            </div>

            <!-- Department -->
            <div class="mb-3" id="departmentsContainer">
                <label for="departments" class="form-label-create">Department</label>
                <input type="text" class="form-control" id="departments" placeholder="Department">
            </div>

            <!-- Priority -->
            <div class="mb-3">
                <label for="priorityLevel" class="form-label-create">Priority</label>
                <select class="form-select-create" id="priorityLevel" required>
                    <option value="" disabled selected>Select priority</option>
                    <option value="normal">Normal</option>
                    <option value="urgent">Urgent</option>
                </select>
            </div>

            <!-- Complaint Description -->
            <div class="mb-3">
                <label for="workOrderDescription" class="form-label-create">Complain</label>
                <textarea class="form-control" id="workOrderDescription" rows="4" placeholder="Enter Complain Details" required></textarea>
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </form>
    </div>

</div>

@endsection
