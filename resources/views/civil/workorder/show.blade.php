@extends('civil.component.master')

@section('content')
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
                                <form action="{{ route('admin.workorder.destroy',  urlencode($workOrder->id)) }}" method="POST" style="display:inline;">
                                    @csrf
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
                                        <span class="text-dark text-uppercase">{{ optional($workOrder)->work_type ?? 'Not Updated' }}</span>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p class="mb-3">
                                        <strong class="text-muted">Complain:</strong>
                                        <span class="text-dark text-uppercase">{{ strip_tags($workOrder->complain)}}</span>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p class="mb-3">
                                        <strong class="text-muted">Priority:</strong>
                                        <span class="text-dark text-uppercase">{{ optional($workOrder)->priority ?? 'Not Updated' }}</span>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p class="mb-3">
                                        <strong class="text-muted">Created By:</strong>
                                        <span class="text-dark text-uppercase">{{ optional($workOrder)->EmployeeId ?? 'Not Updated' }}</span>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p class="mb-3">
                                        <strong class="text-muted">Date:</strong>
                                        <span class="text-dark text-uppercase">{{ optional($workOrder)->created_at->format('Y-m-d')?? 'Not Updated' }}</span>
                                    </p>
                                </div>
                                <!-- Other fields -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>

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
