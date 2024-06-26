</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTH SNEAKER STORE</title>
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="{{ asset('css/fe/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fe/templatemo.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fe/productPage.css') }}">
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.3/css/dataTables.dataTables.min.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="//cdn.datatables.net/2.0.3/js/dataTables.min.js" defer></script>
</head>

<body>
    <div class="header">
        <div class="header-left">
            <a href="{{ route('frontend.home') }}"><img src="{{ asset('images/logo-shop.png') }}"
                    alt="Mô tả của hình ảnh"></a>
            <div class="option-header">
                <a href="/product">Products</a>
                <a href="#">About</a>
                <a href="/blog">Blogs</a>
            </div>
        </div>
        <div class="header-right">
            <form id="addToCartForm" action="{{ route('frontend.addToCart') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <a href="#" class="add-cart"
                onclick="event.preventDefault(); document.getElementById('addToCartForm').submit();">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 56 56">
                    <path fill="currentColor"
                        d="M20.008 39.649H47.36c.913 0 1.71-.75 1.71-1.758s-.797-1.758-1.71-1.758H20.406c-1.336 0-2.156-.938-2.367-2.367l-.375-2.461h29.742c3.422 0 5.18-2.11 5.672-5.461l1.875-12.399a7.2 7.2 0 0 0 .094-.89c0-1.125-.844-1.899-2.133-1.899H14.641l-.446-2.976c-.234-1.805-.89-2.72-3.28-2.72H2.687c-.937 0-1.734.822-1.734 1.76c0 .96.797 1.781 1.735 1.781h7.921l3.75 25.734c.493 3.328 2.25 5.414 5.649 5.414m31.054-25.454L49.4 25.422c-.188 1.453-.961 2.344-2.344 2.344l-29.906.023l-1.993-13.594ZM21.86 51.04a3.766 3.766 0 0 0 3.797-3.797a3.781 3.781 0 0 0-3.797-3.797c-2.132 0-3.82 1.688-3.82 3.797c0 2.133 1.688 3.797 3.82 3.797m21.914 0c2.133 0 3.82-1.664 3.82-3.797c0-2.11-1.687-3.797-3.82-3.797c-2.109 0-3.82 1.688-3.82 3.797c0 2.133 1.711 3.797 3.82 3.797" />
                </svg>
                <span id="cartCounter" class="cart-counter">0</span>
            </a>
            <a href="#">
                Contact
            </a>
        </div>
    </div>

    <div class="test">
        <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="w-100 pt-1 mb-5 text-right">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="get" class="modal-content modal-body border-0 p-0">
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" id="inputModalSearch" name="q"
                            placeholder="Search ...">
                        <button type="submit" class="input-group-text bg-success text-light">
                            <i class="fa fa-fw fa-search text-white"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div id="noResultsMessage" style="display: none;">
            <p>Không có sản phẩm như yêu cầu</p>
        </div>
        <div class="container py-5">
            <div class="row">
                <script>
                    $(document).ready(function() {
                        // Xử lý khi nhấn vào nút "Categories"
                        $('.dropdown-toggle').click(function() {
                            $(this).next('.dropdown-menu').slideToggle();
                        });
                    });
                </script>

                <div class="col-lg-3">
                    <h1 class="h2 pb-4 d-lg-block d-none">Categories</h1>
                    <div class="dropdown d-lg-none">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="categoriesDropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Categories
                        </button>
                        <div class="dropdown-menu" aria-labelledby="categoriesDropdown">
                            <a class="dropdown-item" href="#priceCollapseContent">Price</a>
                            <a class="dropdown-item" href="#brandCollapseContent">Brand</a>
                            <a class="dropdown-item" href="#sizeCollapseContent">Size</a>
                        </div>
                    </div>
                    <ul class="list-unstyled customerSelect d-lg-block d-md-block d-sm-block d-none">
                        <li class="pb-3" id="priceCollapse">
                            <div class="dropdown">
                                <a class="collapsed d-flex justify-content-between h3 text-decoration-none dropdown-toggle"
                                    data-toggle="dropdown" href="#" aria-expanded="false">
                                    Price
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <div class="price">
                                        <div>
                                            <input class="form-check-input me-1" type="checkbox" id="checkbox1"
                                                name="listGroupPrice" value="500K-1M">
                                            <label class="form-check-label" for="checkbox1">500.000 VND - 1.000.000
                                                VND</label>
                                        </div>
                                        <div>
                                            <input class="form-check-input me-1" type="checkbox" id="checkbox2"
                                                name="listGroupPrice" value="1M-2M">
                                            <label class="form-check-label" for="checkbox2">1.000.000 VND - 2.000.000
                                                VND</label>
                                        </div>
                                        <div>
                                            <input class="form-check-input me-1" type="checkbox" id="checkbox3"
                                                name="listGroupPrice" value="2M-3M">
                                            <label class="form-check-label" for="checkbox3">2.000.000 VND - 3.000.000
                                                VND</label>
                                        </div>
                                    </div>
                                </ul>
                            </div>
                        </li>
                        <li class="pb-3" id="brandCollapse">
                            <div class="dropdown">
                                <a class="collapsed d-flex justify-content-between h3 text-decoration-none dropdown-toggle"
                                    data-toggle="dropdown" href="#" aria-expanded="false">
                                    Brand
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <div class="brand">
                                        <div>
                                            <input class="form-check-input me-1" type="checkbox" id="checkbox4"
                                                name="listGroupBrand" value="Adidas">
                                            <label class="form-check-label" for="checkbox4">Adidas</label>
                                        </div>
                                        <div>
                                            <input class="form-check-input me-1" type="checkbox" id="checkbox5"
                                                name="listGroupBrand" value="Nike">
                                            <label class="form-check-label" for="checkbox5">Nike</label>
                                        </div>
                                        <div>
                                            <input class="form-check-input me-1" type="checkbox" id="checkbox6"
                                                name="listGroupBrand" value="Puma">
                                            <label class="form-check-label" for="checkbox6">Puma</label>
                                        </div>
                                    </div>
                                </ul>
                            </div>
                        </li>
                        <li class="pb-3" id="sizeCollapse">
                            <div class="dropdown">
                                <a class="collapsed d-flex justify-content-between h3 text-decoration-none dropdown-toggle"
                                    data-toggle="dropdown" href="#" aria-expanded="false">
                                    Size
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <div class="size">
                                        <div>
                                            <input class="form-check-input me-1" type="checkbox" id="checkbox7"
                                                name="listGroupSize" value="36">
                                            <label class="form-check-label" for="checkbox7">36</label>
                                        </div>
                                        <div>
                                            <input class="form-check-input me-1" type="checkbox" id="checkbox8"
                                                name="listGroupSize" value="37">
                                            <label class="form-check-label" for="checkbox8">37</label>
                                        </div>
                                        <div>
                                            <input class="form-check-input me-1" type="checkbox" id="checkbox9"
                                                name="listGroupSize" value="38">
                                            <label class="form-check-label" for="checkbox9">38</label>
                                        </div>
                                    </div>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-md-6 pb-4">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                                <button class="btn btn-outline-secondary" type="button">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            @forelse($products as $index => $product)
                                @if ($index % 3 == 0 && $index > 0)
                        </div>
                        <div class="row">
                            @endif
                            <div class="col-md-4">
                                <div class="card mb-4 product-wap rounded-0">
                                    <div class="card-body rounded-0 position-relative">
                                        <img class="card-img rounded-0 img-fluid m-0 p-0"
                                            src="{{ asset($product->Image) }}">
                                        <div
                                            class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                            <ul
                                                class="item-hover list-unstyled d-flex justify-content-center align-items-center m-0 p-0">
                                                <li><a class="btn btn-success text-white view-details"
                                                        data-product-id="{{ $product->id }}"><i
                                                            class="far fa-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <a href="{{ route('frontend.productdetails', $product->id) }}"
                                            class="h3 text-decoration-none">{{ $product->Name_sneaker }}</a>
                                        <br>
                                        <p> Color: {{ $product->Color }}</p>
                                        <p class="text-center mb-0">{{ number_format($product->Price, 0, ',', '.') }}
                                            VND </p>
                                    </div>
                                </div>
                            </div>
                            @if (($index + 1) % 3 == 0 || $loop->last)
                        </div>
                        @if (!$loop->last)
                            <div class="row">
                        @endif
                        @endif
                    @empty
                        <div class="col-md-12">
                            <div class="alert alert-info" role="alert">
                                Chưa có sản phẩm nào.
                            </div>
                        </div>
                        @endforelse
                    </div>
                    {{-- Hiển thị phân trang --}}
                    <div class="row">
                        <ul class="pagination pagination-lg justify-content-end">
                            @if ($products->onFirstPage())
                                <li class="page-item disabled">
                                    <span class="page-link active rounded-0 mr-3 shadow-sm border-top-0 border-left-0"
                                        tabindex="-1">1</span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link rounded-0 mr-3 shadow-sm border-top-0 border-left-0 text-dark"
                                        href="{{ $products->previousPageUrl() }}">1</a>
                                </li>
                            @endif

                            @php
                                $currentPage = $products->currentPage();
                                $startPage = max($currentPage - 2, 2);
                                $endPage = min($currentPage + 2, $products->lastPage());

                                if ($endPage - $startPage + 1 < 5) {
                                    if ($startPage == 2) {
                                        $endPage = min($startPage + 4, $products->lastPage());
                                    } else {
                                        $startPage = max($endPage - 4, 2);
                                    }
                                }

                                for ($page = $startPage; $page <= $endPage; $page++) {
                                    $url = $products->url($page);
                                    $activeClass = $page == $currentPage ? 'active' : '';
                                    echo "<li class='page-item'><a class='page-link rounded-0 mr-3 shadow-sm border-top-0 border-left-0 text-dark $activeClass' href='$url'>$page</a></li>";
                                }
                            @endphp

                            @if ($products->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link rounded-0 mr-3 shadow-sm border-top-0 border-left-0 text-dark"
                                        href="{{ $products->nextPageUrl() }}">Next</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
                
        <footer class="bg-dark" id="tempaltemo_footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 pt-5">
                        <h2 class="h2 text-success border-bottom pb-3 border-light logo">Sneaker Store</h2>
                        <ul class="list-unstyled text-light footer-link-list">
                            <li>
                                <i class="fas fa-map-marker-alt fa-fw"></i>
                                4th floor, VTC Online Building, 18 Tam Trinh Street, Hai Ba Trung, Ha Noi
                            </li>
                            <li>
                                <i class="fa fa-phone fa-fw"></i>
                                <a class="text-decoration-none" href="tel:010-020-0340">(84) 393234822</a>
                            </li>
                            <li>
                                <i class="fa fa-envelope fa-fw"></i>
                                <a class="text-decoration-none"
                                    href="mailto:info@company.com">sneakerstore@gmail.com</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-md-4 pt-5">
                        <h2 class="h2 text-light border-bottom pb-3 border-light">Products</h2>
                        <ul class="list-unstyled text-light footer-link-list">
                            <li><a class="text-decoration-none" href="#">Luxury</a></li>
                            <li><a class="text-decoration-none" href="#">Sport Wear</a></li>
                            <li><a class="text-decoration-none" href="#">Men's Shoes</a></li>
                            <li><a class="text-decoration-none" href="#">Women's Shoes</a></li>
                            <li><a class="text-decoration-none" href="#">Popular Dress</a></li>
                            <li><a class="text-decoration-none" href="#">Gym Accessories</a></li>
                            <li><a class="text-decoration-none" href="#">Sport Shoes</a></li>
                        </ul>
                    </div>

                    <div class="col-md-4 pt-5">
                        <h2 class="h2 text-light border-bottom pb-3 border-light">Further Info</h2>
                        <ul class="list-unstyled text-light footer-link-list">
                            <li><a class="text-decoration-none" href="#">Home</a></li>
                            <li><a class="text-decoration-none" href="#">About Us</a></li>
                            <li><a class="text-decoration-none" href="#">Shop Locations</a></li>
                            <li><a class="text-decoration-none" href="#">FAQs</a></li>
                            <li><a class="text-decoration-none" href="#">Contact</a></li>
                        </ul>
                    </div>

                </div>

                <div class="row text-light mb-4">
                    <div class="col-12 mb-3">
                        <div class="w-100 my-3 border-top border-light"></div>
                    </div>
                    <div class="col-auto me-auto">
                        <ul class="list-inline text-left footer-icons">
                            <li class="list-inline-item border border-light rounded-circle text-center">
                                <a class="text-light text-decoration-none" target="_blank"
                                    href="http://facebook.com/"><i class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                            </li>
                            <li class="list-inline-item border border-light rounded-circle text-center">
                                <a class="text-light text-decoration-none" target="_blank"
                                    href="https://www.instagram.com/"><i class="fab fa-instagram fa-lg fa-fw"></i></a>
                            </li>
                            <li class="list-inline-item border border-light rounded-circle text-center">
                                <a class="text-light text-decoration-none" target="_blank"
                                    href="https://twitter.com/"><i class="fab fa-twitter fa-lg fa-fw"></i></a>
                            </li>
                            <li class="list-inline-item border border-light rounded-circle text-center">
                                <a class="text-light text-decoration-none" target="_blank"
                                    href="https://www.linkedin.com/"><i class="fab fa-linkedin fa-lg fa-fw"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-auto">
                        <label class="sr-only" for="subscribeEmail">sneakerstore@gmail.com</label>
                        <div class="input-group mb-2">
                            <input type="text" class="form-control bg-dark border-light" id="subscribeEmail"
                                placeholder="Email address">
                            <div class="input-group-text btn-success text-light">Subscribe</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-100 bg-black py-3">
                <div class="container">
                    <div class="row pt-2">
                        <div class="col-12">
                            <p class="text-left text-light">
                                Copyright &copy; 2024 Sneaker Store
                                | Designed by <a rel="sponsored" href="#" target="_blank">HTH TEAM</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
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
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const viewDetailsButtons = document.querySelectorAll('.view-details');
                    viewDetailsButtons.forEach(button => {
                        button.addEventListener('click', function() {
                            const productId = this.getAttribute('data-product-id');
                            window.location.href = '/product/' + productId;
                        });
                    });
                });
            </script>


        </footer>
        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('js/templatemo.js') }}"></script>
        <script src="{{ asset('js/custom.js') }}"></script>
    </div>
</body>

</html>
