@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Notifications</h1>
                <ul class="list-group">
                    @foreach($notifications as $notification)
                        <li class="list-group-item alert alert-{{ $notification['type'] }}">{{ $notification['message'] }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
