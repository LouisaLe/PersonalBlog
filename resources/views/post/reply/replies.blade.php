@foreach($comments as $comment)
<div class="display-comment">
    <div class="comment__block">
        <div class="comment__line">
            @if($comment -> user_id)
            <img src="{{ asset('imgs/logo.png') }}" alt="Admin" class="comment__avatar">
            <div class="comment__name">{{ DB::table('users') -> where('id', $comment -> user_id) -> first() -> username}}</div>
            @else
            <img src="{{ asset('imgs/guest.png') }}" alt="Guest" class="comment__avatar">
            <div class="comment__name">{{ $comment->guest_name }}</div>
            @endif

            <span class="small-text code-text">
                {{$comment->created_at->diffForHumans()}}
            </span>
        </div>

        <div class="comment__line">{{ $comment->comment }}</div>

        <button class="btn btn-show-reply">Trả lời</button>

        <form method="post" action="{{ route('add.reply') }}" class="reply-form">
        @csrf


        @guest

            <div class="form-group">
                <label for="guest_name">Nhập tên của bạn:<span class="madatory_star">*</span></label>
                <input id="guest_name" type="text" name="guest_name" class="form-control" required />
                @error('guest_name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="guest_email">Nhập email của bạn:<span class="madatory_star">*</span></label>
                <input id="guest_email" type="text" name="guest_email" class="form-control" required />
                @error('guest_email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

        @endguest

            <div class="form-group">
                <label for="reply_comment">Bình luận:<span class="madatory_star">*</span></label>
                <textarea class="form-control" id="reply_comment" rows="3" name="reply_comment" required></textarea>
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
    </div>
    @include('post.reply.replies', ['comments' => $comment->replies])
</div>
@endforeach