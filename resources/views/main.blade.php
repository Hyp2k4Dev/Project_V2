<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Website Title</title>
    <!-- CSS styles, links to external CSS files, etc. -->
</head>
<body>
    <header>
        <div class="logo">
            <img src="path_to_your_logo" alt="Your Logo">
        </div>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
        <div class="auth">
            @if (Auth::check())
                <!-- Hiển thị nút logout khi đã đăng nhập -->
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            @else
                <!-- Hiển thị nút login và nút register khi chưa đăng nhập -->
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @endif
        </div>
    </header>
    
    <main>
        <!-- Nội dung chính của trang -->
        @yield('content')
    </main>

    <footer>
        <!-- Footer content -->
    </footer>

    <!-- Script tags, links to external JS files, etc. -->
</body>
</html>
