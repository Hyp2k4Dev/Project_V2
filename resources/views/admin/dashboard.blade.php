@extends('layout.app')

@section('content')

<link rel="shortcut icon" href="{{asset('images/favicon.ico')}}" type="image/x-icon">
<style>
    .product-image {
        transition: transform 0.2s;
    }

    .product-image:hover {
        transform: scale(1.1);
    }

    a {
        text-decoration: none;
    }

    .edit-btn {
        text-align: center;
        display: inline-block;
        width: 70px;
        border-radius: 5px;
        background-color: green;
        color: white;
        border: 1px solid green;
        padding: 5px 5px 9px 5px;
    }

    .edit-btn:hover {
        background-color: #218838;
    }

    .delete-btn {
        display: inline-block;
        padding: 5px 10px;
        border-radius: 5px;
        background-color: #dc3545;
        color: white;
        border: 1px solid #dc3545;
        transition: background-color 0.3s;
    }

    .delete-btn:hover {
        background-color: #c82333;
    }

    .search-container {
        margin-bottom: 20px;
    }

    .search-input {
        width: 70%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    .search-button {
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        background-color: #4CAF50;
        color: white;
    }

    .table th,
    .table td {
        text-align: center;
    }
</style>
<link rel="shortcut icon" href="{{asset('images/favicon.ico')}}" type="image/x-icon">

<div class="container">
    <div class="row mt-4">
        <div class="col-md-12">
            <h2>Search</h2>
            <input type="text" id="searchInput" placeholder="Search products...">
            <div class="input-group-append">
                <button class="btn-search" type="button" id="searchButton">Search</button>
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
                        <td><img src="{{ asset($product->Image) }}" class="product-image" alt="Product Image" style="width: 100px; height: 100%;"></td>
                        <td>
                            <a href="{{ route('admin.product.edit', $product->id) }}" class="edit-btn">Edit</a>
                            <form action="{{ route('admin.product.destroy', $product->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Bạn có chắc chắn muốn xóa sản phẩm chứ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn">Delete</button>
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
    document.getElementById('searchButton').addEventListener('click', function() {
        let searchInput = document.getElementById('searchInput').value;
        window.location.href = '/admin/dashboard?search=' + searchInput;
    });
</script>
@endpush