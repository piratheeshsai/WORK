@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h1>Create New User</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
            </div>

            {{-- <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
            </div> --}}

            <div class="form-group">
                <label for="userID">User ID</label>
                <input type="text" class="form-control" id="userID" name="userID" value="{{ old('userID') }}" required>
            </div>


            <div class="form-group">
                <label for="role">Role</label>
                <select class="form-control" id="role" name="role" required>
                    <option value="User" {{ old('role') == 'User' ? 'selected' : '' }}>User</option>
                    <option value="Admin" {{ old('role') == 'Admin' ? 'selected' : '' }}>Admin</option>
                    <option value="Engineer" {{ old('role') == 'Engineer' ? 'selected' : '' }}>Engineer</option>
                    <option value="Civil" {{ old('role') == 'Civil' ? 'selected' : '' }}>Civil</option>
                    <option value="Electrical" {{ old('role') == 'Electrical' ? 'selected' : '' }}>Electrical</option>
                </select>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
            </div>

            <button type="submit" class="btn btn-success">Create User</button>
        </form>
    </div>
@endsection
