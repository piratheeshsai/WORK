@extends('admin.layouts.master')
@section('content')

    <div class="container-fluid py-4 ">
        <div class="row ">
            <div class="col-md-8 mx-auto ">
                <div class="card">

                    <div class="card-header">
                        <h3>Edit User Details</h3>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-body">
                        <form action="{{ route('admin.users.update', $user->userID) }}" method="POST" id="update-form">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="userID">User ID</label>
                                <input type="text" class="form-control" id="userID" name="userID"
                                    value="{{ old('userID', $user->userID) }}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name', $user->name) }}" required>
                            </div>


                            <div class="form-group">
                                <label for="role">Role</label>
                                <select class="form-control" id="role" name="role" required>
                                    <option value="User" {{ $user->role == 'User' ? 'selected' : '' }}>User</option>
                                    <option value="Admin" {{ $user->role == 'Admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="Civil" {{ $user->role == 'Civil' ? 'selected' : '' }}>Civil</option>
                                    <option value="Electrical" {{ $user->role == 'Electrical' ? 'selected' : '' }}>
                                        Electrical</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="password">Password (leave blank to keep current password)</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" class="form-control" id="password_confirmation"
                                    name="password_confirmation">
                            </div>

                            <button type="submit" class="btn btn-primary" id="update-btn">Update User</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('update-btn').addEventListener('click', function(event) {
            // Prevent form from submitting immediately
            event.preventDefault();

            // Show SweetAlert confirmation
            Swal.fire({
                title: 'Are you sure you want to update this user?',
                text: "You can cancel the operation.",
                showDenyButton: true, // Show the "No" button
                confirmButtonText: 'Yes, update it!', // Text for the confirm button
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
                    document.getElementById('update-form').submit(); // Submit the form
                    Swal.fire('Updated!', 'User information has been updated.',
                    'success'); // Success message
                } else if (result.isDenied) {
                    Swal.fire('Changes are not saved', '', 'info'); // Info message
                }
            });
        });
    </script>
@endsection
