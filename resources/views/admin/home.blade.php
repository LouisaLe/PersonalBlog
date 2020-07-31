@extends('layouts.app')

@section('content')
<div class="admin-dashboard__container">
    <div class="admin-dashboard__wrapper">
        <div class="main-thread__wrapper">
            <h1 class="title">Dashboard</h1>
            <div class="feature__rectangle">
                <label>Total post</label>
                <div class="feature__value">2000</div>
            </div>
            <div class="feature__rectangle">
                <label>Total visitors</label>
                <div class="feature__value">90000</div>
            </div>
            <div class="feature__rectangle">
                <label>Total subscriber</label>
                <div class="feature__value">200</div>

            </div>
            <div class="feature__rectangle">
                <label>Total comments</label>
                <div class="feature__value">90</div>
            </div>
        </div>
        <div class="side-menu__wrapper">
            <div>Category</div>
            <div>Posts
                <ul>
                    <li>All Posts</li>
                    <li>New Post</li>
                </ul>
            </div>
            <div>Comments</div>
            <div>Media</div>
        </div>
        <div class="main-panel__wrapper">
            <section>
                Category Management
            </section>
            <section>
                Posts Management
            </section>
            <section>
                Comments Management
            </section>
            <section>
                Media Management
            </section>
        </div>
    </div>

</div>
@endsection