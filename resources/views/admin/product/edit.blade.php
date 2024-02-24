@extends('layout.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">Sửa Sản Phẩm</div>

                <div class="card-body">
                    <form action="{{ route('admin.product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Tên Sản Phẩm:</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $product->Name_sneaker }}" required>
                        </div>

                        <div class="form-group">
                            <label for="quantity">Số Lượng:</label>
                            <input type="number" name="quantity" id="quantity" class="form-control" value="{{ $product->Quantity }}" required>
                        </div>

                        <div class="form-group">
                            <label for="brand">Thương Hiệu:</label>
                            <input type="text" name="brand" id="brand" class="form-control" value="{{ $product->Brand }}" required>
                        </div>

                        <div class="form-group">
                            <label for="color">Màu Sắc:</label>
                            <input type="text" name="color" id="color" class="form-control" value="{{ $product->Color }}" required>
                        </div>

                        <div class="form-group">
                            <label for="origin">Xuất Xứ:</label>
                            <input type="text" name="origin" id="origin" class="form-control" value="{{ $product->Origin }}" required>
                        </div>

                        <div class="form-group">
                            <label for="material">Chất Liệu:</label>
                            <input type="text" name="material" id="material" class="form-control" value="{{ $product->Material }}" required>
                        </div>

                        <div class="form-group">
                            <label for="status">Tình Trạng:</label>
                            <input type="text" name="status" id="status" class="form-control" value="{{ $product->Status_Sneaker }}" required>
                        </div>

                        <div class="form-group">
                            <label for="product_code">Mã Sản Phẩm:</label>
                            <input type="text" name="product_code" id="product_code" class="form-control" value="{{ $product->Product_Code }}" required>
                        </div>

                        <div class="form-group">
                            <label for="price">Giá:</label>
                            <input type="number" name="price" id="price" class="form-control" value="{{ $product->Price }}" required>
                        </div>

                        <div class="form-group">
                            <label for="size">Kích Cỡ:</label>
                            <input type="text" name="size" id="size" class="form-control" value="{{ $product->Size }}" required>
                        </div>

                        <div class="form-group">
                            <label for="image">Ảnh Sản Phẩm:</label>
                            <input type="file" name="image" id="image" class="form-control-file">
                            <small class="form-text text-muted">Chọn ảnh có kích thước tối đa 2MB và định dạng JPG, PNG, JPEG, GIF, SVG.</small>
                        </div>

                        <button type="submit" class="btn btn-primary">Cập Nhật Sản Phẩm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection