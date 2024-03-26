@extends('layout.app')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/all.css'>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/fontawesome.css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>HTH ADMIN</title>
    <link rel="stylesheet" href="{{ asset('css/be/product.css') }}">
</head>

<body>
    @if(session('success'))
    <div id="successMessage" class="alert alert-success">
        <i class="fa fa-check-circle success-icon"></i> {{ session('success') }}
    </div>
    @endif
    <div class="container" style="padding-top: 100px;">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header"> <a href=""></a>Add New Products</div>
                    <div class="card-body">
                        <div id="failMessage" class="alert alert-danger" style="display: none;">
                            <i class="fa fa-times-circle fail-icon"></i> Adding failed products
                        </div>

                        <form id="productForm" action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="image" class="btn btn-info p-2" style="cursor: pointer;">Image product:</label>
                                <input type="file" name="image" id="image" accept="image/*" style=" opacity: 0;width: 0.1px;height: 0.1px;position: absolute;overflow: hidden;z-index: -1;" class="form-control-file" required>
                                <img id="imagePreview" src="#" alt="Preview" style="display: none; width: 200px; height: 100%;">
                                <br>
                                <small class="form-text text-muted">Choose photos with a maximum size of 2MB and format JPG, PNG, JPEG, GIF, SVG.</small>
                            </div>
                            <script>
                                document.getElementById('image').addEventListener('change', function(event) {
                                    var file = event.target.files[0];

                                    if (file.size > 2 * 1024 * 1024) {
                                        alert('File size exceeds 2MB limit.');
                                        event.target.value = '';
                                        document.getElementById('imagePreview').src = '';
                                    } else {
                                        var reader = new FileReader();
                                        reader.onload = function(e) {
                                            document.getElementById('imagePreview').src = e.target.result;
                                            document.getElementById('imagePreview').style.display = 'block';
                                        };
                                        reader.readAsDataURL(file);
                                    }
                                });
                            </script>
                            <div class="form-group">
                                <label for="name">Name product:<span class="required">*</span></label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea name="description" id="description" class="form-control"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="brand">Brand :<span class="required">*</span></label>
                                <input type="text" name="brand" id="brand" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="color">Color:<span class="required">*</span></label>
                                <input type="text" name="color" id="color" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="origin">Origin:<span class="required">*</span></label>
                                <input type="text" name="origin" id="origin" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="material">Material:<span class="required">*</span></label>
                                <input type="text" name="material" id="material" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="status">Status:<span class="required">*</span></label>
                                <input type="text" name="status" id="status" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="price">Price (VND):<span class="required">*</span></label>
                                <input type="text" name="price" id="price" class="form-control" required>
                                <span id="priceError" class="text-danger" style="display: none;">Price is not valid</span>
                            </div>

                            <script>
                                const priceInput = document.getElementById('price');

                                priceInput.addEventListener('input', function(e) {
                                    let value = e.target.value.replace(/\D/g, '');
                                    value = formatNumber(value);
                                    e.target.value = value;
                                });

                                priceInput.addEventListener('change', function(e) {
                                    let value = e.target.value.replace(/\D/g, '');
                                    e.target.value = formatNumberForDatabase(value);
                                });

                                function formatNumber(number) {
                                    return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
                                }

                                function formatNumberForDatabase(number) {
                                    return parseInt(number, 10);
                                }
                            </script>

                            <div id="sizeForms">
                                <label for="size">Size:<span class="required">*</span></label>
                                <input type="text" name="sizes[0][size]" class="form-control" required>
                                <label for="quantity">Quantity:<span class="required">*</span></label>
                                <input type="number" name="sizes[0][quantity]" class="form-control" required>
                                <span class="text-danger" id="errorLber" style="display: none;">Invalid quantity</span>
                            </div>
                            <button type="button" class="buttonAddSize btn-secondary btn" onclick="addSizeForm()">ADD Size</button>
                            <button type="submit" class="btn btn-primary">ADD Product</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="{{ asset('js/be/product.js') }}"></script>
@endsection