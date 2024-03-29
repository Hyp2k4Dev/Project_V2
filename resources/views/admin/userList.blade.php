@extends('layout.app')

@section('content')
<style>
    .mb-4{display: flex;}
    .filter-form {
        width: 125px;
    }

    .btn-filter {
        background-color: green;
        color: white;
        border: 1px solid grey;
        border-radius:10px  ;
        width: 125px;
    }
    .btn-filter:hover{
        background-color: darkgreen;
    }
    .search{
        width: 108px;
    }
</style>
<div class="container">
    <div class="row mb-4">
        <div class="col-md-6">
            <form action="{{ route('admin.userList') }}" method="GET">
                <div class="filter-form">
                    <label for="filter">Filter Users:</label>
                    <select class="form-control" id="filter" name="status">
                        <option value="all" {{ $status == 'all' ? 'selected' : '' }}>All Users</option>
                        <option value="activated" {{ $status == 'activated' ? 'selected' : '' }}>Activated</option>
                        <option value="not_activated" {{ $status == 'not_activated' ? 'selected' : '' }}>Not Activated</option>
                    </select>
                </div>
                <button type="submit" class="btn-filter" id="">Search</button>
            </form>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            @forelse($users as $user)
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="card-header">{{ __('User Information') }}</div>
                        <div class="col-sm-6">
                            <p><strong>Username:</strong> {{ $user->name }}</p>
                            <p><strong>Email:</strong> {{ $user->email }}</p>
                            <p><strong>Address:</strong> {{ $user->address }}</p>
                        </div>
                        <div class="col-sm-6">
                            <p><strong>Phone Number (+84):</strong> {{ $user->phone_number }}</p>
                            <p><strong>Role:</strong> {{ $user->role }}</p>
                            <p><strong>Status:</strong> {{ $user->is_active ? 'Activated' : 'Not Activated' }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <a href="{{ route('admin.editUserForm', ['user' => $user->id]) }}" class="btn btn-primary search" >{{ __('Edit User') }}</a>
                        </div>
                        <div class="col-sm-6">
                            <form action="{{ route('admin.deleteUser', ['user' => $user->id]) }}" method="POST" style="display: inline;" onsubmit="return confirm('Bạn có chắc chắn muốn xoá người dùng không?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">{{ __('Delete User') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="card">
                <div class="card-body">
                    <p class="card-text">No users found.</p>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection