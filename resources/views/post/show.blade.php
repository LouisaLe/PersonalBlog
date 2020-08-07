@extends('layout.dashboard_app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <p>{{ $post->title }}</p>
                    <div>
                        Category: {{ $post -> name}}
                    </div>
                    <p>
                        {{ $post->detail }}
                    </p>
                </div>

                <h4 class="comment-label">
                    Comments
                </h4>

                <form action="{{ route('add.reply') }}" method="POST">
                    @csrf

                    @guest

                    <div class="form-group">
                        <label for="guestName">Enter your Name:</label>
                        <input class="form-control" id="guestName" name="guest_name"></input>
                    </div>
                    <div class="form-group">
                        <label for="guestEmail">Enter your Email:</label>
                        <input class="form-control" id="guestEmail" name="guest_email"></input>
                    </div>

                    @endguest
                    
                    <div class="form-group">
                        <label for="comment">Leave your comment:</label>
                        <textarea class="form-control" id="comment" rows="3" name="comment"></textarea>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection