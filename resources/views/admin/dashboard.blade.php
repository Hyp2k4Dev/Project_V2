@extends('layout.app')

@section('content')

<style>
    /* Đoạn CSS mới */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap');

    body {
        font-family: "Poppins", sans-serif;
        color: #444444;
    }

    a,
    a:hover {
        text-decoration: none;
        color: inherit;
    }

    .section-products {
        padding: 80px 0 54px;
    }

    .section-products .header {
        margin-bottom: 50px;
    }

    .section-products .header h3 {
        font-size: 1rem;
        color: #fe302f;
        font-weight: 500;
    }

    .section-products .header h2 {
        font-size: 2.2rem;
        font-weight: 400;
        color: #444444;
    }

    .section-products .single-product {
        margin-bottom: 26px;
        border: 1px solid #ccc;
        border-radius: 5px;
        overflow: hidden;
        text-align: center;
        /* Căn giữa các phần tử */
    }

    .section-products .single-product .part-1 {
        position: relative;
        height: 290px;
        max-height: 290px;
        margin-bottom: 20px;
        overflow: hidden;
    }

    .product-image {
        transition: transform 0.3s ease-in-out;
    }

    .product-image:hover {
        transform: scale(1.1);
    }

    .section-products .single-product .part-1::before {
        position: absolute;
        content: "";
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
        transition: all 0.3s;
    }

    .section-products .single-product:hover .part-1::before {
        transform: scale(1.2, 1.2) rotate(5deg);
    }

    .section-products #product-1 .part-1::before {
        background: url("https://i.ibb.co/L8Nrb7p/1.jpg") no-repeat center;
        background-size: cover;
        transition: all 0.3s;
    }

    .section-products .single-product .part-1 .discount,
    .section-products .single-product .part-1 .new {
        position: absolute;
        top: 15px;
        left: 50%;
        transform: translateX(-50%);
        /* Di chuyển vào giữa */
        color: #ffffff;
        background-color: #fe302f;
        padding: 2px 8px;
        text-transform: uppercase;
        font-size: 0.85rem;
    }

    .section-products .single-product .part-1 .new {
        left: 50%;
        transform: translateX(-50%);
        background-color: #444444;
    }

    .section-products .single-product .part-1 ul {
        position: absolute;
        bottom: -41px;
        left: 50%;
        transform: translateX(-50%);
        margin: 0;
        padding: 0;
        list-style: none;
        opacity: 0;
        transition: bottom 0.5s, opacity 0.5s;
    }

    .section-products .single-product:hover .part-1 ul {
        bottom: 30px;
        opacity: 1;
    }

    .section-products .single-product .part-1 ul li {
        display: inline-block;
        margin-right: 4px;
    }

    .section-products .single-product .part-1 ul li a {
        display: inline-block;
        width: 40px;
        height: 40px;
        line-height: 40px;
        background-color: #ffffff;
        color: #444444;
        text-align: center;
        box-shadow: 0 2px 20px rgb(50 50 50 / 10%);
        transition: color 0.2s;
    }

    .section-products .single-product .part-1 ul li a:hover {
        color: #fe302f;
    }

    .section-products .single-product .part-2 {
        text-align: center;
        /* Căn giữa các phần tử */
    }

    .section-products .single-product .part-2 .product-title {
        font-size: 1rem;
    }

    .section-products .single-product .part-2 h4 {
        display: inline-block;
        font-size: 1rem;
    }

    .section-products .single-product .part-2 .product-old-price {
        position: relative;
        padding: 0 7px;
        margin-right: 2px;
        opacity: 0.6;
    }

    .section-products .single-product .part-2 .product-old-price::after {
        position: absolute;
        content: "";
        top: 50%;
        left: 0;
        width: 100%;
        height: 1px;
        background-color: #444444;
        transform: translateY(-50%);
    }

    .edit-btn {
        width: 100px;
        color: white;
        border-radius: 5px;
        border: none;
        background-color: #339900;
    }

    .delete-btn {
        width: 100px;
        color: white;
        border-radius: 5px;
        border: none;
        background-color: red;
    }

    .edit-btn:hover {
        background-color: green;
    }

    .delete-btn:hover {
        background-color: darkred;
    }

    h5 {
        font-size: 24px;
    }

    .addProduct {
        color: white;
        background-color: #339900;
        padding: 5px;
        border: 1px solid grey;
        border-radius: 5px;
    }
    .addProduct:hover {
        background-color: darkgreen;
        color: white;
    }
</style>

<section class="section-products">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-md-8 col-lg-6">
                <div class="header">
                    <h3>Featured Product</h3>
                    <h2>Products List</h2>
                    <a class="addProduct" href="{{ route('admin.product.add_image') }}">Thêm sản phẩm</a>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Single Product -->
            @foreach($products as $product)
            <div class="col-md-6 col-lg-4 col-xl-3">
                <div id="product-{{ $product->id }}" class="single-product">
                    <!-- Phần HTML mới của bạn -->
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
                        <h4 class="product-price">{{ $product->Price }}<span style="color: red;">đ</span></h4>
                        <p class="product-quantity">Quantity: {{ $product->Quantity}}</p>
                        <p class="product-size">Size: {{ $product->Size}}</p>
                        <p class="product-code">Product Code: {{$product->Product_Code}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
    document.getElementById('searchButton').addEventListener('click', function() {
        let searchInput = document.getElementById('searchInput').value;
        window.location.href = '/admin/dashboard?search=' + searchInput;
    });
</script>
@endpush