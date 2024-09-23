@extends('admin.layouts.master')
@section('contents')
    <div class="container">
        <h1>Edit User</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.users.update', $user->userID) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="userID">User ID</label>
                <input type="text" class="form-control" id="userID" name="userID" value="{{ old('userID', $user->userID) }}" readonly>
            </div>

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
            </div>

            {{-- <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
            </div> --}}

            <div class="form-group">
                <label for="role">Role</label>
                <select class="form-control" id="role" name="role" required>
                    <option value="User" {{ $user->role == 'User' ? 'selected' : '' }}>User</option>
                    <option value="Admin" {{ $user->role == 'Admin' ? 'selected' : '' }}>Admin</option>
                    <option value="Engineer" {{ $user->role == 'Engineer' ? 'selected' : '' }}>Engineer</option>
                    <option value="Civil" {{ $user->role == 'Civil' ? 'selected' : '' }}>Civil</option>
                    <option value="Electrical" {{ $user->role == 'Electrical' ? 'selected' : '' }}>Electrical</option>
                </select>
            </div>

            <div class="form-group">
                <label for="password">Password (leave blank to keep current password)</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            </div>

            <button type="submit" class="btn btn-primary">Update User</button>
        </form>
    </div>
@endsection
