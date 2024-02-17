@extends('layout.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h2>Order Status</h2>
            <ul class="list-group">
                @foreach($orderStatus as $status => $count)
                <li class="list-group-item">{{ ucfirst($status) }}: {{ $count }}</li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-6">
            <h2>Notifications</h2>
            <div class="row mt-4">
                <div class="col-md-12">
                    <h2>Customer Messages</h2>
                    <ul class="list-group">
                        @foreach($customerMessages as $message)
                        <li class="list-group-item">{{ $message }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-12">
                    <h2>Customer Reviews</h2>
                    <ul class="list-group">
                        @foreach($customerReviews as $review)
                        <li class="list-group-item">{{ $review }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <h2>Order List</h2>
            <select id="orderStatusFilter" class="form-select mb-3">
                <option value="">All</option>
                @foreach($orderStatus as $status => $count)
                <option value="{{ $status }}">{{ ucfirst($status) }}</option>
                @endforeach
            </select>
            <table class="table">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Status</th>
                        <th>Total</th>
                        <!-- Thêm các cột khác nếu cần -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($order as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ ucfirst($order->status) }}</td>
                        <td>{{ $order->total }}</td>
                        <!-- Thêm các dữ liệu khác tương ứng với từng cột -->
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


</div>
@endsection

@push('scripts')
<script>
    document.getElementById('orderStatusFilter').addEventListener('change', function() {
        let status = this.value;
        if (status) {
            window.location.href = '/admin/dashboard?status=' + status;
        } else {
            window.location.href = '/admin/dashboard';
        }
    });
</script>
@endpush