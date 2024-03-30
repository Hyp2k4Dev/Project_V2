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
                        <a href="{{ url('typography') }}">
                            <i class="pe-7s-shopbag"></i>
                            <p>Product</p>
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
                        <!-- <ul class="nav navbar-nav navbar-left">
                            <li>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-dashboard"></i>
                                    <p class="hidden-lg hidden-md">Dashboard</p>
                                </a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-globe"></i>
                                    <b class="caret hidden-sm hidden-xs"></b>
                                    <span class="notification hidden-sm hidden-xs">5</span>
                                    <p class="hidden-lg hidden-md">
                                        5 Notifications
                                        <b class="caret"></b>
                                    </p>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Notification 1</a></li>
                                    <li><a href="#">Notification 2</a></li>
                                    <li><a href="#">Notification 3</a></li>
                                    <li><a href="#">Notification 4</a></li>
                                    <li><a href="#">Another notification</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="">
                                    <i class="fa fa-search"></i>
                                    <p class="hidden-lg hidden-md">Search</p>
                                </a>
                            </li>
                        </ul> -->

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
                                    <!-- <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Separated link</a></li> -->
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
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="header" style="width: 100%; display: flex; justify-content: space-between;">
                                    <h4 class="title">List User</h4>
                                    <div class="row mb-4" style="margin-right: 10px; display: flex;">
                                        <div style="width: 50%; margin-right: 10px;">
                                            <form id="statusForm" action="{{ route('admin.userList') }}" method="GET">
                                                <div class="filter-form">
                                                    <label for="filterStatus">Filter Status:</label>
                                                    <select class="form-control" id="filterStatus" name="status">
                                                        <option value="all" {{ $status == 'all' ? 'selected' : '' }}>All</option>
                                                        <option value="activated" {{ $status == 'activated' ? 'selected' : '' }}>Activated</option>
                                                        <option value="not_activated" {{ $status == 'not_activated' ? 'selected' : '' }}>Not Activated</option>
                                                    </select>
                                                </div>
                                            </form>
                                        </div>
                                        <div style="width: 50%;">
                                            <form id="roleForm" action="{{ route('admin.userList') }}" method="GET">
                                                <div class="filter-form">
                                                    <label for="filterRole">Filter Role:</label>
                                                    <select class="form-control" id="filterRole" name="role">
                                                        <option value="all-role" {{ $role == 'all-role' ? 'selected' : '' }}>All Role</option>
                                                        <option value="Admin" {{ $role == 'Admin' ? 'selected' : '' }}>Admin</option>
                                                        <option value="Seller" {{ $role == 'Seller' ? 'selected' : '' }}>Seller</option>
                                                        <option value="User" {{ $role == 'User' ? 'selected' : '' }}>User</option>
                                                    </select>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <script>
                                        // Sử dụng sự kiện change của select để tự động gửi form khi người dùng chọn xong
                                        document.getElementById('filterStatus').addEventListener('change', function() {
                                            document.getElementById('statusForm').submit();
                                        });

                                        document.getElementById('filterRole').addEventListener('change', function() {
                                            document.getElementById('roleForm').submit();
                                        });
                                    </script>


                                </div>
                                <div class="content table-responsive table-full-width">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Address</th>
                                            <th>Phone Number</th>
                                            <th>Role</th>
                                            <th>Status</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </thead>
                                        <tbody>
                                            @foreach($users as $user)
                                            <tr>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->address }}</td>
                                                <td>{{ $user->phone_number }}</td>
                                                <td>{{ $user->role }}</td>
                                                <td>{{ $user->is_active ? 'Activated' : 'Not Activated' }}</td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <a href="{{ route('admin.editUserForm', ['user' => $user->id]) }}" class="btn btn-primary search">{{ __('Edit User') }}</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <form action="{{ route('admin.deleteUser', ['user' => $user->id]) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete the user??');">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger">{{ __('Delete User') }}</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @if($users->isEmpty())
                                            <tr>
                                                <td colspan="8">No users found.</td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </table>
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