@extends('layout.app')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css?family=Raleway:400,700');

    * {
        font-family: Raleway, sans-serif;
    }

    body {
        background: white;

    }

    .form-control:focus {
        box-shadow: none;
        border-color: #BA68C8;
    }

    .profile-button {
        background: rgb(99, 39, 120);
        box-shadow: none;
        border: none;
    }

    .profile-button:hover {
        background: #682773;
    }

    .profile-button:focus {
        background: #682773;
        box-shadow: none;
    }

    .profile-button:active {
        background: #682773;
        box-shadow: none;
    }

    .back:hover {
        color: #682773;
        cursor: pointer;
    }

    .labels {
        font-size: 11px;
    }

    .add-experience:hover {
        background: #BA68C8;
        color: #fff;
        cursor: pointer;
        border: solid 1px #BA68C8;
    }

.row{
    border: 1px solid grey;
    border-radius: 5px;
}
.btn-submit{
    color: white;
    width: 150px;
    justify-content: center;
    padding: 5px;
    background-color: purple;
    border: #682773;
    border-radius: 5px;
}
.btn-submit:hover{
    background-color: darkviolet;
    
}
</style>
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img id="imagePreview" src="{{ asset($product->Image) }}" alt="Preview" style="width: 200px; height: 100%; border-radius:50%">
            </div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Product Edit</h4>
                </div>
                <form method="POST" action="{{ route('admin.product.update', $product->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">{{ __('Name') }}</label>
                        <input id="name" type="text" class="form-control" name="Name_sneaker" value="{{ $product->Name_sneaker }}" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="quantity">{{ __('Quantity') }}</label>
                        <input id="quantity" type="number" class="form-control" name="Quantity" value="{{ $product->Quantity }}" required>
                    </div>

                    <div class="form-group">
                        <label for="brand">{{ __('Brand') }}</label>
                        <input id="brand" type="text" class="form-control" name="Brand" value="{{ $product->Brand }}" required>
                    </div>

                    <div class="form-group">
                        <label for="color">{{ __('Color') }}</label>
                        <input id="color" type="text" class="form-control" name="Color" value="{{ $product->Color }}" required>
                    </div>

                    <div class="form-group">
                        <label for="origin">{{ __('Origin') }}</label>
                        <input id="origin" type="text" class="form-control" name="Origin" value="{{ $product->Origin }}" required>
                    </div>

                    <div class="form-group">
                        <label for="material">{{ __('Material') }}</label>
                        <input id="material" type="text" class="form-control" name="Material" value="{{ $product->Material }}" required>
                    </div>
                    <div class="form-group">
                        <label for="product_code">{{ __('Product Code') }}</label>
                        <input id="product_code" type="text" class="form-control" name="Product_Code" value="{{ $product->Product_Code }}" required>
                    </div>

                    <div class="form-group">
                        <label for="status">{{ __('Status') }}</label>
                        <input id="status" type="text" class="form-control" name="Status_Sneaker" value="{{ $product->Status_Sneaker }}" required>
                    </div>

                    <div class="form-group">
                        <label for="price">{{ __('Price') }}</label>
                        <input id="price" type="number" class="form-control" name="Price" value="{{ $product->Price }}" required>
                    </div>

                    <div class="form-group">
                        <label for="size">{{ __('Size') }}</label>
                        <input id="size" type="text" class="form-control" name="Size" value="{{ $product->Size }}" required>
                    </div>

                    <button type="submit" class="btn-submit">
                        {{ __('Update Product') }}
                    </button>
                </form>
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
</script>
@endsection