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
                            <p><strong>Status:</strong>
                                @if($user->is_active == 1)
                                Activated
                                @else
                                Not Activated
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <a href="{{ route('admin.editUserForm', ['user' => $user->id]) }}" class="btn btn-primary">{{ __('Edit Information') }}</a>
                        </div>
                    </div>
                    <div class="row">
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
            @endforeach
        </div>
    </div>
</div>
<script>
    function confirmDelete(deleteUrl) {
        if (confirm('Bạn có chắc chắn muốn xoá user không?')) {
            window.location.href = deleteUrl;
        }
    }
</script>
@endsection