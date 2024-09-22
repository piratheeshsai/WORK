@extends('admin.users.master')

@section('contents')
    <div class="container">
        <h1>User Details</h1>

        <div class="card">
            <div class="card-header">
                <h3>{{ $user->name }}</h3>
            </div>
            <div class="card-body">
                {{-- <p><strong>Email:</strong> {{ $user->email }}</p> --}}
                <p><strong>User ID:</strong> {{ $user->userID }}</p>
                <p><strong>Role:</strong> {{ $user->role }}</p>
                <p><strong>Created At:</strong> {{ $user->created_at }}</p>
                <p><strong>Updated At:</strong> {{ $user->updated_at }}</p>

                <a href="{{ route('admin.users.edit', $user->userID) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('admin.users.destroy', $user->userID) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Back to List</a>
            </div>
        </div>
    </div>
@endsection
