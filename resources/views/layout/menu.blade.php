<div class="navbar__wrapper">
    <div class="navbar__border">
        <a href="{{ route('home') }}" class="logo" style="opacity: 0;">
            <img src="{{ asset('imgs/logo.svg') }}" alt="Logo">
        </a>
        <ul class="menu">

            <li class="menu__item">
                <a id="home" href="#">Home</a>
            </li>
            <li class="menu__item">
                <a id="about" href="#">About</a>
            </li>
            <!-- <li class="menu__item">
                <a id="works" href="#">Works</a>
            </li> -->
            <li class="menu__item">
                <a id="blogs" href="#">Blogs</a>
                <ul class="sub-menu">
                    <li>Chia theo tag recommend: newest, javascript, css, amination, tricks, ...</li>
                </ul>
            </li>
            <li class="menu__item">
                <a id="contact" href="#">Contact</a>
            </li>
            <li class="menu__item menu__item--fixed">
            </li>
        </ul>
    </div>
    
</div>


