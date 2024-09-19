 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="{{ asset('css/users.css') }}">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Admin Panel</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.users.index') }}">Manage Users</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <script src="{{ asset('js/users.js') }}"></script>
</body>
</html>


{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
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
                    <img src="logo/logo.png" alt="Logo">
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
                    <img src="logo/user.jpg" alt="User Profile">
                </div>
                <div class="logout">
                    <i class="fa-solid fa-right-from-bracket"></i>
                </div>
            </div>
        </div>
        <div class="sidebar">
            <span class="menu-label">Menu</span>
            <ul class="navbar-links">
                <li class="active">
                    <a href="#">
                        <span class="nav-icon">
                            <i class="fa-solid fa-house"></i>
                        </span>
                        <span class="nav-text"> Dashboard</span>
                     </a>
                </li>
                <li>
                    <a href="#">
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
            <div class="description">
                <div class="col-1">
                    <div class="boxes-row">
                        <div class="balance-box">
                            <div class="subject-row">
                                <div class="text">
                                    <h3>Total Work Orders</h3>
                                    <h1>40 <sub>(Nos)</sub></h1>
                                </div>
                                <div class="icon">
                                    <i class="fa-solid fa-arrow-up"></i>
                                </div>
                            </div>
                            <div class="progess-row">
                                <div class="subject">Progess</div>
                                <div class="Progress-bar">
                                    <div class="progess-line" vaule="91%" style="max-width: 91%;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="balance-box">
                            <div class="subject-row">
                                <div class="text">
                                    <h3>Pending</h3>
                                    <h1>20 <sub>(Nos)</sub></h1>
                                </div>
                                <div class="icon">
                                    <i class="fa-solid fa-arrow-down"></i>
                                </div>
                            </div>
                            <div class="progess-row">
                                <div class="subject">Progess</div>
                                <div class="Progress-bar">
                                    <div class="progess-line" vaule="73%" style="max-width: 73%;"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="chart">
                        <div class="chart-header">
                            <h2>Progress Analysis</h2>
                            <input type="month" class="date" value="2023-12">
                        </div>
                        <div class="chart-contents">
                            <section class="chart-grid">
                                <div class="grid-line" value="100%"></div>
                                <div class="grid-line" value="80%"></div>
                                <div class="grid-line" value="60%"></div>
                                <div class="grid-line" value="40%"></div>
                                <div class="grid-line" value="20%"></div>
                                <div class="grid-line" value="0%"></div>
                            </section>
                            <section class="chart-value-wrapper">
                                <div class="chart-value" style="max-height: 62%;"></div>
                                <div class="chart-value" style="max-height: 92%;"></div>
                                <div class="chart-value" style="max-height: 76%;"></div>
                                <div class="chart-value" style="max-height: 82%;"></div>
                                <div class="chart-value" style="max-height: 51%;"></div>
                                <div class="chart-value" style="max-height: 40%;"></div>
                            </section>
                            <section class="chart-labels">
                                <div>Jul</div>
                                <div>Aug</div>
                                <div>Sept</div>
                                <div>Oct</div>
                                <div>Nov</div>
                                <div>Dec</div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/home.js') }}"></script>
</body>
</html> --}}
