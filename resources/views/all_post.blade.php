@extends('layout.app')

@section('content')

@include('layout.menu-inside')

<div class="section__wrapper">
    <h1 class="section__title">
        All Post
    </h1>
    <div class="bread-cum">
        <a href="{{ route('home') }}">Home &#8811;</a>
        <a href="" class="active">Posts</a>
    </div>
    <div class="section__posts--all">
        <div class="section__post-content">
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
                <div class="post__exceprt">{{ Str::limit($post -> excerpt,100) }}</div>
                <div class="post__feature">
                    <a href="{{ URL::to('all/posts/cate\/').$post -> category_id }}" class="icon__item"><img class="icon" src="{{ asset('imgs/icon_folders.svg') }}" alt="Icons">{{ $post -> name}}</a>
                    <a href="#" class="icon__item"><img class="icon" src="{{ asset('imgs/icon_comments.svg') }}" alt="Icons">100 comments</a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="nav-side__wrapper">
            <div class="category__wrapper">
                <label class="nav-side__label">All Category</label>
                @foreach($cats as $cat)
                    <a href="{{ URL::to('all/posts/cate\/').$cat -> id }}" class="tags">{{$cat -> name}}</a>
                @endforeach
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