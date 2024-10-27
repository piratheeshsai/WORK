@extends('Recommender.component.master')

@section('content')
    <div class="container-fluid py-4 mt-5">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <h6 class="mb-0">User Details</h5>
                                <!-- Push the buttons to the right -->

                                </div>
                        </div>
                    </div>


                    <div class="card">

                        <div class="card-header">
                            <h3>{{ $workOrder->id }}</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-6">
                                    <p class="mb-3">
                                        <strong class="text-muted">EmployeeID:</strong>
                                        <span
                                            {{-- class="text-dark text-uppercase">{{ optional($user->userDetails)->EmployeeId ?? 'Not Updated' }}</span> --}}
                                    </p>

                                </div>
                                <div class="col-md-6">
                                    <p class="mb-3">
                                        <strong class="text-muted">Email:</strong>
                                        <span
                                            {{-- class="text-dark">{{ optional($user->userDetails)->email ?? 'Not Updated' }}</span> --}}
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p class="mb-3">
                                        <strong class="text-muted">Mobile:</strong>
                                        <span
                                            {{-- class="text-dark">{{ optional($user->userDetails)->PhoneNumber ?? 'Not Updated' }}</span> --}}
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p class="mb-2">
                                        <strong class="text-muted">Section:</strong>
                                        <span
                                            {{-- class="text-dark">{{ optional($user->userDetails)->subsection ?? 'Not Updated' }}</span> --}}
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p class="mb-3">
                                        <strong class="text-muted">User ID:</strong>
                                        <span class="text-dark">{{ $workOrder->id }}</span>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p class="mb-3">
                                        <strong class="text-muted">Role:</strong>
                                        <span class="text-dark">{{ $workOrder->id }}</span>
                                    </p>
                                </div>

                                <p><strong>Created At:</strong> {{ $workOrder->id }}</p>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-md-4">
                <div class="card card-profile">


                    <div class="card-body pt-0">
                        <div class="card-header pb-0">
                            <h5 class="mb-1">
                                Work Orders History
                            </h5>
                        </div>
                        <div class="row">


                            <div class="col mt-4">
                                <div class="d-flex justify-content-center">
                                    <div class="d-grid text-center">
                                        <span class="text-sm opacity-8">Total</span>
                                        <span class="badge  bg-gradient-primary font-weight-bolder">10</span>

                                    </div>
                                    <div class="d-grid text-center mx-5">
                                        <span class="text-sm opacity-8">Complete</span>
                                        <span class="badge  bg-gradient-success font-weight-bolder">10</span>

                                    </div>
                                    <div class="d-grid text-center">
                                        <span class="text-sm opacity-8">Pending</span>
                                        <span class="badge bg-gradient-warning font-weight-bolder">10</span>
                                    </div>
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
       document.getElementById('delete-btn').addEventListener('click', function(event) {
            // Prevent form from submitting immediately
            event.preventDefault();

            // Show SweetAlert confirmation
            Swal.fire({
                title: 'Are you sure you want to update this user?',
                text: "You can cancel the operation.",
                showDenyButton: true, // Show the "No" button
                confirmButtonText: 'Yes, remove it!', // Text for the confirm button
                denyButtonText: 'No, cancel!', // Text for the deny button
                customClass: {
                    actions: 'my-actions', // Custom class for button actions
                    cancelButton: 'order-1 right-gap', // Custom class for cancel button
                    confirmButton: 'order-2', // Custom class for confirm button
                    denyButton: 'order-3', // Custom class for deny button
                },
                width: '80%', // Use percentage for responsiveness
                maxWidth: '400px', // Optional: set a max width
                padding: '20px',
                heightAuto: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    // If the user clicks "Yes"
                    document.getElementById('delete-form').submit(); // Submit the form
                    Swal.fire('removed!', 'User information has been removed.',
                    'success'); // Success message
                } else if (result.isDenied) {
                    Swal.fire('user is not saved', '', 'info'); // Info message
                }
            });
        });
    </script>

@endsection
