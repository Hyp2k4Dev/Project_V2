<!-- resources/views/products/edit.blade.php -->

@extends('layout.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Product') }}</div>
                <div class="card-body">
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

                        <button type="submit" class="btn btn-primary">
                            {{ __('Update Product') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection