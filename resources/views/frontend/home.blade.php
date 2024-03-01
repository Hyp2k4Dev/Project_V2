<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/fe/homepage.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <div class="header">
        <div class="header-left">
            <a href="#"><img src="{{ asset('images/logo-shop.png') }}" alt="Mô tả của hình ảnh"></a>
            <div class="option-header">
                <a href="#">Product</a>
                <a href="#">About</a>
                <a href="#">Blog</a>
            </div>
        </div>
        <a href="#" class="header-right">
            Contact
        </a>
    </div>
    <div class="banner">
        <div class="img-bander">
            <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEiNXKe3GTbcjdqvX9YlFOBE0tAB-l5MnoT_D7zyXqOmuzm3fX57Url44VlGJIUXr3YbEeWBBh95DBAOdbrwTdkzPZfqnA8M_ueN7uazMv4SCUhcf8entgJrIv_u-hsPGG_ZuVd8KKbI5Zr0oli-40C0BQm5sj7uN6kE_d7I-Cg-YWOO9Hrc0t6i7ktb/s1920/shoe%20banner%20by%20lincungstock.jpg" alt="">
            <div class="search-banner">
                <h4>Do you have your product yet?</h4>
                <p>More than 100 products are waiting for you</p>
                <form>
                    <div class="input-search">
                        <i class="bi bi-search" style="font-size: 20px;"></i>
                        <input type="text" placeholder="input name product ...">
                    </div>
                    <button type="submit">Search</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>