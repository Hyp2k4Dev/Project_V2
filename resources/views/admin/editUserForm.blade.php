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
                    <li class="active">
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
                    <li>
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
                        <p class="navbar-brand">User Profile</p>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="admin/userList">
                                    <p>{{ $userlogin->name }} ( {{$userlogin->role}} )</p>
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
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-md-8" style="width: 100%; ">
                            <div class="card" style="padding: 25px;">
                                <div class="card-body p-5">
                                    <a href="/admin/userList" style="display: inline-block;margin-bottom: 25px;; border: 1px solid #9A9A9A; padding: 5px 9px; color: #9A9A9A; border-radius: 25px;">
                                        <div style="display: flex; align-items: center;">
                                            <div>
                                                <i class="pe-7s-back" style="font-size: 25px;"></i>
                                            </div>
                                            <div style="margin-left: 5px;">
                                                <p style="margin: 0 !important;">BACK</p>
                                            </div>
                                        </div>
                                    </a>
                                    <form method="POST" action="{{ route('admin.editUser', ['user' => $user->id]) }}" onsubmit="return validateForm()">
                                        @csrf
                                        @method('PUT')

                                        <!-- Username -->
                                        <div class="form-group row">
                                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>
                                            <div class="col-md-6">
                                                <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" autocomplete="name" autofocus>
                                            </div>
                                        </div>

                                        <!-- Email -->
                                        <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
                                            <div class="col-md-6">
                                                <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" autocomplete="email">
                                            </div>
                                        </div>

                                        <!-- Address -->
                                        <div class="form-group row">
                                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>
                                            <div class="col-md-6">
                                                <input id="address" type="text" class="form-control" name="address" value="{{ $user->address }}" autocomplete="address">
                                            </div>
                                        </div>

                                        <!-- Phone Number -->
                                        <div class="form-group row">
                                            <label for="phone_number" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number (+84)') }}</label>
                                            <div class="col-md-6">
                                                <input id="phone_number" type="text" class="form-control" name="phone_number" value="{{ $user->phone_number }}" autocomplete="phone_number">
                                            </div>
                                        </div>

                                        <!-- Role -->
                                        <div class="form-group row">
                                            <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>
                                            <div class="col-md-6">
                                                <select name="role" id="role" class="form-control" required>
                                                    <option value="seller" {{ $user->role === 'seller' ? 'selected' : '' }}>Seller</option>
                                                    <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- is_active -->
                                        <div class="form-group row">
                                            <label for="is_active" class="col-md-4 col-form-label text-md-right">{{ __('Active Status') }}</label>
                                            <div class="col-md-6">
                                                <select name="is_active" id="is_active" class="form-control" required>
                                                    <option value="1" {{ $user->is_active == 1 ? 'selected' : '' }}>Activated</option>
                                                    <option value="0" {{ $user->is_active == 0 ? 'selected' : '' }}>Not Activated</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Submit Button -->
                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary">{{ __('Update Information') }}</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @php
                $usersallJson = str_replace('"', '\"', json_encode($usersall));
                $gmailUser = $user->email;
                $phoneUser = $user->phone_number;
                @endphp
                <script>
                    var users = "{!! $usersallJson !!}";
                    var gmailUser = "{{$gmailUser}}";
                    var phoneUser = "{{$phoneUser}}";
                    console.log(gmailUser, phoneUser)
                    users = JSON.parse(users);

                    function validateForm() {
                        var name = document.getElementById('name').value;
                        var email = document.getElementById('email').value;
                        var phoneNumber = document.getElementById('phone_number').value;
                        var address = document.getElementById('address').value;

                        // Kiểm tra Tên
                        if (name.trim() === '' || /\d/.test(name)) {
                            $.notify({
                                message: "Name cannot be empty."
                            }, {
                                type: 'danger',
                                timer: 2000
                            });
                            return false;
                        }

                        // Kiểm tra Email
                        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                        if (!emailRegex.test(email)) {
                            $.notify({
                                message: "Please enter a valid email address."
                            }, {
                                type: 'danger',
                                timer: 2000
                            });
                            return false;
                        }
                        for (var i = 0; i < users.length; i++) {
                            if (users[i].email === email && users[i].email !== gmailUser) {
                                $.notify({
                                    message: "This email address is already in use."
                                }, {
                                    type: 'danger',
                                    timer: 4000
                                });
                                return false;
                            }
                        }

                        if (address.trim() === '') {
                            $.notify({
                                message: "Address cannot be empty."
                            }, {
                                type: 'danger',
                                timer: 2000
                            });
                            return false;
                        }
                        // Kiểm tra Số Điện Thoại
                        if (phoneNumber.trim() === '' || /[^\d\s]/.test(phoneNumber)) {
                            $.notify({
                                message: "Phone number cannot be empty and must only contain numbers."
                            }, {
                                type: 'danger',
                                timer: 2000
                            });
                            return false;
                        }
                        for (var i = 0; i < users.length; i++) {
                            if (users[i].phone_number === phoneNumber && users[i].phone_number !== phoneUser) {
                                $.notify({
                                    message: "Phone number cannot be the same as any existing phone number."
                                }, {
                                    type: 'danger',
                                    timer: 2000
                                });
                                return false;
                            }
                        }

                        return true;
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
                timer: 2000
            });
        }
    });
</script>

</html>