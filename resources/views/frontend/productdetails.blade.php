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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />

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

            <form id="addToCartForm" action="{{ route('frontend.addToCart') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <a href="#" class="add-cart" onclick="event.preventDefault(); document.getElementById('addToCartForm').submit();">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 56 56">
                    <path fill="currentColor" d="M20.008 39.649H47.36c.913 0 1.71-.75 1.71-1.758s-.797-1.758-1.71-1.758H20.406c-1.336 0-2.156-.938-2.367-2.367l-.375-2.461h29.742c3.422 0 5.18-2.11 5.672-5.461l1.875-12.399a7.2 7.2 0 0 0 .094-.89c0-1.125-.844-1.899-2.133-1.899H14.641l-.446-2.976c-.234-1.805-.89-2.72-3.28-2.72H2.687c-.937 0-1.734.822-1.734 1.76c0 .96.797 1.781 1.735 1.781h7.921l3.75 25.734c.493 3.328 2.25 5.414 5.649 5.414m31.054-25.454L49.4 25.422c-.188 1.453-.961 2.344-2.344 2.344l-29.906.023l-1.993-13.594ZM21.86 51.04a3.766 3.766 0 0 0 3.797-3.797a3.781 3.781 0 0 0-3.797-3.797c-2.132 0-3.82 1.688-3.82 3.797c0 2.133 1.688 3.797 3.82 3.797m21.914 0c2.133 0 3.82-1.664 3.82-3.797c0-2.11-1.687-3.797-3.82-3.797c-2.109 0-3.82 1.688-3.82 3.797c0 2.133 1.711 3.797 3.82 3.797" />
                </svg>
                <span id="cartCounter" class="cart-counter">0</span>
            </a>
            <a href="#" class="btn-contact">
                Contact
            </a>
        </div>
    </div>
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <form action="{{ route('frontend.addToCart') }}" method="POST"></form>
    @if(isset($productDetails))

    <div class="container bootdey">
        <div class="col-md-12">
            <section class="panel">
                <div class="panel-body">
                    <div class="col-md-6">
                        <div class="pro-img-details">
                            <img src="{{$productDetails->Image}}" alt="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h4 class="pro-d-title">
                            {{ $productDetails->Name_sneaker }}
                        </h4>
                        <p>
                            {{$productDetails->Description}}
                        </p>
                        <div class="product_meta">
                            <span class="posted_in"> <strong>{{$productDetails->Brand}}</strong> </span> <br>
                            <span class="tagged_as"><strong>{{$productDetails->Origin}}</strong> </span>
                            <span class="color"><strong>{{$productDetails->Color}}</strong> </span>
                            <h2>Sizes</h2>
                            <select id="sizeSelect">
                                @forelse($productDetails->sizes as $size)
                                <option value="{{ $size->size_name }}">{{ $size->size_name }}</option>
                                @empty
                                <option disabled>No sizes available</option>
                                @endforelse
                            </select>
                            <input class="form-control quantity-input" type="number" value="${item.quantity}" min="1">
                            <div class="m-bot15">
                                <strong>Price:</strong>
                                <span class="pro-price">{{ number_format($productDetails->Price) }}(VNĐ)</span>
                            </div>

                        </div>
                        <a class="btn btn-success text-white" onclick="addToCart(event);" href="{{ route('addToCart', ['id' => $productDetails->id]) }}">Add to Cart</a>

                        <p>Product not found!</p>
                        @endif
</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const viewDetailsButtons = document.querySelectorAll('.view-details');


        // Khởi tạo mảng chứa các sản phẩm trong giỏ hàng từ localStorage
        let cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
        // Hiển thị số lượng sản phẩm trong giỏ hàng
        let cartCounter = document.getElementById('cartCounter');
        cartCounter.innerText = cartItems.length;

        function addToCart(event) {
            event.preventDefault(); // Ngăn chặn hành động mặc định của nút
            // Lấy thông tin sản phẩm từ DOM
            const productName = document.querySelector('.pro-d-title').innerText;
            const productPriceText = document.querySelector('.pro-price').innerText;
            const productPrice = parseFloat(productPriceText.replace(/[^\d.]/g, '')); // Chuyển đổi giá thành số
            const selectedSize = document.getElementById('sizeSelect').value;
            const productBrand = document.querySelector('.product_meta .posted_in').innerText;
            const productOrigin = document.querySelector('.product_meta .tagged_as').innerText;
            const productColor = document.querySelector('.color').innerText;
            const productImage = document.querySelector('.pro-img-details img').getAttribute('src'); // Lấy đường dẫn hình ảnh sản phẩm
            const productQuantity = parseInt(document.querySelector('.quantity-input').value); // Lấy giá trị quantity từ input
            // Tạo một đối tượng mới đại diện cho sản phẩm được thêm vào giỏ hàng
            const newItem = {
                name: productName,
                price: productPrice, // Lưu giá theo định dạng số của Việt Nam Đồng
                size: selectedSize, // Thêm thông tin về kích thước vào đối tượng sản phẩm
                brand: productBrand, // Thêm thông tin về thương hiệu vào đối tượng sản phẩm
                origin: productOrigin, // Thêm thông tin về xuất xứ vào đối tượng sản phẩm
                image: productImage, // Thêm thông tin về đường dẫn hình ảnh vào đối tượng sản phẩm
                color: productColor,
                quantity: productQuantity // Thêm thông tin về số lượng vào đối tượng sản phẩm
            };
            // Thêm sản phẩm vào mảng cartItems
            cartItems.push(newItem);
            // Cập nhật số lượng sản phẩm trong giỏ hàng
            cartCounter.innerText = cartItems.length;
            // Lưu mảng cartItems vào localStorage
            localStorage.setItem('cartItems', JSON.stringify(cartItems));
        }
        // Gắn sự kiện click cho nút thêm vào giỏ hàng
        const addToCartButton = document.querySelector('.btn-success');
        addToCartButton.addEventListener('click', addToCart);
    });
</script>





</html>