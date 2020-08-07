@extends('layout.dashboard_app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="">
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




                <form action="{{ route('add.comment') }}" method="POST">
                    @csrf



                    @guest

                    <div class="form-group">
                        <label for="guestName">Enter your Name:</label>
                        <input class="form-control" id="guestName" name="guest_name"></input>
                        @error('guest_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="guestEmail">Enter your Email:</label>
                        <input class="form-control" id="guestEmail" name="guest_email"></input>
                        @error('guest_email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    @endguest

                    <div class="form-group">
                        <label for="comment">Leave your comment:</label>
                        <textarea class="form-control" id="comment" rows="3" name="comment"></textarea>
                        <input type="hidden" name="post_id" value="{{$post -> id}}">
                        @error('guest_email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>




                    <button type="submit">Comment</button>
                </form>

                <!-- load all replies and parent comments -->
                @include('post.reply.replies', ['comments' => $post -> comments, 'post_id' => $post -> id])
            </div>
        </div>
    </div>
</div>
@endsection