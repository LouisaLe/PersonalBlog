@extends('layout.app')

@section('content')

@include('layout.menu')

<div class="container-fluid page__wrapper">
    <section id="section_home" class="section section__home">
        <div class="content__wrapper">
            <div class="content__item getting__img">
                <img src="{{ asset('imgs/getting-img.png') }}" alt="Getting img">
            </div>
            <div class="content__item getting__desc">
                <h1 class="getting__text">Hi! I'm Nhi</h1>
                <h2 class="getting__sub-text">a web developer and dog lover!</h2>
            </div>
        </div>

    </section>

    <section id="section_about" class="section section__about">
        <div class="section__title">About</div>
        <div class="section__content">
            <div class="feature__blocks">
                <div class="feature__item">
                    <img src="{{ asset('imgs/rocket.svg') }}" alt="Fast Load Time">
                    <div class="feature__label">Users focus</>
                        <div class="feature__desc">
                            <p class=""></p> I developer produts for <span class="old-text">User</span><span class="replace-text">Humans</span>
                            <p>Responsive and browser across</p>
                        </div>
                    </div>
                </div>
                <div class="feature__item">
                    <img src="{{ asset('imgs/responsive.svg') }}" alt="Fast Load Time">
                    <div class="feature__label">Fast</div>
                    <div class="feature__desc">
                        Fast load times and lag free interaction. This is my highest priority and which I have to learn and improve day by day.
                    </div>
                </div>
            </div>
            <div class="feature__introduce">
                I'm a over 4 years experience Front End Developer. Besides web programing skills such as HTML, CSS frameworks I have a passion with pure Javascript and make website amination.
                Additional, I'm able to build a website with Angular and also host a CMS website with Laravel.
            </div>
        </div>
    </section>
    <section id="section_works" class="section section__works">
        <div class="section__title">Works</div>
    </section>
    <section id="section_blogs" class="section section__blogs">
        <div class="section__title">Blogs<span class="note"> (Vietnamese)</span></div>

        <div class="section__content">
            <div class="section__tags">
                <a class="tags">All</a>
                <a class="tags">Javascript</a>
                <a class="tags">CSS</a>
                <a class="tags">Aminations</a>
                <a class="tags">Tricks</a>
            </div>
        </div>

    </section>
    <section id="section_contact" class="section section__contact">
        <div class="section__title">Contact</div>
        <div class="section__sub-title">
            If you want a talk or work together?
            Even You want a website as Portfolio or Blog, don't hesitate to send me a email. I'll make your ideas come true.
        </div>
        <form class="form__contact" action="" method="POST">
            <div class="form-group">
                <label for="contact_id">Name</label>
                <input id="contact_id" class="form__input-field" type="text" name="name">
            </div>

            <div class="form-group">
                <label for="contact_email">Your E-Mail</label>
                <input id="contact_email" class="form__input-field" type="text" name="email">
            </div>

            <div class="form-group">
                <label for="contact_message">Name</label>
                <textarea id="contact_message" class="form__input-field" type="text" name="message"></textarea>
            </div>

            <button class="btn btn-primary" type="submit">SEND EMAIL</button>
        </form>
    </section>
</div>