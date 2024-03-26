@extends('layout.app')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pending Orders</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('css/be/showListOrder.css') }}">
</head>

<body>

    <h1 class="container">Pending Orders</h1>
    <div class="container">
        <table id="example" class="display table table table-hover">
            <thead>
                <tr>
                    <th scope="col">Order ID</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Address</th>
                    <th scope="col">Product</th>
                    <th scope="col">total</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pendingOrders as $order)
                <tr>
                    <td>{{ $order->order_id }}</td>
                    <td>{{ $order->customer->Name_customer }}</td>
                    <td>{{ $order->customer->phone }}</td>
                    <td>{{ $order->customer->address }}</td>
                    <td>
                        @foreach ($order->orderDetails as $detail)
                        <div class="item-product">
                            <p class="product-cell btn btn-light">{{ $detail->product->Name_sneaker }}</p>
                            <p class="product-cell btn btn-light"> Size: {{ $detail->size }}</p>
                            <p class="product-cell btn btn-light">Quantity: {{ $detail->quantity }}</p>
                        </div>
                        @endforeach
                    </td>
                    <td>{{ $order->total_amount }}</td>
                    <td>{{ $order->status_order }}</td>
                    <td>
                        <p class="btn btn-danger">Danger</p>
                        <p class="btn btn-success">Success</p>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="{{ asset('js/orderList.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                searching: true,
                paging: true,
                ordering: true,
                info: true,
                lengthChange: true,
                autoWidth: false,
                columnDefs: [{
                        targets: [2],
                        searchable: true
                    },
                    {
                        targets: '_all',
                        searchable: false
                    }
                ]
            });
        });
    </script>
</body>
@endsection

</html>