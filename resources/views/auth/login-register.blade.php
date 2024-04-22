<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTH Store: Sign in/up</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Archivo:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

        * {
            box-sizing: border-box;
        }

        body {
            background-image: url('images/output-onlinepngtools.png');
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            font-family: 'Archivo', sans-serif;
            height: 100vh;
            margin: -20px 0 50px;
        }

        h1 {
            font-weight: bold;
            margin: 0;
        }

        h2 {
            text-align: center;
        }

        p {
            font-size: 14px;
            font-weight: 100;
            line-height: 20px;
            letter-spacing: 0.5px;
            margin: 20px 0 30px;
        }

        span {
            font-size: 12px;
        }

        a {
            color: #333;
            font-size: 14px;
            text-decoration: none;
            margin: 15px 0;
        }

        button {
            border-radius: 20px;
            border: 1px solid #FF4B2B;
            background-color: #FF4B2B;
            color: #FFFFFF;
            font-size: 12px;
            font-weight: bold;
            padding: 12px 45px;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: transform 80ms ease-in;
        }

        button:active {
            transform: scale(0.95);
        }

        button:focus {
            outline: none;
        }

        button.ghost {
            background-color: transparent;
            border-color: #FFFFFF;
        }

        form {
            background-color: #FFFFFF;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 50px;
            height: 100%;
            text-align: center;
        }

        input {
            background-color: #eee;
            border: none;
            padding: 12px 15px;
            margin: 8px 0;
            width: 100%;
        }

        .container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25),
                0 10px 10px rgba(0, 0, 0, 0.22);
            position: relative;
            overflow: hidden;
            width: 768px;
            max-width: 100%;
            min-height: 480px;
        }

        .form-container {
            position: absolute;
            top: 0;
            height: 100%;
            transition: all 0.6s ease-in-out;
        }

        .sign-in-container {
            left: 0;
            width: 50%;
            z-index: 2;
        }

        .container.right-panel-active .sign-in-container {
            transform: translateX(100%);
        }

        .sign-up-container {
            left: 0;
            width: 50%;
            opacity: 0;
            z-index: 1;
        }

        .container.right-panel-active .sign-up-container {
            transform: translateX(100%);
            opacity: 1;
            z-index: 5;
            animation: show 0.6s;
        }

        @keyframes show {

            0%,
            49.99% {
                opacity: 0;
                z-index: 1;
            }

            50%,
            100% {
                opacity: 1;
                z-index: 5;
            }
        }

        .overlay-container {
            position: absolute;
            top: 0;
            left: 50%;
            width: 50%;
            height: 100%;
            overflow: hidden;
            transition: transform 0.6s ease-in-out;
            z-index: 100;
        }

        .container.right-panel-active .overlay-container {
            transform: translateX(-100%);
        }

        .overlay {
            background: #FF416C;
            background: -webkit-linear-gradient(to right, #FF4B2B, #FF416C);
            background: linear-gradient(to right, #FF4B2B, #FF416C);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: 0 0;
            color: #FFFFFF;
            position: relative;
            left: -100%;
            height: 100%;
            width: 200%;
            transform: translateX(0);
            transition: transform 0.6s ease-in-out;
        }

        .container.right-panel-active .overlay {
            transform: translateX(50%);
        }

        .overlay-panel {
            position: absolute;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 40px;
            text-align: center;
            top: 0;
            height: 100%;
            width: 50%;
            transform: translateX(0);
            transition: transform 0.6s ease-in-out;
        }

        .overlay-left {
            transform: translateX(-20%);
        }

        .container.right-panel-active .overlay-left {
            transform: translateX(0);
        }

        .overlay-right {
            right: 0;
            transform: translateX(0);
        }

        .container.right-panel-active .overlay-right {
            transform: translateX(20%);
        }

        .social-container {
            margin: 20px 0;
        }

        .social-container a {
            border: 1px solid #DDDDDD;
            border-radius: 50%;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            margin: 0 5px;
            height: 40px;
            width: 40px;
        }

        footer {
            background-color: #222;
            color: #fff;
            font-size: 14px;
            bottom: 0;
            position: fixed;
            left: 0;
            right: 0;
            text-align: center;
            z-index: 999;
        }

        footer p {
            margin: 10px 0;
        }

        footer i {
            color: red;
        }

        footer a {
            color: #3c97bf;
            text-decoration: none;
        }

        .error-message {
            display: none;
            /* Ẩn phần tử ban đầu */
            color: red;
            /* Các thuộc tính CSS khác tùy thuộc vào thiết kế của bạn */
        }
    </style>
</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            @if(session('success'))
            <script>
                alert("Your account has been created! Please login.");
            </script>
            @endif
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <h1>Create Account</h1>
                @if (session('error'))
                <div id="error-message" class="error-message">
                    {{ session('error') }}
                </div>
                @endif

                <input type="text" placeholder="Name" id="name" name="name" required>
                <input type="password" placeholder="Password" id="password" name="password" required>
                <input type="password" placeholder="Confirm Password" id="password_confirmation" name="password_confirmation" required>
                <button type="submit">Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            @if (session('error'))
            <script>
                window.onload = function() {
                    // Sử dụng hàm alert() của JavaScript để hiển thị thông báo
                    alert("{{ session('error') }}");
                };
            </script>

            <!-- Sử dụng mã CSS để thay đổi màu cho alert -->
            <style>
                /* Thay đổi màu nền của alert thành đỏ */
                .alert {
                    background-color: #f8d7da;
                    /* Màu nền đỏ */
                    border-color: #f5c6cb;
                    /* Màu viền đỏ */
                    color: #721c24;
                    /* Màu chữ đỏ */
                    padding: 8px 15px;
                    /* Khoảng cách padding */
                    margin-bottom: 15px;
                    /* Khoảng cách giữa các alert */
                    border-radius: 4px;
                    /* Đường cong viền */
                }
            </style>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <h1>Sign in</h1>
                <input type="name" placeholder="Username" name="name" required>
                <input type="password" placeholder="Password" name="password" required>
                <button type="submit">Sign In</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>If you have account, please login here</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <p>Join us and start journey with us</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <p>
            Created with <i class="fa fa-heart"></i> by
            <a target="_blank" href="#">HTH Store</a>
            "Slogan"
        </p>
    </footer>
</body>
<script>
    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const container = document.getElementById('container');
    const signUpForm = document.querySelector('.sign-up-container form');
    const signInForm = document.querySelector('.sign-in-container form');

    function containsSpecialCharacters(str) {
        const regex = /[^\w\s]/;
        return regex.test(str);
    }

    signUpForm.addEventListener('submit', function(event) {
        const nameInput = this.querySelector('#name');
        const passwordInput = this.querySelector('#password');
        const confirmPasswordInput = this.querySelector('#password_confirmation');

        if (containsSpecialCharacters(nameInput.value) || nameInput.value.includes(' ')) {
            alert("Tên không được chứa khoảng trắng hoặc ký tự đặc biệt.");
            event.preventDefault();
            return false;
        }

        if (containsSpecialCharacters(passwordInput.value) || passwordInput.value.includes(' ')) {
            alert("Mật khẩu không được chứa khoảng trắng hoặc ký tự đặc biệt.");
            event.preventDefault();
            return false;
        }

        if (passwordInput.value !== confirmPasswordInput.value) {
            alert("Mật khẩu xác nhận không khớp.");
            event.preventDefault();
            return false;
        }
    });

    signInForm.addEventListener('submit', async function(event) {
        const nameInput = this.querySelector('[type="name"]');
        const username = nameInput.value;

        if (containsSpecialCharacters(username) || username.includes(' ')) {
            alert("Tên không được chứa khoảng trắng hoặc ký tự đặc biệt.");
            event.preventDefault();
            return false;
        }

        try {
            const response = await fetch('/checkUserActiveStatus', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    username: username
                })
            });

            const data = await response.json();
            if (data.is_active === '0') {
                alert("Tài khoản của bạn không được hoạt động. Vui lòng liên hệ với admin.");
                event.preventDefault();
                return false;
            }
        } catch (error) {
            console.error('Error:', error);
            // Handle error if any
        }
    });

    signUpButton.addEventListener('click', () => {
        container.classList.add("right-panel-active");
    });

    signInButton.addEventListener('click', () => {
        container.classList.remove("right-panel-active");
    });
</script>


</html>