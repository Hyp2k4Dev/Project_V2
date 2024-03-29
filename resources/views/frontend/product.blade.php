<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTH SNEAKER STORE</title>
    <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <link rel="stylesheet" href="{{ asset('css/fe/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fe/templatemo.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fe/productPage.css') }}">

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
                <a href="#">Blog</a>
            </div>
        </div>
        <a href="#" class="header-right">
            Contact
        </a>
    </div>
    <div class="test">
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
    <div id="noResultsMessage" style="display: none;">
    <p>Không có sản phẩm như yêu cầu</p>
    </div>
    <script>
    // Get all checkboxes
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    
    // Add event listener to each checkbox
    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            // Check if any checkbox is checked
            var anyChecked = false;
            for(var i = 0; i < checkboxes.length; i++) {
                if(checkboxes[i].checked) {
                    anyChecked = true;
                    break;
                }
            }

            // Show or hide the message based on whether any checkbox is checked
            var noResultsMessage = document.getElementById('noResultsMessage');
            noResultsMessage.style.display = anyChecked ? 'none' : 'block';
        });
    });
</script>
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-3">
                <h1 class="h2 pb-4">Categories</h1>
                <ul class="list-unstyled customerSelect">
                    <li class="pb-3">
                        <a class="collapsed d-flex justify-content-between h3 text-decoration-none" data-toggle="collapse" href="#priceCollapse">
                            Price
                        </a>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <input class="form-check-input me-1" type="checkbox" name="listGroupPrice" value="" id="firstPrice">
                                <label class="form-check-label" for="firstPrice">Under 500.000VND</label>
                            </li>
                            <li class="list-group-item">
                                <input class="form-check-input me-1" type="checkbox" name="listGroupPrice" value="" id="secondPrice">
                                <label class="form-check-label" for="secondPrice">500.000VND to 1.000.000VND</label>
                            </li>
                            <li class="list-group-item">
                                <input class="form-check-input me-1" type="checkbox" name="listGroupPrice" value="" id="thirdPrice">
                                <label class="form-check-label" for="thirdPrice">1.000.000VND to 2.000.000VND</label>
                            </li>
                            <li class="list-group-item">
                                <input class="form-check-input me-1" type="checkbox" name="listGroupPrice" value="" id="fourPrice">
                                <label class="form-check-label" for="fourPrice">Over 2.000.000VND</label>
                            </li>
                        </ul>
                    </li>
                    <li class="pb-3">
                        <a class="collapsed d-flex justify-content-between h3 text-decoration-none" data-toggle="collapse" href="#brandCollapse">
                            Brand
                        </a>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <input class="form-check-input me-1" type="checkbox" name="listGroupBrand" value="" id="firstBrand">
                                <label class="form-check-label" for="firstBrand">Nike</label>
                            </li>
                            <li class="list-group-item">
                                <input class="form-check-input me-1" type="checkbox" name="listGroupBrand" value="" id="secondBrand">
                                <label class="form-check-label" for="secondBrand">Adidas</label>
                            </li>
                            <li class="list-group-item">
                                <input class="form-check-input me-1" type="checkbox" name="listGroupBrand" value="" id="thirdBrand">
                                <label class="form-check-label" for="thirdBrand">Puma</label>
                            </li>
                        </ul>
                    </li>
                    <li class="pb-3">
                        <a class="collapsed d-flex justify-content-between h3 text-decoration-none" data-toggle="collapse" href="#sizeCollapse">
                            Size
                        </a>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <input class="form-check-input me-1" type="checkbox" name="listGroupSize" value="" id="firstSize">
                                <label class="form-check-label" for="firstSize">36</label>
                            </li>
                            <li class="list-group-item">
                                <input class="form-check-input me-1" type="checkbox" name="listGroupSize" value="" id="secondSize">
                                <label class="form-check-label" for="secondSize">37</label>
                            </li>
                            <li class="list-group-item">
                                <input class="form-check-input me-1" type="checkbox" name="listGroupSize" value="" id="thirdSize">
                                <label class="form-check-label" for="thirdSize">38</label>
                            </li>
                            <button class="btn btn-link text-decoration-none" type="button" data-toggle="collapse" data-target="#sizeCollapse" aria-expanded="false" aria-controls="sizeCollapse">
                                Show more
                            </button>
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="col-lg-9">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-inline shop-top-menu pb-3 pt-1">
                            <li class="list-inline-item">
                                <a class="h3 text-dark text-decoration-none mr-3" href="#">All</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="h3 text-dark text-decoration-none mr-3" href="#">Men's</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="h3 text-dark text-decoration-none" href="#">Women's</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6 pb-4">
                        <div class="d-flex">
                            <select class="form-control">
                                <option>Featured</option>
                                <option>A to Z</option>
                                <option>Item</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        @forelse($products as $index => $product)
                            @if($index % 3 == 0 && $index > 0)
                                </div>
                                <div class="row">
                            @endif
                            <div class="col-md-4">
                                <div class="card mb-4 product-wap rounded-0">
                                    <div class="card-body rounded-0 position-relative">
                                        <img class="card-img rounded-0 img-fluid m-0 p-0" src="{{ asset($product->Image) }}" >
                                        <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                            <ul class="item-hover list-unstyled d-flex justify-content-center align-items-center m-0 p-0">
                                                <li class="mr-2"><a class="btn btn-success text-white" href="{{ route('frontend.productdetails', $product->id) }}"><i class="far fa-heart"></i></a></li>
                                                <li><a class="btn btn-success text-white" href="{{ route('frontend.productdetails', $product->id) }}"><i class="far fa-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <a href="{{ route('frontend.productdetails', $product->id) }}" class="h3 text-decoration-none">{{ $product->Name_sneaker }}</a>
                                        <p class="text-center mb-0">{{ number_format($product->Price, 0, ',', '.') }} VNĐ</p>
                                    </div>
                                </div>
                            </div>
                            @if(($index + 1) % 3 == 0 || $loop->last)
                                </div>
                                @if(!$loop->last)
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
                                    <span class="page-link active rounded-0 mr-3 shadow-sm border-top-0 border-left-0" tabindex="-1">1</span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link rounded-0 mr-3 shadow-sm border-top-0 border-left-0 text-dark" href="{{ $products->previousPageUrl() }}">1</a>
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
                                    <a class="page-link rounded-0 mr-3 shadow-sm border-top-0 border-left-0 text-dark" href="{{ $products->nextPageUrl() }}">Next</a>
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
                            <a class="text-decoration-none" href="mailto:info@company.com">sneakerstore@gmail.com</a>
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
                            <a class="text-light text-decoration-none" target="_blank" href="http://facebook.com/"><i class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://www.instagram.com/"><i class="fab fa-instagram fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://twitter.com/"><i class="fab fa-twitter fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://www.linkedin.com/"><i class="fab fa-linkedin fa-lg fa-fw"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-auto">
                    <label class="sr-only" for="subscribeEmail">sneakerstore@gmail.com</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control bg-dark border-light" id="subscribeEmail" placeholder="Email address">
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

    </footer>
    <script src="{{ asset('js/jquery-1.11.0.min.js') }}"></script>
    <script src="{{ asset('js/jquery-migrate-1.2.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/templatemo.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    </div>
</body>

</html>