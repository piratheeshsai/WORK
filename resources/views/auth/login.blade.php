

@extends('layouts.master')

@section('content')
    <!-- Center container for login form -->
    <div class="d-flex justify-content-center align-items-center" style="min-height: 70vh;">
        <div class="login-container bg-light p-4 rounded shadow">
            <h2 class="mb-4 login-p">Login</h2>
            <form action="{{ route('login') }}" method="POST">
                @csrf

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif



                <div class="mb-3">
                    <input type="text" name="userID" id="userID" class="form-control" placeholder="Username" value="{{ old('userID', session('user_id')) }}" required autofocus>
                </div>
                <div class="mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>

                <div class="fp__login_input fp__login_check_area d-flex justify-content-between align-items-center">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Remember Me
                        </label>
                    </div>
                    <p class="forgot mb-0"><a href="{{ route('password.request') }}">Forgot Password</a></p>
                </div>

                <button type="submit" class="login_btn w-100 mt-3">Login</button>
            </form>
        </div>
    </div>
@endsection

