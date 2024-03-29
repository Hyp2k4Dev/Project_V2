@extends('layout.app')

@section('content')

<link rel="stylesheet" href="{{ asset('css/be/dashboard.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<section class="section-products pt-5">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-md-8 col-lg-6">
                <div class="header">
                    <h2>Products List</h2>
                    <a class="addProduct" href="{{ route('admin.product.add-product') }}">Add product</a>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($products as $product)
            <div class="col-md-6 col-lg-4 col-xl-3">
                <div id="product-{{ $product->id }}" class="single-product">
                    <div class="part-1">
                        <img src="{{ asset($product->Image) }}" class="product-image" alt="Product Image" style="width: 100%; height: 100%;">
                        <ul>
                            <li>
                                <form action="{{ route('admin.product.edit', $product->id) }}" class="edit-btn"><button type="submit" class="edit-btn">Edit</button></form>
                            </li>
                            <li>
                                <form action="{{ route('admin.product.destroy', $product->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Bạn có chắc chắn muốn xóa sản phẩm chứ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-btn">Delete</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                    <div class="part-2">
                        <h5 class="product-title">{{ $product->Name_sneaker }}</h5>
                        <h4 class="product-price">{{ number_format($product->Price, 0, ',', '.') }}<span style="color: red;"> đ</span></h4> <br>
                        <button class="btn btn-info btn-view" onclick="showProductDetail(<?php echo $product->id; ?>)">View</button>
                    </div>
                </div>
            </div>
            <div class="infor " id="product-detail-overlay-{{ $product->id }}">
                <div class="nav-infor container">
                    <h2>Product Details</h2>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td><strong>Name:</strong></td>
                                <td>{{ $product->Name_sneaker }}</td>
                            </tr>
                            <tr>
                                <td><strong>Description:</strong></td>
                                <td style="white-space: pre-line;">{{ $product->Description }}</td>
                            </tr>
                            <tr>
                                <td><strong>Brand:</strong></td>
                                <td>{{ $product->Brand }}</td>
                            </tr>
                            <tr>
                                <td colspan="2"><strong>Sizes </strong> <i class="bi bi-chevron-double-down"></i></td>
                            </tr>
                            @foreach($product->sizes as $size)
                            <tr>
                                <td>{{ $size->size_name }}</td>
                                <td><strong>Quantity:</strong> {{ $size->quantity }}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td><strong>Product Code:</strong></td>
                                <td>{{ $product->Product_Code }}</td>
                            </tr>
                            <tr>
                                <td><strong>Price:</strong></td>
                                <td>{{ number_format($product->Price, 0, ',', '.') }} đ</td>
                            </tr>
                            <tr>
                                <td><strong>Image:</strong></td>
                                <td><img src="{{ asset($product->Image) }}" alt="Product Image" style="max-width: 200px;"></td>
                            </tr>
                            <tr>
                                <td><strong>Status:</strong></td>
                                <td>{{ $product->Status_Sneaker }}</td>
                            </tr>
                            <tr>
                                <td><strong>Color:</strong></td>
                                <td>{{ $product->Color }}</td>
                            </tr>
                            <tr>
                                <td><strong>Origin:</strong></td>
                                <td>{{ $product->Origin }}</td>
                            </tr>
                            <tr>
                                <td><strong>Material:</strong></td>
                                <td>{{ $product->Material }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <button class="btn btn-danger btn-view close-btn" data-product-id="{{ $product->id }}">Close</button>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
@endsection


<script>
    function showProductDetail(productId) {
        var inforElement = document.getElementById("product-detail-overlay-" + productId);
        inforElement.style.visibility = "visible";
    }

    document.addEventListener('DOMContentLoaded', function() {
        const closeBtns = document.querySelectorAll('.close-btn');

        closeBtns.forEach(function(closeBtn) {
            closeBtn.addEventListener('click', function(event) {
                const productId = event.target.dataset.productId;
                const productDetailOverlay = document.getElementById('product-detail-overlay-' + productId);
                productDetailOverlay.style.visibility = 'hidden';
            });
        });
    });
</script>