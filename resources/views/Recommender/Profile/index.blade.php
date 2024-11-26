@extends('Recommender.component.master')

@section('content')
    <div class="contents">
        <div class="container mt-5">
            <form action="{{ route('recommender.profile.update') }}" method="POST">
                @csrf

            @method('PUT')

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row gutters">
                    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="row gutters">

                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <h6 class="mb-2 text-primary">Personal Details</h6>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="Name">Name</label>
                                            <input type="text" class="form-control" id="Name" name="name"
                                                value="{{ old('name', $user->name) }}">
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="text">User ID</label>
                                            <input type="text" class="form-control" id="userID" name="userID"
                                                value="{{ old('userID', $user->userID) }}">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                value="{{ old('email', optional($userDetails)->email) }}"
                                                placeholder="{{ optional($userDetails)->email ? '' : 'Enter your email' }}">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="phone">Phone</label>
                                            <input type="text" class="form-control" id="phone" name="PhoneNumber"
                                                value="{{ old('PhoneNumber', optional($userDetails)->PhoneNumber ? '+94' . optional($userDetails)->PhoneNumber : '+1 ') }}"
                                                placeholder="{{ optional($userDetails)->PhoneNumber ? '' : 'Enter your PhoneNumber' }}">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="website">Employee Number</label>
                                            <input type="text" class="form-control" id="Employee-Number"
                                                name="EmployeeId"
                                                value="{{ old('EmployeeId', optional($userDetails)->EmployeeId) }}"
                                                placeholder="{{ optional($userDetails)->EmployeeId ? '' : 'Enter your Employee Number' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row gutters">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>
    </div>
@endsection
<script src="{{ asset('js/home.js') }}"></script>
