@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid py-4 ">
        <div class="row ">
            <div class="col-md-8 mx-auto ">
                <div class="card">

                        <div class="card-header">
                            <h3>Create New User</h3>
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


                            <form action="{{ route('admin.users.store') }}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ old('name') }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="userID">User ID</label>
                                    <input type="text" class="form-control" id="userID" name="userID"
                                        value="{{ old('userID') }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="role">Role</label>
                                    <select class="form-control" id="role" name="role" required>
                                        <option value="User" {{ old('role') == 'User' ? 'selected' : '' }}>User</option>
                                        <option value="Admin" {{ old('role') == 'Admin' ? 'selected' : '' }}>Admin</option>
                                        <option value="Civil" {{ old('role') == 'Civil' ? 'selected' : '' }}>Civil</option>
                                        <option value="Electrical" {{ old('role') == 'Electrical' ? 'selected' : '' }}>
                                            Electrical
                                        </option>
                                        <option value="Recommender" {{ old('role') == 'Recommender' ? 'selected' : '' }}>
                                            Recommender
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>

                                <div class="form-group">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input type="password" class="form-control" id="password_confirmation"
                                        name="password_confirmation" required>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-success">Create User</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
