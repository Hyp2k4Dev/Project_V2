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

            <a href="#" class="btn-contact">
                Contact
            </a>
            <form id="addToCartForm" action="{{ route('frontend.addToCart') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <a href="#" class="add-cart" onclick="event.preventDefault(); document.getElementById('addToCartForm').submit();">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 56 56">
                    <path fill="currentColor" d="M20.008 39.649H47.36c.913 0 1.71-.75 1.71-1.758s-.797-1.758-1.71-1.758H20.406c-1.336 0-2.156-.938-2.367-2.367l-.375-2.461h29.742c3.422 0 5.18-2.11 5.672-5.461l1.875-12.399a7.2 7.2 0 0 0 .094-.89c0-1.125-.844-1.899-2.133-1.899H14.641l-.446-2.976c-.234-1.805-.89-2.72-3.28-2.72H2.687c-.937 0-1.734.822-1.734 1.76c0 .96.797 1.781 1.735 1.781h7.921l3.75 25.734c.493 3.328 2.25 5.414 5.649 5.414m31.054-25.454L49.4 25.422c-.188 1.453-.961 2.344-2.344 2.344l-29.906.023l-1.993-13.594ZM21.86 51.04a3.766 3.766 0 0 0 3.797-3.797a3.781 3.781 0 0 0-3.797-3.797c-2.132 0-3.82 1.688-3.82 3.797c0 2.133 1.688 3.797 3.82 3.797m21.914 0c2.133 0 3.82-1.664 3.82-3.797c0-2.11-1.687-3.797-3.82-3.797c-2.109 0-3.82 1.688-3.82 3.797c0 2.133 1.711 3.797 3.82 3.797" />
                </svg>
                <span id="cartCounter" class="cart-counter">0</span>
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
    @if(isset($product))
    <form id="productForm" action="{{ route('frontend.productdetails') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="image" class="btn btn-info p-2" style="cursor: pointer;">IMAGE PRODUCT:</label>
            <input type="file" name="Image" id="image" style="opacity: 0; width: 0.1px; height: 0.1px; position: absolute; overflow: hidden; z-index: -1;" accept="image/*" class="form-control-file">
            @if($product->Image)
            <img src="{{ asset($product->Image) }}" id="img-root" alt="Image Product" style="max-width: 200px; margin-top: 10px;">
            @endif
            <img id="imagePreview" src="#" alt="Preview" style="display: none; width: 200px; height: 100%;">
        </div>

        <script>
            document.getElementById('image').addEventListener('change', function(event) {
                var file = event.target.files[0];

                if (file.size > 2 * 1024 * 1024) {
                    alert('File size exceeds 2MB limit.');
                    event.target.value = '';
                    document.getElementById('imagePreview').src = '';
                } else {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById('imagePreview').src = e.target.result;
                        document.getElementById('imagePreview').style.display = 'block';
                    };
                    reader.readAsDataURL(file);
                }
            });
        </script>

        <div class="form-group">
            <label for="name">Name Product:</label>
            <input type="text" name="Name_sneaker" id="name" class="form-control" value="{{ $product->Name_sneaker }}" required>

        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="Description" id="description" class="form-control auto-resize">{{ $product->Description }}</textarea>
        </div>

        <script>
            function autoResizeTextarea(textarea) {
                textarea.style.height = 'auto';
                textarea.style.height = textarea.scrollHeight + 'px';
            }

            var textareas = document.querySelectorAll('.auto-resize');
            textareas.forEach(function(textarea) {
                autoResizeTextarea(textarea);
                textarea.addEventListener('input', function() {
                    autoResizeTextarea(this);
                });
            });
        </script>


        <div class="form-group">
            <label for="brand">Brand:</label>
            <input type="text" name="Brand" id="brand" class="form-control" value="{{ $product->Brand }}" required>
        </div>

        <div class="form-group">
            <label for="color">Color:</label>
            <input type="text" name="Color" id="color" class="form-control" value="{{ $product->Color }}" required>
        </div>

        <div class="form-group">
            <label for="origin">Origin:</label>
            <input type="text" name="Origin" id="origin" class="form-control" value="{{ $product->Origin }}" required>
        </div>

        <div class="form-group">
            <label for="material">Material:</label>
            <input type="text" name="Material" id="material" class="form-control" value="{{ $product->Material }}" required>
        </div>

        <div class="form-group">
            <label for="status">Status:</label>
            <input type="text" name="Status_Sneaker" id="status" class="form-control" value="{{ $product->Status_Sneaker }}" required>
        </div>

        <div class="form-group">
            <label for="price">Price (VND):</label>
            <input type="text" name="Price" id="price" class="form-control" value="{{ $product->Price }}" required>
            <span id="priceError" class="text-danger" style="display: none;">Price is not valid</span>
        </div>

        <script>
            const priceInput = document.getElementById('price');

            priceInput.addEventListener('input', function(e) {
                let value = e.target.value.replace(/\D/g, '');
                value = formatNumber(value);
                e.target.value = value;
            });

            priceInput.addEventListener('change', function(e) {
                let value = e.target.value.replace(/\D/g, '');
                e.target.value = formatNumberForDatabase(value);
            });

            function formatNumber(number) {
                return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
            }

            function formatNumberForDatabase(number) {
                return parseInt(number, 10);
            }
        </script>

        <div id="sizeFormsContainer">
            @foreach($product->sizes as $index => $size)
            <div class="size-form">
                <div class="form-group">
                    <label for="size">Size:</label>
                    <input type="text" name="sizes[{{ $index }}][size]" class="form-control" value="{{ $size->size_name }}" required>
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity:</label>
                    <input type="number" name="sizes[{{ $index }}][quantity]" class="form-control quantity-input" value="{{ $size->quantity }}" required>
                    <span class="text-danger quantity-error" style="display: none;">Quantity must be a positive integer</span>
                </div>
                <button type="button" class="btn btn-danger remove-size-form">DELETE</button>
            </div>
            @endforeach
        </div>
        <button type="button" class="buttonAddSize btn-secondary btn" onclick="addSizeFormUpdate()">Add Size</button>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
    @else
    <p>Không tìm thấy thông tin sản phẩm.</p>
    @endif
</body>

</html>