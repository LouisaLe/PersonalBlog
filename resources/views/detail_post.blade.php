@extends('layout.app')

@section('content')

<div id="allPosts">

@include('layout.menu-all-posts')

<div class="all--post section__wrapper">
    
    <div class="section__posts--all">
    <div class="post__container">
    <h1 class="section__title">
        {{ $post -> title}}
    </h1>
        <div class="inline">
            <div class="bread-cum">
                <a href="{{ route('home') }}">Home &#8811;</a>
                <a href="{{ route('all.posts') }}">Posts &#8811;</a>
                <span class="active">{{ $category -> name}}</span>
            </div>

            <div class="cat small-text code-text">
                <img class="icon" src="{{ asset('imgs/icon_folders.svg') }}" alt="Icons">
                <span>{{ $category -> name}}</span>
            </div>
        </div>
        

        <div class="post-detail__wrapper">
            {!! $post->detail !!}
        </div>

        <h4 class="comment-label">
            Bình luận
        </h4>

        <form class="form__comment" action="{{ route('add.comment') }}" method="POST">
            @csrf

            @guest

            <div class="form-group">
                <label for="guestName">Nhập tên của bạn:<span class="madatory_star">*</span></label>
                <input class="form-control" id="guestName" name="guest_name" required></input>
                @error('guest_name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="guestEmail">Nhập email của bạn:<span class="madatory_star">*</span></label>
                <input class="form-control" id="guestEmail" name="guest_email" required></input>
                @error('guest_email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            @endguest

            <div class="form-group">
                <label for="comment">Bình luận của bạn:<span class="madatory_star">*</span></label>
                <textarea class="form-control" id="comment" rows="3" name="comment" required></textarea>
                <input type="hidden" name="post_id" value="{{$post -> id}}">
                @error('comment')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn bnt-show-reply btn-submit">Gửi Comment</button>
        </form>

        <!-- load all replies and parent comments -->
        @include('post.reply.replies', ['comments' => $post -> comments, 'post_id' => $post -> id])
    </div>
        <div class="nav-side__wrapper">
            <div class="mobile-trigger__nav-side-bar">
                <img src="{{ asset('imgs/icon_arrow.svg') }}" alt="">
            </div>

            <div class="posts--popular">
                <label class="nav-side__label">
                    Bai viet noi bat
                </label>

                @foreach($posts as $post)
                <div class="post__item">
                    <a href="{{ URL::to('post/detail\/').$post -> id }}" class="post__title" >{{ $post -> title }}</a>
                    <div class="post__tags">
                        <?php
                        $tags = $post -> tags;
                        $utags = explode(',', $tags)
                        ?>
                        @foreach($utags as $item)
                            <span>{{'#'.$item}}</span>
                        @endforeach
                    </div>
                    
                </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>
</div>
@endsection
