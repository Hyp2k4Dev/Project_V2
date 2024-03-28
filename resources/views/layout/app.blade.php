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

        /* Thêm CSS để chuyển navbar sang bên phải */
        .navbar-nav {
            margin-left: auto;
        }
    </style>
</head>

<body>
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
                        <a class="nav-link{{ Request::is('admin/ordList') ? ' active' : '' }}" href="{{ route('admin.ordList') }}">Order List Management</a>
                    </li>
                    <li class="nav-item">
                        @auth
                        <span class="nav-link">{{ auth()->user()->name }} ({{auth()->user()->role}})
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-link text-white"><a href=""><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z" />
                                            <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
                                        </svg></a></button>
                            </form>
                        </span>
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