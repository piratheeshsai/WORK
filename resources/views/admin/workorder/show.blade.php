@extends('admin.layouts.master')

@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/ajex.js') }}"></script>

    <div class="container-fluid py-4 mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <h3 class="mb-0">Work Order Details</h3>
                            <!-- Push the buttons to the right -->
                            <div class="ms-auto d-flex">

                                <!-- Reject Button -->
                                <form action="{{ route('admin.workorder.destroy', urlencode($workOrder->id)) }}"
                                    method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-secondary btn-sm me-2" id="reject-btn">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="card">
                        <div class="card-header">
                            <h6>{{ $workOrder->id }}</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="mb-3">
                                        <strong class="text-muted">Work Type:</strong>
                                        <span
                                            class="text-dark text-uppercase">{{ optional($workOrder)->work_type ?? 'Not Updated' }}</span>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p class="mb-3">
                                        <strong class="text-muted">Complain:</strong>
                                        <span
                                            class="text-dark text-uppercase">{{ strip_tags($workOrder->complain) }}</span>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p class="mb-3">
                                        <strong class="text-muted">Priority:</strong>
                                        <span
                                            class="text-dark text-uppercase">{{ optional($workOrder)->priority ?? 'Not Updated' }}</span>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p class="mb-3">
                                        <strong class="text-muted">Created By:</strong>
                                        <span
                                            class="text-dark text-uppercase">{{ optional($workOrder)->EmployeeId ?? 'Not Updated' }}</span>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p class="mb-3">
                                        <strong class="text-muted">Date:</strong>
                                        <span
                                            class="text-dark text-uppercase">{{ optional($workOrder)->created_at->format('Y-m-d') ?? 'Not Updated' }}</span>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p class="mb-3">
                                        <strong class="text-muted">Status:</strong>
                                        <span id="work-order-status" class="text-dark text-uppercase">{{ optional($workOrder)->status ?? 'Not Updated' }}</span>
                                    </p>
                                </div>

                                <!-- Admin Status Editing Section -->
                                <div class="col-md-12 mt-4">
                                    <div class="form-group">
                                        <label for="status" class="text-muted"><strong>Edit Status:</strong></label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="Pending" {{ $workOrder->status === 'Pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="Work in Progress" {{ $workOrder->status === 'Work in Progress' ? 'selected' : '' }}>Work in Progress</option>
                                            <option value="Completed" {{ $workOrder->status === 'Completed' ? 'selected' : '' }}>Completed</option>
                                        </select>
                                    </div>
                                    <div class="form-group mt-3">
                                        <button id="update-status-btn" class="btn btn-primary">Update Status</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>


$(document).ready(function () {
    $('#update-status-btn').on('click', function () {
        const workOrderId = encodeURIComponent('{{ $workOrder->id }}'); // Encode the work order ID
        const url = '{{ route("admin.workorder.updateStatus", ":id") }}'.replace(':id', encodeURIComponent(workOrderId));


        $.ajax({
            url: url, // Dynamically generated URL
            type: 'POST', // Use POST method
            data: {
                _token: '{{ csrf_token() }}', // Include CSRF token
                status: 'Completed', // Example status
            },
            success: function (response) {
                alert('Status updated successfully!');
                console.log(response); // Debugging info
            },
            error: function (xhr) {
                alert('Failed to update status. Please try again.');
                console.error(xhr.responseText); // Log error details
            }
        });
    });
});



        // Reject Button Confirmation
        document.getElementById('reject-btn').addEventListener('click', function(event) {
            event.preventDefault();
            Swal.fire({
                title: 'Reject this work order?',
                showDenyButton: true,
                confirmButtonText: 'Yes, reject it!',
                denyButtonText: 'No, cancel!',
            }).then((result) => {
                if (result.isConfirmed) {
                    this.closest('form').submit();
                } else if (result.isDenied) {
                    Swal.fire('Action cancelled', '', 'info');
                }
            });
        });
    </script>
@endsection
