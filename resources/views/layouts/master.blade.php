<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WOMS - @yield('title', 'Login')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('js/users.js') }}"></script>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" class="logo">
            </a>
            <h5 class="ms-4 custom-title">Work Order <span>Management System</span></h5>
        </div>



    </nav>

    <!-- Main Content Area -->
    <div class="container">
        @yield('content') <!-- This is where the content from child views will be injected -->
    </div>

    <!-- Footer -->
    <footer class="footer text-center py-3">
        <p>&copy; 2024 SEUSL. All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
