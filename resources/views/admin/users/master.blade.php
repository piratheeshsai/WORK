


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/users.css') }}">
     <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>

<body>
    <div class="page-wrapper">
        <div class="top-bar">
            <div class="top-bar-left">
                <div class="hamburger-btn">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <div class="logo">
                    <img src="{{ asset('img/logo.png') }}" alt="Logo">
                </div>
            </div>
            <div class="search-bar">
                <input type="text" class="input-box" placeholder="Search...">
                <span class="Search-btn">
                    <i class="fa-solid fa-search"></i>
                </span>
            </div>
            <div class="top-bar-right">
                <div class="mode-switch">
                    <i class="fa-solid fa-moon"></i>
                </div>
                <div class="notification">
                    <i class="fa-solid fa-bell"></i>
                </div>
                <div class="profile">
                    <span>{{ Auth::user()->name }}</span>
                </div>
                <!-- Logout Form -->
                <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
                    @csrf
                </form>

                <!-- Logout Button -->
                <div class="logout" onclick="document.getElementById('logout-form').submit();">
                    <i class="fa-solid fa-right-from-bracket"></i>
                </div>

            </div>
        </div>
        <div class="sidebar">
            <span class="menu-label">Menu</span>
            <ul class="navbar-links">
                <li class="active">
                    <a href="{{ route('admin.dashboard') }}">
                        <span class="nav-icon">
                            <i class="fa-solid fa-house"></i>
                        </span>
                        <span class="nav-text"> Dashboard</span>
                    </a>
                </li>
                <li>

                    <a href="{{ route('admin.users.index') }}" target="content-frame">
                        <span class="nav-icon">
                            <i class="fa-solid fa-users"></i>
                        </span>
                        <span> Users</span>
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


    </div>



    </div>
    <script src="{{ asset('js/home.js') }}"></script>
    <script src="{{ asset('js/users.js') }}"></script>
</body>

</html>
