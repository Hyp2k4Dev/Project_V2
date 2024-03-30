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
    <!-- @if(isset($array['phone']))
    {{-- Truy cập dữ liệu --}}
    {{ $array['phone'] }}
    @else
    {{-- Xử lý khi key 'phone' không tồn tại --}}
    <p>Không có số điện thoại được cung cấp.</p>
    @endif -->
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

            <!-- <form id="addToCartForm" action="{{ route('frontend.addToCart') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <a href="#" class="add-cart" onclick="addToCart(event);">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 56 56">
                    <path fill="currentColor" d="M20.008 39.649H47.36c.913 0 1.71-.75 1.71-1.758s-.797-1.758-1.71-1.758H20.406c-1.336 0-2.156-.938-2.367-2.367l-.375-2.461h29.742c3.422 0 5.18-2.11 5.672-5.461l1.875-12.399a7.2 7.2 0 0 0 .094-.89c0-1.125-.844-1.899-2.133-1.899H14.641l-.446-2.976c-.234-1.805-.89-2.72-3.28-2.72H2.687c-.937 0-1.734.822-1.734 1.76c0 .96.797 1.781 1.735 1.781h7.921l3.75 25.734c.493 3.328 2.25 5.414 5.649 5.414m31.054-25.454L49.4 25.422c-.188 1.453-.961 2.344-2.344 2.344l-29.906.023l-1.993-13.594ZM21.86 51.04a3.766 3.766 0 0 0 3.797-3.797a3.781 3.781 0 0 0-3.797-3.797c-2.132 0-3.82 1.688-3.82 3.797c0 2.133 1.688 3.797 3.82 3.797m21.914 0c2.133 0 3.82-1.664 3.82-3.797c0-2.11-1.687-3.797-3.82-3.797c-2.109 0-3.82 1.688-3.82 3.797c0 2.133 1.711 3.797 3.82 3.797" />
                </svg>
                <span id="cartCounter" class="cart-counter">0</span>
            </a> -->

            <a href="#" class="btn-contact">
                Contact
            </a>
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
                                <form id="orderForm" action="/order-submit" method="post">
                                    @csrf
                                    <label for="name"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" color="black" viewBox="0 0 24 24">
                                            <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                                <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                                                <circle cx="12" cy="7" r="4" />
                                            </g>
                                        </svg></a> Full Name</label>
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
                                        </svg></a> Email</label>
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
                    </h4>
                    @foreach($orderDetails as $orderDetail)
                    @php
                    $product = $products->firstWhere('id', $orderDetail->product_id);
                    @endphp
                    @if ($product)
                    <div class="media-body" style="padding-left: 20px; display:flex">
                        <p>{{$product->Name_sneaker}}</p>
                        <small>
                            <p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ number_format($orderDetail->subtotal, 0,',','.') }} VNĐ</p>
                        </small>
                    </div>
                    @else
                    <p>No product found for this order detail.</p>
                    @endif
                    @endforeach
                    <p>Total <span class="price" style="color:black"><b>{{ number_format($orderDetail->subtotal * $orderDetail->quantity, 0, ',','.') }}VNĐ</b></span></p>
                </div>
            </div>
        </div>
    </main>
    <script>
        function addToCart(event) {
            event.preventDefault(); // Ngăn chặn hành động mặc định của nút

            let cartCounter = document.getElementById('cartCounter');
            let count = parseInt(cartCounter.innerText);

            count++;
            cartCounter.innerText = count;

            document.getElementById('addToCartForm').submit();
        }
    </script>

</body>