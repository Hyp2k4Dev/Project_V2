@extends('seller-layout.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Order Management</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Customer ID</th>
                        <th>Order Date</th>
                        <th>Total Amount</th>
                        <th>Status</th>
                        <th>Status Updated At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->order_id }}</td>
                        <td>{{ $order->customer_id }}</td>
                        <td>{{ $order->order_date }}</td>
                        <td>{{ $order->total_amount }}</td>
                        <td>{{ $order->status_order }}</td>
                        <td>{{ $order->status_updated_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
