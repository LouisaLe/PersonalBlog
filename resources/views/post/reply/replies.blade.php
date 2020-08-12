@foreach($comments as $comment)
<div class="display-comment">
    @if(Auth::check() && $comment -> user_id)
    <strong>{{ Auth::user()->name }}</strong>
    @else
    <strong>{{ $comment->guest_name }}</strong>
    @endif
    <p>{{ $comment->comment }}</p>

    <button class="btn btn-show-reply">Trả lời</button>

    <form method="post" action="{{ route('add.reply') }}" id="replyForm">
        @csrf


        @guest

        <div class="form-group">
            <label for="guest_name">Enter your name:<span class="madatory_star">*</span></label>
            <input id="guest_name" type="text" name="guest_name" class="form-control" required/>
            @error('guest_name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="guest_email">Enter your email:<span class="madatory_star">*</span></label>
            <input id="guest_email" type="text" name="guest_email" class="form-control" required/>
            @error('guest_email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        @endguest

        <div class="form-group">
            <label for="comment">Leave your comment:<span class="madatory_star">*</span></label>
            <textarea class="form-control" id="comment" rows="3" name="reply_comment" required></textarea>
            @error('reply_comment')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

        </div>

        <input type="hidden" name="post_id" value="{{ $post_id }}" />
        <input type="hidden" name="comment_id" value="{{ $comment->id }}" />

        <div class="form-group">
            <button type="submit" class="btn bnt-show-reply btn-submit">Gửi comment</button>
        </div>
    </form>
    @include('post.reply.replies', ['comments' => $comment->replies])
</div>
@endforeach