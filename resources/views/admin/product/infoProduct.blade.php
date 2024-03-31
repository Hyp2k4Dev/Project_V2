<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.ico') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Light Bootstrap Dashboard by Creative Tim</title>

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
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'top-color': '#8e4d57',
                        'heading': '#fcfbfc',
                    }
                }
            }
        }
    </script>
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
                        <p class="navbar-brand">Product List</p>
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
                <div class="bg-gray-100 ">
                    <div class="border-1 shadow-md shadow-gray-700 rounded-lg">
                        <div class="flex rounded-t-lg sm:px-2 w-full">
                            <div class=" overflow-hidden sm:rounded-[15px] sm:relative sm:p-0 top-10 left-5 p-3">
                                <img src="{{$product->Image}}" class="object-cover h-[250px] w-full" />
                            </div>
                        </div>

                        <div class="p-5 mt-8">
                            <div class="flex flex-col sm:flex-row sm:mt-16">
                                <div class="flex flex-col sm:w-1/3">
                                    <div class="py-3 sm:order-none order-3">
                                        <h2 class="text-4xl font-poppins font-bold text-top-color">Name Product</h2>
                                        <div class="border-2 w-20 border-top-color my-3"></div>
                                        <div class="flex mt-3 mb-8">
                                            <p class="ml-3 font-medium text-4xl font-poppins"> {{$product->Name_sneaker}}</p>
                                        </div>

                                        <h2 class="text-4xl font-poppins font-bold text-top-color">Main Information</h2>
                                        <div class="border-2 w-20 border-top-color my-3"></div>
                                        <div class="flex my-3">
                                            <p class="font-semibold text-3xl font-poppins">Pricre:</p>
                                            <p class="ml-3 font-medium text-3xl font-poppins"> {{number_format($product->Price, 0, '.', '.') }} VND</p>
                                        </div>
                                        @foreach($product->sizes as $size)
                                        <div class="flex">
                                            <div class="flex my-3">
                                                <p class="font-semibold text-3xl font-poppins">Size:</p>
                                                <p class="ml-3 font-medium text-3xl font-poppins">{{ $size->size_name }}</p>
                                            </div>
                                            <div class="flex my-3 mx-5">
                                                <p class="font-semibold text-3xl font-poppins">Quantity: </p>
                                                <p class="ml-3 font-medium text-3xl font-poppins"> {{ $size->quantity }}</p>
                                            </div>
                                        </div>
                                        @endforeach

                                        <h2 class="text-4xl font-poppins font-bold mt-3 text-top-color">Status:</h2>
                                        <div class="border-2 w-20 border-top-color my-3"></div>
                                        <div class="flex mt-3 mb-8">
                                            <p class="ml-3 font-medium font-poppins"> {{$product->Status_Sneaker}}</p>
                                        </div>

                                        <h2 class="text-4xl font-poppins font-bold text-top-color">Code :</h2>
                                        <div class="border-2 w-20 border-top-color my-3"></div>
                                        <div class="flex mt-3 mb-8">
                                            <p class="ml-3 font-medium font-poppins"> {{$product->Product_Code }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-col sm:w-2/3 md:ml-3 order-first sm:order-none ">
                                    <div class="py-3">
                                        <h2 class="text-4xl font-poppins font-bold text-top-color">Description</h2>
                                        <div class="border-2 w-20 border-top-color my-3"></div>
                                        <p>
                                            {{$product->Description}}
                                        </p>
                                    </div>
                                    <div class="py-3">
                                        <h2 class="text-4xl font-poppins font-bold text-top-color">Origin</h2>
                                        <div class="border-2 w-20 border-top-color my-3"></div>
                                        <p>
                                            {{$product->Origin}}
                                        </p>
                                    </div>
                                    <div class="py-3">
                                        <h2 class="text-4xl font-poppins font-bold text-top-color">Brand</h2>
                                        <div class="border-2 w-20 border-top-color my-3"></div>
                                        <p>
                                            {{$product->Brand}}
                                        </p>
                                    </div>
                                    <div class="py-3">
                                        <h2 class="text-4xl font-poppins font-bold text-top-color">Color</h2>
                                        <div class="border-2 w-20 border-top-color my-3"></div>
                                        <p>
                                            {{$product->Color}}
                                        </p>
                                    </div>
                                    <div class="py-3">
                                        <h2 class="text-4xl font-poppins font-bold text-top-color">Material</h2>
                                        <div class="border-2 w-20 border-top-color my-3"></div>
                                        <p>
                                            {{$product->Material}}
                                        </p>
                                    </div>


                                </div>
                            </div>

                        </div>

                    </div>

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