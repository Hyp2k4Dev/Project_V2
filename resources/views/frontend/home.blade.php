<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="{{ asset('css/fe/homepage.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <div class="header">
        <div class="header-in">
            <div class="header-left">
                <div class="logo-shop">
                    <img src="{{ asset('images/logo-shop.png') }}" alt="">
                    <p>HTH</p>
                </div>
                <div class="tab-in-header">
                    <a href="#">Product Categories</a>
                    <a href="#">Brands</a>
                    <a href="#">Sale</a>
                    <a href="#">Blogs</a>
                </div>
            </div>
            <div class="header-right">
                <div style="position: relative;">
                    <i class="bi bi-cart3"></i>
                    <p class="number-icon-cart">10</p>
                </div>
                <div class="contact-header">
                    <p>Contact HTH</p>
                </div>
            </div>
        </div>
    </div>
    <div class="banner">
        <div class="img-banner">
            <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEiNXKe3GTbcjdqvX9YlFOBE0tAB-l5MnoT_D7zyXqOmuzm3fX57Url44VlGJIUXr3YbEeWBBh95DBAOdbrwTdkzPZfqnA8M_ueN7uazMv4SCUhcf8entgJrIv_u-hsPGG_ZuVd8KKbI5Zr0oli-40C0BQm5sj7uN6kE_d7I-Cg-YWOO9Hrc0t6i7ktb/s1920/shoe%20banner%20by%20lincungstock.jpg" alt="">
            <div class="sreach">
                <p>Product</p>
                <input type="text" placeholder="input product ...">
            </div>
        </div>
    </div>
</body>

</html>