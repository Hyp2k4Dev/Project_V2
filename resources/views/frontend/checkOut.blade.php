<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTH SNEAKER STORE</title>
    <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/fe/homepage.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="{{ asset('js/homepage.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/fe/bootstrap.min.css') }}">
    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
</head>

<body>
    <div class="header">
        <div class="header-left">
            <a href="{{ route('frontend.home') }}"><img src="{{ asset('images/logo-shop.png') }}" alt="Mô tả của hình ảnh"></a>
            <div class="option-header">
                <a href="/product">Product</a>
                <a href="#">About</a>
                <a href="/blog">Blog</a>
            </div>
        </div>

        <div class="header-right">
            <a href="#" class="btn-contact">Contact</a>
        </div>
    </div>

    <main>
        <div class="row">
            <div class="col-75">
                <div class="container">
                    <form id="orderForm" action="{{ route('frontend.checkOut') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-50">
                                <h3>Billing Address</h3>
                                <label for="name"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" color="black" viewBox="0 0 24 24">
                                        <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                            <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                                            <circle cx="12" cy="7" r="4" />
                                        </g>
                                    </svg> Full Name</label>
                                <input type="text" id="name" name="name" placeholder="Your name" required>
                                <label for="email"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" color="black" viewBox="0 0 24 24">
                                        <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="2">
                                            <rect width="18" height="14" x="3" y="5" stroke-dasharray="64" stroke-dashoffset="64" rx="1">
                                                <animate fill="freeze" attributeName="stroke-dashoffset" dur="0.6s" values="64;0" />
                                            </rect>
                                            <path stroke-dasharray="24" stroke-dashoffset="24" d="M3 6.5L12 12L21 6.5">
                                                <animate fill="freeze" attributeName="stroke-dashoffset" begin="0.6s" dur="0.4s" values="24;0" />
                                            </path>
                                        </g>
                                    </svg> Email</label>
                                <input type="text" id="email" name="email" placeholder="abc@example.com" required>
                                <label for="phone"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" color="black" viewBox="0 0 24 24">
                                        <path fill="none" stroke="currentColor" stroke-dasharray="64" stroke-dashoffset="64" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 3C8.5 3 10.5 7.5 10.5 8C10.5 9 9 10 8.5 11C8 12 9 13 10 14C10.3943 14.3943 12 16 13 15.5C14 15 15 13.5 16 13.5C16.5 13.5 21 15.5 21 16C21 18 19.5 19.5 18 20C16.5 20.5 15.5 20.5 13.5 20C11.5 19.5 10 19 7.5 16.5C5 14 4.5 12.5 4 10.5C3.5 8.5 3.5 7.5 4 6C4.5 4.5 6 3 8 3Z">
                                            <animate fill="freeze" attributeName="stroke-dashoffset" dur="0.6s" values="64;0" />
                                        </path>
                                    </svg> Phone Number</label>
                                <input type="text" id="adr" name="address" placeholder="Phone number">
                                <label for="email"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 48 48">
                                        <g fill="none">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M4 42h40" />
                                            <rect width="8" height="16" x="8" y="26" stroke="currentColor" stroke-linejoin="round" stroke-width="4" rx="2" />
                                            <path stroke="currentColor" stroke-linecap="square" stroke-linejoin="round" stroke-width="4" d="M12 34h1" />
                                            <rect width="24" height="38" x="16" y="4" stroke="currentColor" stroke-linejoin="round" stroke-width="4" rx="2" />
                                            <path fill="currentColor" d="M22 10h4v4h-4zm8 0h4v4h-4zm-8 7h4v4h-4zm8 0h4v4h-4zm0 7h4v4h-4zm0 7h4v4h-4z" />
                                        </g>
                                    </svg> Address</label>
                                <input type="text" id="adr" name="address" placeholder="Ha Noi City, etc">
                            </div>
                        </div>
                        <label>
                            <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
                        </label>
                        <br>
                        <input type="submit" value="Continue to checkout">
                    </form>
                </div>
            </div>

            <div class="col-25">
                <div class="container">
                    <h4>Cart
                        <span class="price" style="color:black">
                            <i class="fa fa-shopping-cart"></i>
                        </span>
                        <p></p>
                    </h4>
                </div>
            </div>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Lấy thông tin từ localStorage
            let checkOutItems = localStorage.getItem('checkOutItems');

            // Kiểm tra xem có thông tin trong localStorage không
            if (checkOutItems) {
                // Chuyển đổi JSON thành đối tượng JavaScript
                checkOutItems = JSON.parse(checkOutItems);

                // Hiển thị thông tin sản phẩm
                let productsContainer = document.querySelector('.col-25 .container p');
                checkOutItems.forEach(item => {
                    productsContainer.innerHTML += `${item.name}:  <br>${item.quantity} x ${item.price}<br>`;
                });
            } else {
                // Nếu không có thông tin trong localStorage, hiển thị thông báo rỗng
                document.querySelector('.col-25 .container p').innerText = 'No products in the cart';
            }
        });
    </script>

</body>

</html>