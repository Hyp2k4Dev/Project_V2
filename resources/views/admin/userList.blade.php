@extends('layout.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($users as $user)
            <div class="card mb-4">
                <div class="card-header">{{ __('User Information') }}</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <p><strong>Username:</strong> {{ $user->name }}</p>
                            <p><strong>Email:</strong> {{ $user->email }}</p>
                            <p><strong>Address:</strong> {{ $user->address }}</p>
                        </div>
                        <div class="col-sm-6">
                            <p><strong>Phone Number (+84):</strong> {{ $user->phone_number }}</p>
                            <p><strong>Role:</strong> {{ $user->role }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <a href="{{ route('admin.editUserForm', ['user' => $user->id]) }}" class="btn btn-primary">{{ __('Edit Information') }}</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection