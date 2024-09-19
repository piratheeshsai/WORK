
@extends('tamplate.master')
@section('content')

<div class="sidebar">
    <span class="menu-label">Menu</span>
    <ul class="navbar-links">
        <li class="active">
            <a href="#">
                <span class="nav-icon">
                    <i class="fa-solid fa-house"></i>
                </span>
                <span class="nav-text">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="{{ route('user.work.create') }}">
                <span class="nav-icon">
                    <i class="fa-solid fa-users"></i>
                </span>
                <span> Create Work Orders</span>
            </a>
        </li>
        <li>
            <a href="#">
                <span class="nav-icon">
                    <i class="fa-solid fa-tasks"></i>
                </span>
                <span class="nav-text"> View Work Orders</span>
            </a>
        </li>
        <li>
            <a href="#">
                <span class="nav-icon">
                    <i class="fa-solid fa-forward"></i>
                </span>
                <span class="nav-text"> Forward Work Orders</span>
            </a>
        </li>
        <li>
            <a href="#">
                <span class="nav-icon">
                    <i class="fa-solid fa-print"></i>
                </span>
                <span class="nav-text"> Print Work Order</span>
            </a>
        </li>
        <li>
            <a href="#">
                <span class="nav-icon">
                    <i class="fa-solid fa-file-text"></i>
                </span>
                <span class="nav-text"> Reports</span>
            </a>
        </li>
    </ul>
    <span class="line"></span>
</div>


<div class="contents">

    <div class="form-container mb-3">
        <h2 class="form-header text-center">Create Here</h2>
        <form>


            <div class="mb-3">
                <label for="workOrderType" class="form-label">Type Of Work</label>
                <select class="form-select" id="workOrderType" required>
                    <option value="" disabled selected>Select type</option>
                    <option value="civil">Plumbing & Water Supply</option>
                    <option value="electrical">Electrical</option>
                    <option value="carpentry">Carpentry & Masonry</option>
                    <option value="other">Other</option>
                </select>
            </div>



            <!-- Section -->
            <div class="mb-3">
                <label for="section" class="form-label">Section</label>
                <select class="form-select" id="section" required>
                    <option value="" disabled selected>Select Section</option>
                    @foreach($section as $sec)
                        <option value="{{ $sec->id }}">{{ $sec->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Subcategories (Faculties, Admin Sections, Centers) -->
            <div class="mb-3" id="subsectionsContainer" style="display: none;">
                <label for="subsections" class="form-label">Subsection</label>
                <select class="form-select" id="subsections" required>
                    <option value="" disabled selected>Select Subsection</option>
                </select>
            </div>

            <!-- Departments -->
            <div class="mb-3" id="departmentsContainer" style="display: none;">
                <label for="departments" class="form-label">Department</label>
                <select class="form-select" id="departments" required>
                    <option value="" disabled selected>Select Department</option>
                </select>
            </div>


            <div class="mb-3">
                <label for="priorityLevel" class="form-label">Priority</label>
                <select class="form-select" id="priorityLevel" required>
                    <option value="" disabled selected>Select priority</option>
                    <option value="normal">Normal</option>
                    <option value="urgent">Urgent</option>
                </select>
            </div>

            <!-- Complaint -->
            <div class="mb-3">
                <label for="workOrderDescription" class="form-label">Complain</label>
                <textarea class="form-control" id="workOrderDescription" rows="4" placeholder="Enter Complain Details" required></textarea>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>


</div>

@endsection
