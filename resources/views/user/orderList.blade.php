<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pending Orders</title>
    <style>
        .product-cell {
            cursor: pointer;
        }
    </style>
</head>

<body>
    <h1>Pending Orders</h1>
    <table border="1">
        <tr>
            <th>Order ID</th>
            <th>Customer Name</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Product</th>
            <th>Status</th>
            <th>View</th>
        </tr>
        @foreach ($pendingOrders as $order)
        <tr>
            <td>{{ $order->order_id }}</td>
            <td>{{ $order->customer->Name_customer }}</td>
            <td>{{ $order->customer->phone }}</td>
            <td>{{ $order->customer->address }}</td>
            <td>
                @foreach ($order->orderDetails as $detail)
                <p class="product-cell">{{ $detail->product->Name_sneaker }}</p>
                <p class="product-cell">{{ $detail->product->Quantity }}</p>
                <p class="product-cell">{{ $order->Size }}</p>
                @endforeach
            </td>
            <td>{{ $order->status_order }}</td>

        </tr>
        @endforeach
    </table>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>

</html>