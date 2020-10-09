@extends('layout.app')

@section('content')

<div id="allPosts">

@include('layout.menu-inside')

<div class="all--post section__wrapper">
    <h1 class="section__title">
        All {{ $category_name }} Posts
    </h1>

    <div class="section__posts--all">
       
        <div class="section__post-content">
            <div class="bread-cum">
                <a href="{{ route('home') }}">Home &#8811;</a>
                <a href="{{ route('all.posts') }}">Posts &#8811;</a>
                <span class="active">{{ $category_name}}</span>
            </div>
            <div class="section__post-content-border">
                @foreach($posts as $index => $post)
                    <div class="post__item">
                        <div class="post__title" ><span class="post__category-tag">{{ $post -> name }}</span>{{ $post -> title }}</div>
                        <div class="post__tags">
                        <?php
                        $tags = $post -> tags;
                        $utags = explode(',', $tags);
                        // $comments = App\Comment::where('commentable_id', $post -> id) -> count();
                        ?>
                        @foreach($utags as $item)
                            <span>{{'#'.$item}}</span>
                        @endforeach
                        </div>
                        <div class="post__description">
                            <button id="{{$index}}">Description</button>
                            <input id="input_{{$index}}" class="hidden" value="{{$post -> detail}}">
                            <a href="{{ $post -> url }}" target="_blank">Source Code</a>
                        </div>
                    </div>
                    @endforeach
            </div>
            {{ $posts->links() }}
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