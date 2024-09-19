{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="userID">User ID</label>
            <input id="userID" type="text" name="userID" required autofocus>
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}


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

