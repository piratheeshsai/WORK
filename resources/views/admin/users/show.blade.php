@extends('admin.layouts.master')

@section('content')
    <div class="container">

        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="d-flex align-items-center">
                                <h6 class="mb-0">User Details</h5>

                                    <!-- Push the buttons to the right -->
                                    <div class="ms-auto d-flex">
                                        <!-- Edit Button -->
                                        <a href="{{ route('admin.users.edit', $user->userID) }}"
                                            class="btn btn-warning btn-sm me-2">Edit</a>

                                        <!-- Delete Button -->
                                        <form action="{{ route('admin.users.destroy', $user->userID) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </div>
                            </div>
                        </div>


                        <div class="card">

                            <div class="card-header">
                                <h3>{{ $user->name }}</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-6">
                                        <p class="mb-3">
                                            <strong class="text-muted">EmployeeID:</strong>
                                            <span
                                                class="text-dark text-uppercase">{{ optional($user->userDetails)->EmployeeId ?? 'Not Updated' }}</span>
                                        </p>

                                    </div>
                                    <div class="col-md-6">
                                        <p class="mb-3">
                                            <strong class="text-muted">Email:</strong>
                                            <span
                                                class="text-dark">{{ optional($user->userDetails)->email ?? 'Not Updated' }}</span>
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="mb-3">
                                            <strong class="text-muted">Mobile:</strong>
                                            <span
                                                class="text-dark">{{ optional($user->userDetails)->PhoneNumber ?? 'Not Updated' }}</span>
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="mb-2">
                                            <strong class="text-muted">Section:</strong>
                                            <span
                                                class="text-dark">{{ optional($user->userDetails)->subsection ?? 'Not Updated' }}</span>
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="mb-3">
                                            <strong class="text-muted">User ID:</strong>
                                            <span class="text-dark">{{ $user->userID }}</span>
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="mb-3">
                                            <strong class="text-muted">Role:</strong>
                                            <span class="text-dark">{{ $user->role }}</span>
                                        </p>
                                    </div>

                                    <p><strong>Created At:</strong> {{ $user->created_at }}</p>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        @endsection
