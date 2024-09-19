
@extends('layouts.master')

@section('content')

<div class="d-flex justify-content-center align-items-center" style="min-height: 70vh;">
    <div class="login-container bg-light p-4 rounded shadow">
        <h4 class="mb-4 Forgot-p">Forgot Password</h4>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4 verify-status" :status="session('status')"/>

        <form method="POST" action="{{ route('password.email') }}" id="verify-email-form">
            @csrf

            <!-- Email Address -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="fp__login_imput">
                        <input type="email" placeholder="Email" class="form-control" name="email" :value="{{ old('email') }}">
                    </div>
                </div>

                <div class="col-xl-12">
                    <div class="fp__login_imput">
                        <button type="submit" class="login_btn w-100 mt-3" id="verify-button">
                            Verify Mail
                        </button>
                    </div>
                </div>

                <p class="forgot-login mb-0 text-end">
                    <a href="{{ route('login') }}">Login</a>
                </p>
            </div>
        </form>
    </div>
</div>



@endsection
