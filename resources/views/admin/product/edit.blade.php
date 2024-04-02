<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.ico') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>HTH ADMIN</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="{{ asset('assets/css/animate.min.css') }}" rel="stylesheet" />

    <!--  Light Bootstrap Table core CSS    -->
    <link href="{{ asset('assets/css/light-bootstrap-dashboard.css?v=1.4.0') }}" rel="stylesheet" />


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{ asset('assets/css/demo.css') }}" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="{{ asset('assets/css/pe-icon-7-stroke.css') }}" rel="stylesheet" />
</head>

<body>

    <div class="wrapper">
        <div class="sidebar" data-color="purple" data-image="{{ asset('assets/img/sidebar-5.jpg') }}">

            <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="/admin/dashboard" class="simple-text">
                        HTH ADMIN
                    </a>
                </div>

                <ul class="nav">
                    <li>
                        <a href="/admin/dashboard">
                            <i class="pe-7s-graph"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/userList">
                            <i class="pe-7s-user"></i>
                            <p>User Profile</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('table') }}">
                            <i class="pe-7s-note2"></i>
                            <p>Order List</p>
                        </a>
                    </li>
                    <li class="active">
                        <a href="/admin/product">
                            <i class="pe-7s-shopbag"></i>
                            <p>Products</p>
                        </a>
                    </li>

                    <li class="active-pro">
                        <a href="{{ url('upgrade') }}">
                            <i class="pe-7s-rocket"></i>
                            <p>Upgrade to PRO</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="main-panel">
            <nav class="navbar navbar-default navbar-fixed">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <p class="navbar-brand">Products List</p>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="admin/userList">
                                    <p>{{ $user->name }} ( {{$user->role}} )</p>
                                </a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <p>
                                        Action
                                        <b class="caret"></b>
                                    </p>

                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="/admin/product/add-product">ADD PRODUCT</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">
                                    <p>Log out</p>
                                </a>
                            </li>
                            <li class="separator hidden-lg hidden-md"></li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="content">
                <div class="content">
                    <form id="productForm" action="{{ route('admin.product.update', ['id' => $product->id]) }}" method="POST" enctype="multipart/form-data">
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
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>
                        <script>
                            document.getElementById('image').addEventListener('change', function(event) {
                                var file = event.target.files[0];

                                if (file.size > 2 * 1024 * 1024) {
                                    $.notify({
                                        message: 'File size exceeds 2MB limit.'
                                    }, {
                                        type: 'danger',
                                        timer: 4000
                                    });
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
                            <input type="text" name="Name_sneaker" id="name" class="form-control" value="{{ $product->Name_sneaker }}">

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
                            <input type="text" name="Brand" id="brand" class="form-control" value="{{ $product->Brand }}">
                        </div>

                        <div class="form-group">
                            <label for="color">Color:</label>
                            <input type="text" name="Color" id="color" class="form-control" value="{{ $product->Color }}">
                        </div>

                        <div class="form-group">
                            <label for="origin">Origin:</label>
                            <input type="text" name="Origin" id="origin" class="form-control" value="{{ $product->Origin }}">
                        </div>

                        <div class="form-group">
                            <label for="material">Material:</label>
                            <input type="text" name="Material" id="material" class="form-control" value="{{ $product->Material }}">
                        </div>

                        <div class="form-group">
                            <label for="status">Status:</label>
                            <input type="text" name="Status_Sneaker" id="status" class="form-control" value="{{ $product->Status_Sneaker }}">
                        </div>

                        <div class="form-group">
                            <label for="price">Price (VND):</label>
                            <input type="text" name="Price" id="price" class="form-control" value="{{ $product->Price }}">
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
                                    <input type="text" name="sizes[{{ $index }}][size]" class="form-control" value="{{ $size->size_name }}">
                                </div>
                                <div class="form-group">
                                    <label for="quantity">Quantity:</label>
                                    <input type="number" name="sizes[{{ $index }}][quantity]" class="form-control quantity-input" value="{{ $size->quantity }}" required>
                                    <span class="text-danger quantity-error" style="display: none;">Quantity must be a
                                        positive integer</span>
                                </div>
                                <button type="button" class="btn btn-danger remove-size-form">DELETE</button>
                            </div>
                            @endforeach
                        </div>
                        <button type="button" class="buttonAddSize btn-secondary btn" onclick="addSizeFormUpdate()">Add
                            Size</button>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                    @php
                    $currentIndex = count($product->sizes);
                    @endphp

                    <script>
                        document.getElementById('image').onchange = function(evt) {
                            var tgt = evt.target || window.event.srcElement,
                                files = tgt.files;

                            if (FileReader && files && files.length) {
                                var fr = new FileReader();
                                fr.onload = function() {
                                    document.getElementById('image').src = fr.result;
                                    document.getElementById('image').style.display = 'block';
                                    document.getElementById('img-root').style.display = 'none'
                                }
                                fr.readAsDataURL(files[0]);
                            }
                        }

                        document.getElementById('productForm').addEventListener('submit', function(event) {
                            var hasError = false;
                            var formSubmitted = false;

                            if (formSubmitted) {
                                event.preventDefault();
                                return;
                            }

                            var price = document.getElementById('price').value;
                            var priceError = document.getElementById('priceError');
                            var sizeInputs = document.querySelectorAll('.quantity-input');

                            var name = document.getElementById('name').value;
                            var description = document.getElementById('description').value;
                            var brand = document.getElementById('brand').value;
                            var color = document.getElementById('color').value;
                            var origin = document.getElementById('origin').value;
                            var material = document.getElementById('material').value;
                            var status = document.getElementById('status').value;

                            if (!name || !description || !brand || !color || !origin || !material || !status) {
                                hasError = true;
                                $.notify({
                                    message: 'Please fill in all required fields.'
                                }, {
                                    type: 'danger',
                                    timer: 4000
                                });
                                event.preventDefault();
                            }


                            priceError.style.display = 'none';

                            if (price <= 0) {
                                hasError = true;
                                $.notify({
                                    message: 'Price is not valid'
                                }, {
                                    type: 'danger',
                                    timer: 4000
                                });
                                event.preventDefault();
                            }

                            sizeInputs.forEach(function(input) {
                                var quantityError = input.nextElementSibling;
                                var quantity = parseInt(input.value);

                                if (isNaN(quantity) || quantity <= 0) {
                                    hasError = true;
                                    $.notify({
                                        message: 'Quantity must be a positive integer'
                                    }, {
                                        type: 'danger',
                                        timer: 4000
                                    });
                                    quantityError.style.display = 'block';
                                    hasError = true;
                                } else {
                                    quantityError.style.display = 'none';
                                }
                            });

                            var sizeFields = document.querySelectorAll('input[name^="sizes["]');
                            sizeFields.forEach(function(field) {
                                if (!field.value) {
                                    hasError = true;
                                    $.notify({
                                        message: 'Please fill in all size fields.'
                                    }, {
                                        type: 'danger',
                                        timer: 4000
                                    });
                                }
                            });

                            if (!hasError) {
                                formSubmitted = true;
                                return;
                            } else {
                                event.preventDefault();
                                return;
                            }
                        });


                        function isNaturalNumber(n) {
                            return n % 1 === 0 && n > 0;
                        }

                        let currentIndex = '{{ $currentIndex }}';

                        function addSizeFormUpdate() {
                            currentIndex++;

                            const sizeFormsContainer = document.getElementById('sizeFormsContainer');
                            const sizeFormHtml = `
        <div class="size-form">
            <div class="form-group">
                <label for="size">Size:</label>
                <input type="text" name="sizes[${currentIndex}][size]" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" name="sizes[${currentIndex}][quantity]" class="form-control quantity-input" required>
                <span class="text-danger quantity-error" style="display: none;">Quantity must be a positive integer</span>
            </div>
            <button type="button" class="btn btn-danger remove-size-form">Delete</button>
        </div>
    `;
                            sizeFormsContainer.insertAdjacentHTML('beforeend', sizeFormHtml);
                        }

                        document.addEventListener('click', function(event) {
                            if (event.target.classList.contains('remove-size-form')) {
                                const sizeForm = event.target.closest('.size-form');
                                if (sizeForm) {
                                    sizeForm.parentNode.removeChild(sizeForm);
                                }
                            }
                        });
                    </script>
                </div>
            </div>

            <footer class="footer">
                <div class="container-fluid">
                    <nav class="pull-left">
                        <ul>
                            <li>
                                <a href="#">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Company
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Portfolio
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Blog
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <p class="copyright pull-right">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script> <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better
                        web
                    </p>
                </div>
            </footer>


        </div>
    </div>


</body>

<!--   Core JS Files   -->
<script src="{{ asset('assets/js/jquery.3.2.1.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>

<!--  Charts Plugin -->
<script src="{{ asset('assets/js/chartist.min.js') }}"></script>

<!--  Notifications Plugin    -->
<script src="{{ asset('assets/js/bootstrap-notify.js') }}"></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="{{ asset('assets/js/light-bootstrap-dashboard.js?v=1.4.0') }}"></script>

<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<script src="{{ asset('assets/js/demo.js') }}"></script>
@php
$successMessage = session('success');
@endphp

<script type="text/javascript">
    $(document).ready(function() {
        demo.initChartist();

        var successMessage = "{{ $successMessage }}";

        if (successMessage) {
            $.notify({
                message: successMessage
            }, {
                type: 'success',
                timer: 2000
            });
        }
    });
</script>

</html>