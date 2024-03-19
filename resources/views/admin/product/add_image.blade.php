@extends('layout.app')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/all.css'>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/fontawesome.css'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Thêm Sản Phẩm Mới</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Raleway:400,700');

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }


        .card-header {
            background-color: #007bff;
            color: white;
        }

        .form-group label {
            font-weight: bold;
            font-family: 'Archivo', sans-serif;
        }

        #imagePreview {
            display: none;
            width: 200px;
            height: auto;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .success-icon {
            color: #28a745;
        }

        .fail-icon {
            color: #dc3545;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            margin-bottom: 5px;
        }

        .form-control {
            width: 100%;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .form-control:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .btn-primary {
            padding: 10px 20px;
            border-radius: 5px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .alert {
            margin-top: 20px;
            display: none;
        }

        .required {
            color: red;
            margin-left: 3px;
        }

        /* Thêm CSS để tạo responsive layout */
        @media (min-width: 576px) {
            .offset-md-2 {
                margin-left: 16.66667%;
            }

            .col-md-8 {
                flex: 0 0 66.66667%;
                max-width: 66.66667%;
            }
        }
    </style>
</head>
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header"> <a href=""></a>Thêm Sản Phẩm Mới</div>

                <div class="card-body">
                    <div id="successMessage" class="alert alert-success" style="display: none;">
                        <i class="fa fa-check-circle success-icon"></i> Thêm sản phẩm thành công
                    </div>

                    <div id="failMessage" class="alert alert-danger" style="display: none;">
                        <i class="fa fa-times-circle fail-icon"></i> Thêm sản phẩm thất bại
                    </div>

                    <form id="productForm" action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="image">Ảnh Sản Phẩm:</label>
                            <input type="file" name="image" id="image" accept="image/*" class="form-control-file" required>
                            <img id="imagePreview" src="#" alt="Preview" style="display: none; width: 200px; height: 100%;">
                            <br>
                            <small class="form-text text-muted">Chọn ảnh có kích thước tối đa 2MB và định dạng JPG, PNG, JPEG, GIF, SVG.</small>
                        </div>

                        <div class="form-group">
                            <label for="name">Tên Sản Phẩm:<span class="required">*</span></label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Mô Tả:</label>
                            <textarea name="description" id="description" class="form-control"></textarea>
                        </div>

                        <!-- <div class="form-group">
                            <label for="quantity">Số Lượng:<span class="required">*</span></label>
                            <input type="number" name="quantity" id="quantity" class="form-control" required>
                            <span id="quantityError" class="text-danger" style="display: none;">Số lượng không hợp lệ</span>
                        </div> -->

                        <div class="form-group">
                            <label for="brand">Thương Hiệu:<span class="required">*</span></label>
                            <input type="text" name="brand" id="brand" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="color">Màu Sắc:<span class="required">*</span></label>
                            <input type="text" name="color" id="color" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="origin">Xuất Xứ:<span class="required">*</span></label>
                            <input type="text" name="origin" id="origin" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="material">Chất Liệu:<span class="required">*</span></label>
                            <input type="text" name="material" id="material" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="status">Tình Trạng:<span class="required">*</span></label>
                            <input type="text" name="status" id="status" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="product_code">Mã Sản Phẩm:<span class="required">*</span></label>
                            <input type="text" name="product_code" id="product_code" class="form-control" placeholder="This code must be 'HTH-XXXXX' " required>
                        </div>

                        <div class="form-group">
                            <label for="price">Giá:<span class="required">*</span></label>
                            <input type="number" name="price" id="price" class="form-control" required>
                            <span id="priceError" class="text-danger" style="display: none;">Giá không hợp lệ</span>
                        </div>
                        <div id="sizeForms">
                            <label for="size">Kích Cỡ:<span class="required">*</span></label>
                            <input type="text" name="size" id="size" class="form-control" required>
                            <span id="sizeError" class="text-danger" style="display: none;">Size không hợp lệ</span>

                            <label for="quantity">Số Lượng:<span class="required">*</span></label>
                            <input type="number" name="quantity" id="quantity" class="form-control" required>
                            <span id="quantityError" class="text-danger" style="display: none;">Số lượng không hợp lệ</span>
                        </div>
                        <button type="button" onclick="addSizeForm()">Thêm Size Khác</button>
                        <button type="submit" class="btn btn-primary">Thêm Sản Phẩm</button>
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

        // FileReader support
        if (FileReader && files && files.length) {
            var fr = new FileReader();
            fr.onload = function() {
                document.getElementById('imagePreview').src = fr.result;
                document.getElementById('imagePreview').style.display = 'block';
            }
            fr.readAsDataURL(files[0]);
        }
    }

    document.getElementById('productForm').addEventListener('submit', function(event) {
        event.preventDefault();
        var form = this;
        var price = document.getElementById('price').value;
        var quantity = document.getElementById('quantity').value;
        var size = document.getElementById('size').value;
        var priceError = document.getElementById('priceError');
        var quantityError = document.getElementById('quantityError');
        var sizeError = document.getElementById('sizeError');

        priceError.style.display = 'none';
        quantityError.style.display = 'none';
        sizeError.style.display = 'none';

        // Check conditions
        if (price < 0 || quantity < 0 || size < 0 || size > 50) {
            if (price < 0) {
                priceError.style.display = 'block';
            }
            if (quantity < 0) {
                quantityError.style.display = 'block';
            }
            if (size < 0) {
                sizeError.style.display = 'block';
            }
            if (size > 50) {
                sizeError.style.display = 'block';
            }
            return;
        }

        fetch(form.action, {
                method: form.method,
                body: new FormData(form)
            })
            .then(response => {
                if (response.ok) {
                    document.getElementById('successMessage').style.display = 'block';
                    // Show success message
                    var confirmation = confirm('Bạn có muốn thêm sản phẩm khác không?');
                    if (!confirmation) {
                        window.location.href = "{{ route('admin.dashboard') }}";
                    } else {
                        form.reset();
                        document.getElementById('imagePreview').style.display = 'none';
                    }
                } else {
                    document.getElementById('failMessage').style.display = 'block';
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });

    function addSizeForm() {
        const sizeFormsContainer = document.getElementById('sizeForms');
        const sizeFormCount = sizeFormsContainer.querySelectorAll('.form-group').length + 1;
        const sizeFormHtml = `
                <div class="form-group" id="sizeForm${sizeFormCount}">
                    <label for="size${sizeFormCount}">Kích Cỡ:<span class="required">*</span></label>
                    <input type="text" name="sizes[${sizeFormCount}][size]" class="form-control" required>
                    <label for="quantity${sizeFormCount}">Số Lượng:<span class="required">*</span></label>
                    <input type="number" name="sizes[${sizeFormCount}][quantity]" class="form-control" required>
                    <span class="text-danger" style="display: none;">Số lượng không hợp lệ</span>
                    <button type="button" onclick="removeSizeForm(${sizeFormCount})">Xoá</button>
                </div>
            `;
        sizeFormsContainer.insertAdjacentHTML('beforeend', sizeFormHtml);
    }

    function removeSizeForm(sizeFormId) {
        const sizeForm = document.getElementById(`sizeForm${sizeFormId}`);
        if (sizeForm) {
            sizeForm.parentNode.removeChild(sizeForm);
        }
    }
</script>
@endsection