@extends('layout.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">Thêm Sản Phẩm Mới</div>

                <div class="card-body">
                    <<<<<<< HEAD <!-- Thông báo -->
                        <div id="successMessage" class="alert alert-success" style="display: none;"></div>

                        <div id="failMessage" class="alert alert-danger" style="display: none;"></div>

                        =======
                        >>>>>>> 454c109b4d36eab69d0160f307f0473fb84153f9
                        <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="name">Tên Sản Phẩm:</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Mô Tả:</label>
                                <textarea name="description" id="description" class="form-control" required></textarea>
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
                                <input type="text" name="product_code" id="product_code" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="price">Giá:</label>
                                <input type="number" name="price" id="price" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="size">Kích Cỡ:</label>
                                <input type="text" name="size" id="size" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="image">Ảnh Sản Phẩm:</label>
                                <input type="file" name="image" id="image" accept="image/*" class="form-control-file" required>

                                <small class="form-text text-muted">Chọn ảnh có kích thước tối đa 2MB và định dạng JPG, PNG, JPEG, GIF, SVG.</small>
                            </div>

                            <button type="submit" class="btn btn-primary">Thêm Sản Phẩm</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
<<<<<<< HEAD @endsection @push('scripts') <script>
    // Hiển thị thông báo và ẩn sau 3 giây
    function showSuccessMessage(message) {
    var successMessage = document.getElementById('successMessage');
    successMessage.innerHTML = message;
    successMessage.style.display = 'block';
    setTimeout(function() {
    successMessage.style.display = 'none';
    }, 3000);
    }

    // Xử lý khi submit form
    document.querySelector('form').addEventListener('submit', function(event) {
    // Hiển thị thông báo khi thêm sản phẩm thành công
    showSuccessMessage('Thêm sản phẩm thành công.');

    // Bạn cần thêm mã xử lý thêm sản phẩm ở đây

    // Ngăn chặn form submit mặc định
    event.preventDefault();
    });

    function showFailMessage(message) {
    var failMessage = document.getElementById('failMessage');
    failMessage.innerHTML = message;
    failMessage.style.display = 'block';
    setTimeout(function() {
    failMessage.style.display = 'none';
    }, 3000);
    }

    // Xử lý khi submit form
    document.querySelector('form').addEventListener('submit', function(event) {
    // Kiểm tra điều kiện nếu có lỗi
    var hasError = true; // Giả sử có lỗi để minh họa

    if (hasError) {
    // Hiển thị thông báo thất bại nếu có lỗi
    showFailMessage('Thêm sản phẩm không thành công.');

    // Ngăn chặn form submit mặc định
    event.preventDefault();
    } else {
    // Hiển thị thông báo thành công nếu không có lỗi
    showSuccessMessage('Thêm sản phẩm thành công.');

    // Bạn cần thêm mã xử lý thêm sản phẩm ở đây
    }
    });
    </script>
    @endpush
    =======
    @endsection
    >>>>>>> 454c109b4d36eab69d0160f307f0473fb84153f9