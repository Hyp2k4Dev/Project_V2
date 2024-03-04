@extends('layout.app')

@section('content')
<style>
    a {
        text-decoration: none;
    }

    .edit-btn {
        border-radius: 5px;
        background-color: green;
        color: white;
        border: 1px solid green;
        padding: 5px 5px 9px 5px;
    }
</style>


<div class="container">
    <div class="hidden" id="data" data-product="{{ $products }}"></div>
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
            <h2>Product List</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Brand</th>
                        <th>Color</th>
                        <th>Origin</th>
                        <th>Material</th>
                        <th>Status</th>
                        <th>Product Code</th>
                        <th>Price</th>
                        <th>Size</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->Name_sneaker }}</td>
                        <td>{{ $product->Quantity }}</td>
                        <td>{{ $product->Brand }}</td>
                        <td>{{ $product->Color }}</td>
                        <td>{{ $product->Origin }}</td>
                        <td>{{ $product->Material }}</td>
                        <td>{{ $product->Status_Sneaker }}</td>
                        <td>{{ $product->Product_Code }}</td>
                        <td>{{ $product->Price }}</td>
                        <td>{{ $product->Size }}</td>
                        <td><img src="{{ asset($product->Image) }}" alt="Product Image" style="width: 100px; height: 100px;"></td>
                        <td>
                            <a href="{{ route('admin.product.edit', $product->id) }}" class="edit-btn">Edit</a>
                            <form action="{{ route('admin.product.destroy', $product->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
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

    const dataEl = document.getElementById('data');
    console.log(dataEl);
</script>
</script>

@endpush