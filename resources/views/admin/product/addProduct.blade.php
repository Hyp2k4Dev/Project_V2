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
    <script src="{{ asset('js/be/product.js') }}"></script>

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="{{ asset('assets/css/pe-icon-7-stroke.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/be/product.css') }}">
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-color="purple" data-image="{{ asset('assets/img/sidebar-5.jpg') }}">
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
                        <p class="navbar-brand">Add Product</p>
                    </div>
                    <div class="collapse navbar-collapse" style="display: block ;visibility: visible ;opacity: 1 ; transform: none ; ">
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="/admin/userList">
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
                <form id="productForm" action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="image" class="btn btn-info p-2" style="cursor: pointer;">Image product:</label>
                        <input type="file" name="image" id="image" accept="image/*" style=" opacity: 0;width: 0.1px;height: 0.1px;position: absolute;overflow: hidden;z-index: -1;" class="form-control-file">
                        <img id="imagePreview" src="#" alt="Preview" style="display: none; width: 350px;height:250px ; object-fit: cover;">
                        <br>
                        <small class="form-text text-muted">Choose photos with a maximum size of 2MB and format JPG, PNG, JPEG, GIF, SVG.</small>
                    </div>

                    <script>
                        document.getElementById('image').addEventListener('input', function(event) {
                            var file = event.target.files[0];

                            if (file) {
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
                            }
                        });
                    </script>

                    <div class="form-group">
                        <label for="name">Name product<span class="required">*</span>:</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>


                    <div class="form-group">
                        <label for="description">Description<span class="required">*</span>:</label>
                        <textarea name="description" id="description" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="brand">Brand <span class="required">*</span>:</label>
                        <input type="text" name="brand" id="brand" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="color">Color<span class="required">*</span>:</label>
                        <input type="text" name="color" id="color" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="origin">Origin<span class="required">*</span>:</label>
                        <input type="text" name="origin" id="origin" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="material">Material<span class="required">*</span>:</label>
                        <input type="text" name="material" id="material" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Status<span class="required">*</span>:</label><br>
                        <div style="display: flex; align-items: center; ">
                            <div class="form-check" style="margin: 0 15px !important">
                                <input class="form-check-input" type="radio" name="status" id="status_new" value="new">
                                <label class="form-check-label" for="status_new">
                                    New
                                </label>
                            </div>
                            <div class="form-check" style="margin: 0 15px !important">
                                <input class="form-check-input" type="radio" name="status" id="status_hot" value="hot">
                                <label class="form-check-label" for="status_hot">
                                    Hot
                                </label>
                            </div>
                            <div class="form-check" style="margin: 0 15px !important">
                                <input class="form-check-input" type="radio" name="status" id="status_sold_out" value="sold_out">
                                <label class="form-check-label" for="status_sold_out">
                                    Sold out
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="price">Price (VND)<span class="required">*</span>:</label>
                        <input type="text" name="price" id="price" class="form-control">
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

                    <div id="sizeForms">
                        <div style="margin-bottom: 20px;">
                            <label for="size">Size<span class="required">*</span>:</label>
                            <input style="margin-bottom: 20px;" type="text" name="sizes[0][size]" class="form-control">
                            <span class="text-danger" id="errorSize" name="sizes[0][size]" style="display: none;">Invalid Size</span>
                        </div>
                        <label for="quantity">Quantity<span class="required">*</span>:</label>
                        <input type="number" name="sizes[0][quantity]" class="form-control">
                        <span class="text-danger" id="errorLber" style="display: none;">Invalid quantity</span>
                    </div>
                    <button type="button" class="buttonAddSize btn-secondary btn" onclick="addSizeForm()">ADD Size</button>
                    <button type="submit" class="btn btn-primary" style="color: black; font-weight: 600 !important">ADD Product</button>
                </form>
                <script>
                    document.getElementById('image').onchange = function(evt) {
                        var tgt = evt.target || window.event.srcElement,
                            files = tgt.files;

                        if (FileReader && files && files.length) {
                            var fr = new FileReader();
                            fr.onload = function() {
                                document.getElementById('imagePreview').src = fr.result;
                                document.getElementById('imagePreview').style.display = 'block';
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

                        var nameInput = document.getElementById('name');
                        var name = nameInput.value.trim();

                        if (name === '') {
                            $.notify({
                                message: 'Please enter product name'
                            }, {
                                type: 'danger',
                                timer: 4000
                            });
                            hasError = true;
                            event.preventDefault();
                        }

                        var descriptionInput = document.getElementById('description');
                        var description = descriptionInput.value.trim();
                        if (description === '') {
                            $.notify({
                                message: 'Please enter product description'
                            }, {
                                type: 'danger',
                                timer: 4000
                            });
                            hasError = true;
                            event.preventDefault();
                        }

                        var brandInput = document.getElementById('brand');
                        var brand = brandInput.value.trim();
                        if (brand === '') {
                            $.notify({
                                message: 'Please enter product brand'
                            }, {
                                type: 'danger',
                                timer: 4000
                            });
                            hasError = true;
                            event.preventDefault();
                        }

                        var colorInput = document.getElementById('color');
                        var color = colorInput.value.trim();
                        if (color === '') {
                            $.notify({
                                message: 'Please enter product color'
                            }, {
                                type: 'danger',
                                timer: 4000
                            });
                            hasError = true;
                            event.preventDefault();
                        }

                        var originInput = document.getElementById('origin');
                        var origin = originInput.value.trim();
                        if (origin === '') {
                            $.notify({
                                message: 'Please enter product origin'
                            }, {
                                type: 'danger',
                                timer: 4000
                            });
                            hasError = true;
                            event.preventDefault();
                        }

                        var materialInput = document.getElementById('material');
                        var material = materialInput.value.trim();
                        if (material === '') {
                            $.notify({
                                message: 'Please enter product material'
                            }, {
                                type: 'danger',
                                timer: 4000
                            });
                            hasError = true;
                            event.preventDefault();
                        }

                        var statusInput = document.querySelector('input[name="status"]:checked');
                        if (!statusInput) {
                            $.notify({
                                message: 'Please select product status'
                            }, {
                                type: 'danger',
                                timer: 4000
                            });
                            hasError = true;
                            event.preventDefault();
                        }
                        var price = document.getElementById('price').value;
                        var priceError = document.getElementById('priceError');
                        var sizeForms = document.querySelectorAll('#sizeForms input[type="number"]');
                        var imageInput = document.getElementById('image');
                        priceError.style.display = 'none';

                        if (price <= 0) {
                            priceError.style.display = 'block';
                            $.notify({
                                message: 'Please enter the correct price'
                            }, {
                                type: 'danger',
                                timer: 4000
                            });
                            hasError = true;
                            event.preventDefault();
                        }

                        if (!imageInput.files.length) {
                            $.notify({
                                message: 'Please select an image'
                            }, {
                                type: 'danger',
                                timer: 4000
                            });
                            hasError = true;
                            event.preventDefault();
                        }
                        var quantityErrorDisplayed = false;
                        for (var i = 0; i < sizeForms.length; i++) {
                            var quantityError = document.getElementById('errorLber');
                            var quantity = sizeForms[i].value;
                            if (!isNaturalNumber(quantity)) {
                                if (!quantityErrorDisplayed) {
                                    $.notify({
                                        message: 'Please enter the correct quantity'
                                    }, {
                                        type: 'danger',
                                        timer: 4000
                                    });
                                    quantityErrorDisplayed = true;
                                }
                                quantityError.style.display = 'block';
                                hasError = true;
                            }
                        }
                        var sizeErrorDisplayed = false;
                        for (var i = 0; i < sizeForms.length; i++) {
                            var sizeError = document.getElementById('errorSize' + (i + 1));
                            var size = sizeForms[i].value;
                            if (size.trim() === '') {
                                if (!sizeErrorDisplayed) {
                                    $.notify({
                                        message: 'Please enter the size'
                                    }, {
                                        type: 'danger',
                                        timer: 4000
                                    });
                                    sizeErrorDisplayed = true;
                                }
                                sizeError.style.display = 'block';
                                hasError = true;
                            }
                        }
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

                    function addSizeForm() {
                        let value = 1;
                        const sizeFormsContainer = document.getElementById('sizeForms');
                        const sizeFormCount = sizeFormsContainer.querySelectorAll('.form-group').length + 1;
                        const sizeFormHtml = `
                <div class="form-group" id="sizeForm${sizeFormCount}">
                    <label for="size${sizeFormCount}">Size:<span class="required">*</span></label>
                    <input type="text" name="sizes[${sizeFormCount}][size]" class="form-control" >
                    <label for="quantity${sizeFormCount}">Quantity:<span class="required">*</span></label>
                    <input type="number" name="sizes[${sizeFormCount}][quantity]" class="form-control" >
                    <span class="text-danger" id="errorLber[${value}]" style="display: none;">Invalid quantity</span>
                    <button type="button" class="btn btn-danger" onclick="removeSizeForm(${sizeFormCount})">Cancel</button>
                </div>
            `;
                        sizeFormsContainer.insertAdjacentHTML('beforeend', sizeFormHtml);
                        value++
                    }

                    function removeSizeForm(sizeFormId) {
                        const sizeForm = document.getElementById(`sizeForm${sizeFormId}`);
                        if (sizeForm) {
                            sizeForm.parentNode.removeChild(sizeForm);
                        }
                    }
                </script>
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
                        &copy; <script>
                            document.write(new Date().getFullYear())
                        </script> <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
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
                timer: 4000
            });
        }
    });
</script>

</html>