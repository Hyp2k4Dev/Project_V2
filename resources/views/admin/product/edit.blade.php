@php
$currentIndex = count($product->sizes);
@endphp

@extends('layout.app')

@section('content')
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/all.css'>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/fontawesome.css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Thêm Sản Phẩm Mới</title>
    <link rel="stylesheet" href="{{ asset('css/be/product.css') }}">
</head>

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">Sửa Sản Phẩm</div>
                <div class="card-body">
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    <form id="productForm" action="{{ route('admin.product.update', ['id' => $product->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="image" class="btn btn-info p-2" style="cursor: pointer;">Ảnh Sản Phẩm:</label>
                            <input type="file" name=" image" id="image" style=" opacity: 0;width: 0.1px;height: 0.1px;position: absolute;overflow: hidden;z-index: -1;" accept="image/*" class="form-control-file">
                            @if($product->Image)
                            <img src="{{ asset($product->Image) }}" id="imagePreview" alt="Ảnh Sản Phẩm" style="max-width: 200px; margin-top: 10px;">
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="name">Tên Sản Phẩm:</label>
                            <input type="text" name="Name_sneaker" id="name" class="form-control" value="{{ $product->Name_sneaker }}" required>
                        </div>

                        <div class="form-group">
                            <label for="brand">Thương Hiệu:</label>
                            <input type="text" name="Brand" id="brand" class="form-control" value="{{ $product->Brand }}" required>
                        </div>

                        <div class="form-group">
                            <label for="color">Màu Sắc:</label>
                            <input type="text" name="Color" id="color" class="form-control" value="{{ $product->Color }}" required>
                        </div>

                        <div class="form-group">
                            <label for="origin">Xuất Xứ:</label>
                            <input type="text" name="Origin" id="origin" class="form-control" value="{{ $product->Origin }}" required>
                        </div>

                        <div class="form-group">
                            <label for="material">Chất Liệu:</label>
                            <input type="text" name="Material" id="material" class="form-control" value="{{ $product->Material }}" required>
                        </div>

                        <div class="form-group">
                            <label for="status">Tình Trạng:</label>
                            <input type="text" name="Status_Sneaker" id="status" class="form-control" value="{{ $product->Status_Sneaker }}" required>
                        </div>

                        <div class="form-group">
                            <label for="price">Giá (VND):</label>
                            <input type="text" name="Price" id="price" class="form-control" value="{{ $product->Price }}" required>
                        </div>

                        <div id="sizeFormsContainer">
                            @foreach($product->sizes as $index => $size)
                            <div class="size-form">
                                <div class="form-group">
                                    <label for="size">Kích Cỡ:</label>
                                    <input type="text" name="sizes[{{ $index }}][size]" class="form-control" value="{{ $size->size_name }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="quantity">Số Lượng:</label>
                                    <input type="number" name="sizes[{{ $index }}][quantity]" class="form-control" value="{{ $size->quantity }}" required>
                                </div>
                                <button type="button" class="btn btn-danger remove-size-form">Xoá</button>
                            </div>
                            @endforeach
                        </div>
                        <button type="button" class="buttonAddSize btn-secondary btn" onclick="addSizeFormUpdate()">Thêm Size Khác</button>

                        <button type="submit" class="btn btn-primary">Cập Nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('image').onchange = function(evt) {
        var tgt = evt.target || window.event.srcElement,
            files = tgt.files;

        if (FileReader && files && files.length) {
            var fr = new FileReader();
            fr.onload = function() {
                document.getElementById('image').src = fr.result;
                document.getElementById('image').style.display = 'block';
            }
            fr.readAsDataURL(files[0]);
        }
    }

    document.getElementById('productForm').addEventListener('submit', function(event) {
        var hasError = false;
        var formSubmitted = false;

        if (formSubmitted) {
            event.preventDefault();
            return;
        }

        var price = document.getElementById('price').value;
        var priceError = document.getElementById('priceError');
        var sizeForms = document.querySelectorAll('#sizeForms input[type="number"]');

        priceError.style.display = 'none';

        if (price <= 0) {
            console.log(price)
            priceError.style.display = 'block';
            hasError = true;
            event.preventDefault();
        }

        for (var i = 0; i < sizeForms.length; i++) {
            var quantityError = document.getElementById('errorLber');
            var quantity = sizeForms[i].value;
            if (!isNaturalNumber(quantity)) {
                quantityError.style.display = 'block';
                hasError = true;
            }
        }

        if (!hasError) {
            formSubmitted = true;
            return;
        } else {
            event.preventDefault();
            return;
        }
    });


    function isNaturalNumber(n) {
        return n % 1 === 0 && n > 0;
    }

    let currentIndex = '{{ $currentIndex }}';

    function addSizeFormUpdate() {
        currentIndex++;

        const sizeFormsContainer = document.getElementById('sizeFormsContainer');
        const sizeFormHtml = `
            <div class="size-form">
                <div class="form-group">
                    <label for="size">Kích Cỡ:</label>
                    <input type="text" name="sizes[${currentIndex}][size]" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="quantity">Số Lượng:</label>
                    <input type="number" name="sizes[${currentIndex}][quantity]" class="form-control" required>
                    <span class="text-danger" id="errorLber[${value}]" style="display: none;">Số lượng không hợp lệ</span>
                </div>
                <button type="button" class="btn btn-danger remove-size-form">Xoá</button>
            </div>
        `;
        sizeFormsContainer.insertAdjacentHTML('beforeend', sizeFormHtml);
    }

    document.addEventListener('click', function(event) {
        if (event.target.classList.contains('remove-size-form')) {
            const sizeForm = event.target.closest('.size-form');
            if (sizeForm) {
                sizeForm.parentNode.removeChild(sizeForm);
            }
        }
    });
</script>
<!-- <script src="{{ asset('js/be/product.js') }}"></script> -->
@endsection