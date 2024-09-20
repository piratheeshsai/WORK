{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Recommender') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}
@extends('tamplate.master')

@section('content')

<div class="sidebar">
    <span class="menu-label">Menu</span>
    <ul class="navbar-links">
        <li class="active">
            <a href="#">
                <span class="nav-icon">
                    <i class="fa-solid fa-house"></i>
                </span>
                <span class="nav-text">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="{{ route('profile.edit') }}">
                <span class="nav-icon">
                    <i class="fa-solid fa-user-circle"></i>
                </span>
                <span> Profile</span>
            </a>
        </li>
        <li>
            <a href="#">
                <span class="nav-icon">
                    <i class="fa-solid fa-tasks"></i>
                </span>
                <span> Recommend Work Orders</span>
            </a>
        </li>
        <li>
            <a href="#">
                <span class="nav-icon">
                    <i class="fa-solid fa-tasks"></i>
                </span>
                <span class="nav-text"> View Work Orders</span>
            </a>
        </li>
        <li>
            <a href="#">
                <span class="nav-icon">
                    <i class="fa-solid fa-print"></i>
                </span>
                <span class="nav-text"> Print Work Order</span>
            </a>
        </li>
        <li>
            <a href="#">
                <span class="nav-icon">
                    <i class="fa-solid fa-file-text"></i>
                </span>
                <span class="nav-text"> Reports</span>
            </a>
        </li>
    </ul>
    <span class="line"></span>
</div>

<div class="contents">
    @yield('contents')
</div>

@endsection