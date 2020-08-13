<div class="navbar__wrapper">
    <div class="navbar__border">
        <a href="{{ route('home') }}" class="logo">
            <img src="{{ asset('imgs/logo.svg') }}" alt="Logo">
        </a>
        <ul class="menu">
            <li class="menu__item">
                <a id="about" href="{{ route('home') }}">Home</a>
            </li>
            <!-- <li class="menu__item">
                <a id="works" href="#">Works</a>
            </li> -->
            <li class="menu__item">
                <a id="blogs" href="{{ route('all.posts') }}">All Blogs</a>
                <ul class="sub-menu">
                    <li>Chia theo tag recommend: newest, javascript, css, amination, tricks, ...</li>
                </ul>
            </li>
        </ul>
    </div>
</div>