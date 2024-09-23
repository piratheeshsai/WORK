

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
                <div class="notification">
                    <i class="fa-solid fa-bell"></i>
                </div>

                <div class="profile">
                    <a href="{{ route('user.profile.index') }}">
                        <span>{{ Auth::user()->name }}</span>
                    </a>
                </div>
                <div class="sidebar">
                    <span class="menu-label">Menu</span>
                    <ul class="navbar-links">
                        <li class="active">
                            <a href="{{ route('user.dashboard') }}">
                                <span class="nav-icon">
                                    <i class="fa-solid fa-house"></i>
                                </span>
                                <span class="nav-text">Home</span>
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


        <div class="contents">
            @yield('content')
        </div>

    </div>

    <footer class="footer text-center py-3">
        <p>&copy; 2024 SEUSL. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/home.js') }}"></script>
</body>
</html>


{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

    <!-- Navbar (Hamburger Menu for small screens) -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" id="menu-toggle">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand ms-2" href="#">Dashboard</a>
        </div>
    </nav>

    <!-- Sidebar and Content Wrapper -->
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-dark border-end" id="sidebar-wrapper">
            <div class="sidebar-heading text-white py-4 text-center">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" class="logo mb-2">
                <h4>Dashboard</h4>
            </div>
            <div class="list-group list-group-flush">
                @yield('sidebar') <!-- This is where the content from child views will be injected -->
            </div>

        </div>

        <!-- Page Content -->
        <div class="container">
            @yield('content') <!-- This is where the content from child views will be injected -->
        </div>

    <!-- Footer -->
    <footer class="footer text-center py-3">
        <p>&copy; 2024 Your Company. All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html> --}}


{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Dashboard</title>
    <!-- Bootstrap CSS -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.10.3/dist/cdn.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <script src="{{ asset('js/home.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('js/users.js') }}"></script>
</head>
<body>

    <!-- Navbar (Hamburger Menu for small screens) -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">

            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" class="logo">
            </a>
            <button class="navbar-toggler" type="button" id="menu-toggle">
                <span class="navbar-toggler-icon"></span>
            </button>





            <!-- Settings Dropdown for Large Screens -->
            <div class="d-none d-lg-block ms-auto">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="btn btn-secondary">
                            <div>{{ Auth::user()->name }}</div>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </nav>

    <!-- Sidebar and Content Wrapper -->
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-dark border-end" id="sidebar-wrapper">
            <div class="sidebar-heading text-white py-4 text-center">
                <img src="logo.png" alt="Logo" class="logo mb-2">
                <h4>Dashboard</h4>
            </div>
            <div class="list-group list-group-flush">
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white">Dashboard</a>
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white">Work Orders</a>
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white">Users</a>
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white">Settings</a>
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white">Logout</a>
            </div>
        </div>

        <!-- Page Content -->
        <div id="page-content-wrapper" class="p-4 flex-grow-1">
            <h1>Welcome to Your Dashboard</h1>
            <p>This is a simple responsive dashboard layout with a left sidebar menu.</p>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer text-center py-3">
        <p>&copy; 2024 Your Company. All rights reserved.</p>
    </footer>


    <script>
        document.getElementById("menu-toggle").addEventListener("click", function() {
            document.getElementById("wrapper").classList.toggle("sidebar-open");
        });
    </script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html> --}}
