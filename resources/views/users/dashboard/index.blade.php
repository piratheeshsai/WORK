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

                <a href="{{ route('user.profile.index') }}">

                <span class="nav-icon">
                    <i class="fa-solid fa-user-circle"></i>
                </span>
                <span> Profile</span>
            </a>
        </li>
        <li>
            <a href="{{ route('user.work.create') }}">
                <span class="nav-icon">
                    <i class="fa-solid fa fa-building"></i>
                </span>
                <span> Create Work Orders</span>
            </a>
        </li>
        <li>
            <a href="#">
                <span class="nav-icon">
                    <i class="fa-regular fa-rectangle-list"></i>
                </span>
                <span class="nav-text"> View Work Orders</span>
            </a>
        </li>
        <li>
            <a href="#">
                <span class="nav-icon">
                    <i class="fa-solid fa-forward"></i>
                </span>
                <span class="nav-text"> Forward Work Orders</span>
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

{{-- <div class="contents">
    <div class="panal-bar">
        <div class="row-1">
            <h1>Work Orders</h1>
        </div>
        <div class="row-2">
            <a href="#" class="active">OverView</a>
            <a href="#">Work Orders</a>
            <a href="#">Pending</a>
            <a href="#">Completed</a>
        </div>
    </div>
</div> --}}

@endsection
