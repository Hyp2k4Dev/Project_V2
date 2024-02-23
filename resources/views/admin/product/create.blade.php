@extends('layout.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">Thêm Sản Phẩm Mới</div>

                <div class="card-body">
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

                        <button type="submit" class="btn btn-primary">Thêm Sản Phẩm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection