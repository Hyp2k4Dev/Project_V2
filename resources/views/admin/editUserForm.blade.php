@extends('layout.app')

@section('content')
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit User Information') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.editUser', ['user' => $user->id]) }}" onsubmit="return validateForm()">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required autocomplete="email">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>
                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="{{ $user->address }}" autocomplete="address">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone_number" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number (+84)') }}</label>
                            <div class="col-md-6">
                                <input id="phone_number" type="text" class="form-control" name="phone_number" value="{{ $user->phone_number }}" autocomplete="phone_number">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>
                            <div class="col-md-6">
                                <select name="role" id="role" class="form-control" required>
                                    <option value="seller" {{ $user->role === 'seller' ? 'selected' : '' }}>Seller</option>
                                    <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">{{ __('Update Information') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function validateForm() {
        var name = document.getElementById('name').value;
        var email = document.getElementById('email').value;
        var phoneNumber = document.getElementById('phone_number').value;

        if (/\s/.test(name) || /[^\w\s]/.test(name)) {
            alert("Tên không được chứa khoảng trắng hoặc ký tự đặc biệt.");
            return false;
        }

        if (!email.includes('@')) {
            alert("Email phải chứa ký tự @.");
            return false;
        }

        if (/[^\d\s]/.test(phoneNumber)) {
            alert("Số điện thoại không được chứa ký tự đặc biệt.");
            return false;
        }

        return true;
    }
</script>

@endsection