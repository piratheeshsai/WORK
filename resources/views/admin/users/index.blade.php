@extends('admin.users.master')

@section('contents')
    <div class="container">
        <h1>Users</h1>

        <div class="mt-6 create align-right">
            <!-- Create User Button -->
            <a href="{{ route('admin.users.create') }}" class="custom-button">
                Create User
            </a>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>User ID</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="clickable-row" data-href="{{ route('admin.users.show', $user->id) }}">
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>{{ $user->userID }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
         <!-- Display pagination links -->
         <div class="d-flex justify-content-center">
            {{ $users->links() }}
        </div>
    </div>


@endsection
