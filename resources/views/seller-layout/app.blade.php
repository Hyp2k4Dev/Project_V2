<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTH Store</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Your custom CSS -->
    <link rel="stylesheet" href="/css/be/app.css">
    <style>
        /* Thêm CSS để căn phải */
        .navbar {
            justify-content: flex-end;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container"> <!-- Thêm lớp justify-content-end để căn phải -->
                <a href="{{ route('seller.dashboard') }}">
                    <img src="{{ asset('images/logo-shop.png') }}" alt="Logo" width="70px" height="70px">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav"> <!-- Không cần thêm lớp ml-auto -->

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.orderList') }}">Order List Management</a>
                        </li>
                        <li class="nav-item">
                            @auth
                            <span class="nav-link">{{ auth()->user()->name }} ({{auth()->user()->role}})
                                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-link text-white">Logout</button>
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

    <footer class="bg-dark text-light text-center py-3">
        <!-- Footer content -->
        &copy; 2024 HTH Store. All rights reserved.
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-2vtScCm1/UgVr7CYYfADhUeqo9uGVQF/SlGGKdZimNT0A8Qi/ERxSv/NepW9KEwH" crossorigin="anonymous"></script>
    <!-- Your custom JS scripts -->
</body>

</html>