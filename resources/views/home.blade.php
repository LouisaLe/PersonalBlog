@extends('layout.app')

@section('content')

@include('layout.menu')

<div class="container-fluid page__wrapper">
    <section id="section_home" class="section section__home">
        <div class="content__item getting__desc">
            <h1 class="getting__text">Hi! I'm Nhi</h1>
            <h2 class="getting__sub-text">a web developer and dog lover!</h2>
        </div>
    </section>

    <section id="section_about" class="section section__about">
        <div class="section__border">
            <div class="section__title">About</div>
            <div class="section__content">
                <div class="feature__introduce">
                I'm a Front End developer with over 4 years of experience. Besides a deep understanding of web programming skills such as HTML5, CSS3, JS. I have a passion for making websites with stunning effects and aminations.
                Using modern technologies like CSS pre-processor, ES6, RxJS also. Additionally, I'm able to build a website with Angular and host a CMS website with Laravel.
                </div>
                <div class="feature__blocks">
                    <div class="feature__item">
                        <img src="{{ asset('imgs/icon_focus.svg') }}" alt="Focus">
                        <div class="feature__label">Users focus</div>
                        <div class="feature__desc">
                            <p class=""></p> I developer produts for <span class="old-text">Users </span><span class="replace-text">Humans</span>
                            <p>Responsive and cross browsers.</p>
                        </div>
                    </div>
                    <div class="feature__item">
                        <img src="{{ asset('imgs/icon_fast.svg') }}" alt="Fast">
                        <div class="feature__label">Fast</div>
                        <div class="feature__desc">
                            Performance of website is important!
                            <p>That helps increase the quality of the user's interaction.</p>
                        </div>
                    </div>
                    <div class="feature__item">
                        <img src="{{ asset('imgs/icon_impressive.svg') }}" alt="Impressive">
                        <div class="feature__label">Impressive</div>
                        <div class="feature__desc">
                            Amazing effects will make your website is impressive and attract visitors.
                        </div>
                    </div>
                </div>

            </div>

            <a class="btn" href="http://example.com/files/myfile.pdf" target="_blank">Download my Résume</a>
        
        
        </div>
    </section>
    <!-- <section id="section_works" class="section section__works">
        <div class="section__title">Works</div>
    </section> -->
    <section id="section_blogs" class="section section__blogs">
        <div class="section__border">
            <div class="section__title">
                Blogs
                <span class="note"> (Vietnamese)</span>
                
            </div>
            <div class="section__tags">
                <a href="{{ route('all.posts') }}" class="tags">All</a>
                @foreach($cats as $cat)
                    <a href="{{ URL::to('all/posts/cate\/').$cat -> id }}" class="tags">{{$cat -> name}}</a>
                @endforeach
            </div>

            <div class="section__content">
                <div class="section__post-content-border slick--slider">
                    @foreach($posts as $post)
                    <div class="post__item">
                        <a href="{{ URL::to('post/detail\/').$post -> id }}" class="post__title" >{{ $post -> title }}</a>
                        <div class="post__tags">
                        <?php
                        $tags = $post -> tags;
                        $utags = explode(',', $tags);
                        $comments = App\Comment::where('commentable_id', $post -> id) -> count();
                        ?>
                        @foreach($utags as $item)
                            <span>{{'#'.$item}}</span>
                        @endforeach
                        </div>
                        <div class="post__exceprt">{{ Str::limit($post -> excerpt,100) }}</div>
                        <div class="post__feature">
                            <a href="{{ URL::to('all/posts/cate\/').$post -> category_id }}" class="icon__item"><img class="icon" src="{{ asset('imgs/icon_folders.svg') }}" alt="Icons">{{ $post -> name}}</a>
                            <a href="#" class="icon__item"><img class="icon" src="{{ asset('imgs/icon_comments.svg') }}" alt="Icons">{{$comments}}</a>
                        </div>
                    </div>
                    @endforeach
                </div>
                <a href="{{ route('all.posts') }}" class="btn btn-show-all">Read all Posts</a>
            </div>
        </div>
    </section>
    <section id="section_contact" class="section section__contact">

        <div class="section__border">

            <div class="section__title">Contact</div>
                <div class="section__sub-title">
                    If you want to talk or work together?
                    </br>
                    Even You want to build a website as Portfolio or Blog, don't hesitate to send me an email.
                    </br>
                    I'll make your ideas come true.
                </div>

                @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{Session::get('success')}}
                    </div>
                @endif
                <form class="form__contact" action="{{ route('contact') }}" method="POST">
                @csrf
                    <div class="form-group">
                        <input id="contact_id" class="form__input-field" type="text" name="name" placeholder="Name" required>
                        <label for="contact_id">Name</label>

                        <!-- Error -->
                        @if ($errors->has('name'))
                        <div class="error">
                            {{ $errors->first('name') }}
                        </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <input id="contact_email" class="form__input-field" type="text" name="email" placeholder="E-Mail" required>
                        <label for="contact_email">E-Mail</label>

                        @if ($errors->has('email'))
                        <div class="error">
                            {{ $errors->first('email') }}
                        </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <textarea id="contact_message" class="form__input-field" type="text" name="message" placeholder="Enter your Messege" required></textarea>
                        <label for="contact_message">Messege</label>

                        @if ($errors->has('message'))
                        <div class="error">
                            {{ $errors->first('message') }}
                        </div>
                        @endif
                    </div>

                    <button class="btn btn-submit" type="submit">Send Email</button>
                </form>
        </div>
        
    </section>
</div>

@endsection