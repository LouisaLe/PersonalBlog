@extends('layout.app')

@section('content')

@include('layout.menu-inside')

<div class="container">
    <div class="bread-cum">
        <a href="{{ route('home') }}">Home &#8811;</a>
        <a href="" class="active">Posts</a>
    </div>
    <div class="section__post-content">
        @foreach($posts as $post)
        <div class="post__item">
            <a href="{{ URL::to('post/detail\/').$post -> id }}" class="post__title" >{{ $post -> title }}</a>
            <div class="post__tags">
                <span>#abc</span>
                <span>#xyz</span>
                <span>#123</span>
            </div>
            <div class="post__exceprt">{{ Str::limit($post -> excerpt,100) }}</div>
            <div class="post__feature">
                <a href="{{ URL::to('all/posts/cate\/').$post -> category_id }}" class="icon__item"><img class="icon" src="{{ asset('imgs/icon_folders.svg') }}" alt="Icons">{{ $post -> name}}</a>
                <a href="#" class="icon__item"><img class="icon" src="{{ asset('imgs/icon_comments.svg') }}" alt="Icons">100 comments</a>
            </div>
        </div>
        @endforeach
    </div>
</div>