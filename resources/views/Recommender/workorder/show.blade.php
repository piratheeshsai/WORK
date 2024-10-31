@extends('Recommender.component.master')

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
                                <!-- Approve Button -->
                                <form action="{{ route('recommender.workorder.approve', urlencode($workOrder->id)) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button class="btn btn-success btn-sm me-2" id="approve-btn">Approve</button>
                                </form>

                                <!-- Reject Button -->
                                <form action="{{ route('recommender.workorder.reject',  urlencode($workOrder->id)) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button class="btn btn-secondary btn-sm me-2" id="reject-btn">Reject</button>
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
        // Approve Button Confirmation
        document.getElementById('approve-btn').addEventListener('click', function(event) {
            event.preventDefault();
            Swal.fire({
                title: 'Approve this work order?',
                showDenyButton: true,
                confirmButtonText: 'Yes, approve it!',
                denyButtonText: 'No, cancel!',
            }).then((result) => {
                if (result.isConfirmed) {
                    this.closest('form').submit();
                } else if (result.isDenied) {
                    Swal.fire('Action cancelled', '', 'info');
                }
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
