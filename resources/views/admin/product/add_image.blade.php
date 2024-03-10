@extends('layout.app')

@section('content')
<style>
    .card-header {
        background-color: #007bff;
        color: white;
    }

    .form-group label {
        font-weight: bold;
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
</style>
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

                    <form id="productForm" action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="image">Ảnh Sản Phẩm:</label>
                            <input type="file" name="image" id="image" accept="image/*" class="form-control-file" required>
                            <img id="imagePreview" src="#" alt="Preview" style="display: none; width: 200px; height: 100%;">
                            <br>
                            <small class="form-text text-muted">Chọn ảnh có kích thước tối đa 2MB và định dạng JPG, PNG, JPEG, GIF, SVG.</small>
                        </div>

                        <div class="form-group">
                            <label for="name">Tên Sản Phẩm:</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Mô Tả:</label>
                            <textarea name="description" id="description" class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="quantity">Số Lượng:</label>
                            <input type="number" name="quantity" id="quantity" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="brand">Thương Hiệu:</label>
                            <input type="text" name="brand" id="brand" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="color">Màu Sắc:</label>
                            <input type="text" name="color" id="color" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="origin">Xuất Xứ:</label>
                            <input type="text" name="origin" id="origin" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="material">Chất Liệu:</label>
                            <input type="text" name="material" id="material" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="status">Tình Trạng:</label>
                            <input type="text" name="status" id="status" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="product_code">Mã Sản Phẩm:</label>
                            <input type="text" name="product_code" id="product_code" class="form-control" placeholder="This code must be 'HTH-XXXXX' " required>
                        </div>

                        <div class="form-group">
                            <label for="price">Giá:</label>
                            <input type="number" name="price" id="price" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="size">Kích Cỡ:</label>
                            <input type="text" name="size" id="size" class="form-control" required>
                        </div>


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
        // Sử dụng AJAX hoặc fetch API để gửi biểu mẫu
        fetch(form.action, {
                method: form.method,
                body: new FormData(form)
            })
            .then(response => {
                if (response.ok) {
                    document.getElementById('successMessage').style.display = 'block';
                    // Hiển thị thông báo thành công
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
</script>
@endsection