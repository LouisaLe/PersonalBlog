@foreach($comments as $comment)
<div class="display-comment">
    @if(Auth::check() && $comment -> user_id)
        <strong>{{ Auth::user()->name }}</strong>
    @else
        <strong>{{ $comment->guest_name }}</strong>
    @endif
    <p>{{ $comment->comment }}</p>
    
    <button class="btn btn-sm btn-primary">Reply</button>

    <form method="post" action="{{ route('add.reply') }}" id="replyForm">
        @csrf


        @guest

        <div class="form-group">
            <label for="guest_name">Enter your name:</label>
            <input id= "guest_name" type="text" name="guest_name" class="form-control" />
        </div>

        <div class="form-group">
            <label for="guest_email">Enter your email:</label>
            <input id="guest_email" type="text" name="guest_email" class="form-control" />
        </div>

        @endguest

        <div class="form-group">
            <label for="comment">Leave your comment:</label>
            <textarea class="form-control" id="comment" rows="3" name="reply_comment"></textarea>
        </div>

        <input type="hidden" name="post_id" value="{{ $post_id }}" />
        <input type="hidden" name="comment_id" value="{{ $comment->id }}" />

        <div class="form-group">
            <button type="submit" class="btn btn-sm btn-primary">Reply</button>
        </div>
    </form>
    @include('post.reply.replies', ['comments' => $comment->replies])
</div>
@endforeach