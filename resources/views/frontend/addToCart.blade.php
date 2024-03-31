<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTH SNEAKER STORE</title>
    <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/fe/homepage.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fe/cartpage.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="{{ asset('js/homepage.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/fe/bootstrap.min.css') }}">
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
            <form id="addToCartForm" action="{{ route('frontend.addToCart') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <!-- <a href="{{route('frontend.addToCart')}}" class="add-cart" onclick="addToCart(event);">
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
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h2>Shopping Cart</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered m-0">
                            <thead>
                                <tr>
                                    <th class="text-center py-3 px-4" style="min-width: 400px;">Product Name &amp; Details</th>
                                    <th class="text-right py-3 px-4" style="width: 100px;">Price</th>
                                    <th class="text-center py-3 px-4" style="width: 120px;">Quantity</th>
                                    <th class="text-right py-3 px-4" style="width: 100px;">Total</th>
                                    <th class="text-center align-middle py-3 px-0" style="width: 40px;"><a href="#" class="shop-tooltip float-none text-light" title="" data-original-title="Clear cart"><i class="ino ion-md-trash"></i></a></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product as $product)
                                <tr>
                                    <td class="p-4">
                                        <div class="media align-items-center" style="display: flex;">
                                            @if ($product)
                                            <img src="{{ asset($product->Image) }}" width="200px" alt="imagePreview">
                                            <div class="media-body" style="padding-left: 20px;">
                                                <h5>{{$product->Name_sneaker}}</h5>
                                                <small>
                                                    <p class="text-muted">Color: {{ $product->Color }}</p>
                                                    <p>Brand: {{ $product->Brand }}</p>
                                                    <h2>Sizes</h2>
                                                    <ul>
                                                        @forelse($product->sizes as $size)
                                                        <li>{{ $size->size_name }}</li>
                                                        <div class="m-bot15"> <strong>Price : </strong> <span class="pro-price"> {{number_format($product->Price, 0,',','.')}}(VNĐ)</span></div>
                                                        @empty
                                                        <li>No sizes available</li>
                                                        @endforelse
                                                    </ul>
                                                </small>
                                            </div>
                                            @else
                                            <p>No product found for this order detail.</p>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="text-right font-weight-semibold align-middle p-4">{{ number_format($product->subtotal, 0, ',','.') }}VNĐ</td>
                                    <td class="align-middle p-4"><input id="quantity" type="number" value="{{$product->quantity }}" class="form-control quantity-input" min="0"></td>

                                    <td class="text-center align-middle px-0">
                                        <a href="#" class="shop-tooltip close float-none" title="" data-original-title="Remove" onclick="confirmDelete()">
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" color="black" viewBox="0 0 512 512">
                                                <path fill="currentColor" d="M42.7 469.3c0 23.5 19.1 42.7 42.7 42.7h341.3c23.5 0 42.7-19.1 42.7-42.7V192H42.7v277.3zm320-213.3h42.7v192h-42.7V256zm-128 0h42.7v192h-42.7V256zm-128 0h42.7v192h-42.7V256zm384-170.7h-128V42.7C362.7 19.1 343.5 0 320 0H192c-23.5 0-42.7 19.1-42.7 42.7v42.7h-128C9.5 85.3 0 94.9 0 106.7V128c0 11.8 9.5 21.3 21.3 21.3h469.3c11.8 0 21.3-9.5 21.3-21.3v-21.3c.1-11.8-9.4-21.4-21.2-21.4zm-170.7 0H192V42.7h128v42.6z" />
                                            </svg>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        </a>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex flex-wrap justify-content-between align-items-center pb-4">
                        <div class="d-flex">
                            <div class="text-right mt-4" style="justify-content: center;">
                                <label class="text-muted font-weight-normal m-0">Total price</label>
                                <p>
                                    @php
                                    $totalPrice = 0; // Khởi tạo biến tổng số tiền
                                    @endphp
                                    @foreach ($orderDetails as $orderDetail)
                                    @php
                                    // Tính tổng số tiền của từng sản phẩm và cộng vào tổng số tiền
                                    $totalPrice += $orderDetail->subtotal * $orderDetail->quantity; // Nhân giá tiền của sản phẩm với số lượng của sản phẩm
                                    @endphp
                                    @endforeach
                                <p>
                                    {{ number_format($totalPrice, 0, ',', '.') }} VNĐ <!-- Hiển thị tổng số tiền -->
                                </p>
                                </p>
                            </div>
                        </div>
                    </div>

                    <form action="{{ route('frontend.checkOut') }}" method="POST">
                        @csrf
                        <button type="submit">
                            <svg style="width:24px;height:24px " viewBox="0 0 24 24" id="cart">
                                <path fill="#000000" d="M17,18A2,2 0 0,1 19,20A2,2 0 0,1 17,22C15.89,22 15,21.1 15,20C15,18.89 15.89,18 17,18M1,2H4.27L5.21,4H20A1,1 0 0,1 21,5C21,5.17 20.95,5.34 20.88,5.5L17.3,11.97C16.96,12.58 16.3,13 15.55,13H8.1L7.2,14.63L7.17,14.75A0.25,0.25 0 0,0 7.42,15H19V17H7C5.89,17 5,16.1 5,15C5,14.65 5.09,14.32 5.24,14.04L6.6,11.59L3,4H1V2M7,18A2,2 0 0,1 9,20A2,2 0 0,1 7,22C5.89,22 5,21.1 5,20C5,18.89 5.89,18 7,18M16,11L18.78,6H6.14L8.5,11H16Z" />
                            </svg>
                            Check Out
                            <svg id="check" style="width:24px;height:24px" viewBox="0 0 24 24">
                                <path stroke-width="2" fill="none" stroke="#ffffff" d="M 3,12 l 6,6 l 12, -12" />
                            </svg>
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </main>
    <script>
        // Hàm để hiển thị cảnh báo khi bấm vào nút xoá
        function confirmDelete() {
            // Sử dụng hàm alert để hiển thị cảnh báo
            if (confirm("Bạn có chắc chắn muốn xoá không?")) {
                // Nếu người dùng chấp nhận, thực hiện hành động xoá
                // Đây là nơi bạn có thể thêm mã để thực hiện hành động xoá
                alert("Đã xoá!"); // Đây là chỉ là cảnh báo tạm thời, bạn có thể thay thế bằng mã xoá thực tế
            } else {
                // Nếu người dùng không chấp nhận, không thực hiện hành động xoá
                // Bạn có thể không cần thêm bất kỳ mã nào ở đây
            }
        }
        const btn = document.querySelector('button');

        btn.addEventListener('click', () => {
            document.documentElement.classList.toggle('checked-out');
        });
    </script>
</body>

</html>