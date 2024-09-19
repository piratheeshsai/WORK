@extends('layouts.master')

@section('content')

<div class="d-flex justify-content-center align-items-center" style="min-height: 70vh;">
    <div class="login-container bg-light p-4 rounded shadow">
        <h2 class="mb-4 login-p">Reset Password</h2>
        <form method="POST" action="{{ route('password.store') }}" id="verify-email-form">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="row">
                <div class="col-xl-12">
                    <div class="fp__login_imput mb-3">
                        <input type="email" placeholder="Email" class="form-control" name="email"
                            value="{{ old('email', $request->email) }}">
                    </div>
                </div>

                <div class="col-xl-12">
                    <div class="fp__login_imput mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password">
                    </div>
                </div>

                <div class="col-xl-12">
                    <div class="fp__login_imput">
                        <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation">
                    </div>
                </div>

                <div class="col-xl-12">
                    <div class="fp__login_imput">
                        <button type="submit" class="login_btn w-100 mt-3">Reset Password</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
