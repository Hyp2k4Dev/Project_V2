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
    <title>HTH</title>
    <link rel="stylesheet" href="{{ asset('css/be/product.css') }}">
</head>

<div class="container " style="padding: 100px;">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">UPDATE PRODUCT</div>
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
                            <label for="image" class="btn btn-info p-2" style="cursor: pointer;">IMAGE PRODUCT:</label>
                            <input type="file" name="image" id="image" style=" opacity: 0;width: 0.1px;height: 0.1px;position: absolute;overflow: hidden;z-index: -1;" accept="image/*" class="form-control-file">
                            @if($product->Image)
                            <img src="{{ asset($product->Image) }}" id="img-root" alt="Image Product" style="max-width: 200px; margin-top: 10px;">
                            @endif
                            <img id="imagePreview" src="#" alt="Preview" style="display: none; width: 200px; height: 100%;">
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
                            <label for="name">Name Product:</label>
                            <input type="text" name="Name_sneaker" id="name" class="form-control" value="{{ $product->Name_sneaker }}" required>

                        </div>

                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea name="Description" id="description" class="form-control auto-resize">{{ $product->Description }}</textarea>
                        </div>

                        <script>
                            function autoResizeTextarea(textarea) {
                                textarea.style.height = 'auto';
                                textarea.style.height = textarea.scrollHeight + 'px';
                            }

                            var textareas = document.querySelectorAll('.auto-resize');
                            textareas.forEach(function(textarea) {
                                autoResizeTextarea(textarea);
                                textarea.addEventListener('input', function() {
                                    autoResizeTextarea(this);
                                });
                            });
                        </script>


                        <div class="form-group">
                            <label for="brand">Brand:</label>
                            <input type="text" name="Brand" id="brand" class="form-control" value="{{ $product->Brand }}" required>
                        </div>

                        <div class="form-group">
                            <label for="color">Color:</label>
                            <input type="text" name="Color" id="color" class="form-control" value="{{ $product->Color }}" required>
                        </div>

                        <div class="form-group">
                            <label for="origin">Origin:</label>
                            <input type="text" name="Origin" id="origin" class="form-control" value="{{ $product->Origin }}" required>
                        </div>

                        <div class="form-group">
                            <label for="material">Material:</label>
                            <input type="text" name="Material" id="material" class="form-control" value="{{ $product->Material }}" required>
                        </div>

                        <div class="form-group">
                            <label for="status">Status:</label>
                            <input type="text" name="Status_Sneaker" id="status" class="form-control" value="{{ $product->Status_Sneaker }}" required>
                        </div>

                        <div class="form-group">
                            <label for="price">Price (VND):</label>
                            <input type="text" name="Price" id="price" class="form-control" value="{{ $product->Price }}" required>
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

                        <div id="sizeFormsContainer">
                            @foreach($product->sizes as $index => $size)
                            <div class="size-form">
                                <div class="form-group">
                                    <label for="size">Size:</label>
                                    <input type="text" name="sizes[{{ $index }}][size]" class="form-control" value="{{ $size->size_name }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="quantity">Quantity:</label>
                                    <input type="number" name="sizes[{{ $index }}][quantity]" class="form-control quantity-input" value="{{ $size->quantity }}" required>
                                    <span class="text-danger quantity-error" style="display: none;">Quantity must be a positive integer</span>
                                </div>
                                <button type="button" class="btn btn-danger remove-size-form">DELETE</button>
                            </div>
                            @endforeach
                        </div>
                        <button type="button" class="buttonAddSize btn-secondary btn" onclick="addSizeFormUpdate()">Add Size</button>

                        <button type="submit" class="btn btn-primary">Update</button>
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
                document.getElementById('img-root').style.display = 'none'
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
        var sizeInputs = document.querySelectorAll('.quantity-input');

        priceError.style.display = 'none';

        if (price <= 0) {
            priceError.style.display = 'block';
            hasError = true;
            event.preventDefault();
        }

        sizeInputs.forEach(function(input) {
            var quantityError = input.nextElementSibling;
            var quantity = parseInt(input.value);

            if (isNaN(quantity) || quantity <= 0) {
                quantityError.style.display = 'block';
                hasError = true;
            } else {
                quantityError.style.display = 'none';
            }
        });

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
            <label for="size">Size:</label>
            <input type="text" name="sizes[${currentIndex}][size]" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="quantity">Quantity:</label>
            <input type="number" name="sizes[${currentIndex}][quantity]" class="form-control quantity-input" required>
            <span class="text-danger quantity-error" style="display: none;">Quantity must be a positive integer</span>
        </div>
        <button type="button" class="btn btn-danger remove-size-form">Delete</button>
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