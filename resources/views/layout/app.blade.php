<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTH Store</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/all.css'>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/fontawesome.css'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Your custom CSS -->
    <link rel="stylesheet" href="/css/be/app.css">
    <style>
        .navbar-collapse {
            font-size: 16px;
        }

        .nav-link.active {
            color: red;
            /* Màu kí hiệu của trang hiện tại */
        }
    </style>
</head>

<body>
    <header style="position: fixed; width: 100%; z-index: 1000;">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a href="{{ route('admin.dashboard') }}">
                    <img src="{{ asset('images/logo-shop.png') }}" alt="Logo" width="70px" height="70px">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav"> <!-- Không cần thêm lớp ml-auto -->
                        <li class="nav-item">
                            <a class="nav-link{{ Request::is('admin/dashboard') ? ' active' : '' }}" href="{{ route('admin.dashboard') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link{{ Request::is('admin/userList') ? ' active' : '' }}" href="{{ route('admin.userList') }}">Account Management</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link{{ Request::is('admin/order-list') ? ' active' : '' }}" href="{{ route('admin.ordList') }}">Order List Management</a>
                        </li>
                        <li class="nav-item">
                            @auth
                            <span class="nav-link">{{ auth()->user()->name }} ({{auth()->user()->role}})</span>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-link">Logout</button>
                            </form>
                            @else
                            <a href="{{ route('login') }}" class="nav-link">Login</a>
                            @endauth
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <!-- Content -->
        @yield('content')
    </main>

    <!-- <footer class="bg-dark text-light text-center py-3">
        &copy; 2024 HTH Store. All rights reserved.
    </footer> -->

    <!-- Bootstrap JS -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-2vtScCm1/UgVr7CYYfADhUeqo9uGVQF/SlGGKdZimNT0A8Qi/ERxSv/NepW9KEwH" crossorigin="anonymous"></script> -->
    <!-- Your custom JS scripts -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Lặp qua tất cả các liên kết và kiểm tra xem URL có phù hợp không
            var currentUrl = window.location.href;
            var links = document.querySelectorAll('.nav-link');
            links.forEach(function(link) {
                if (link.getAttribute('href') === currentUrl) {
                    link.classList.add('active'); // Thêm lớp active nếu URL phù hợp
                }
            });
        });
    </script>
</body>

</html>