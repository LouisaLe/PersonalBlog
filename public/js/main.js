let isFloatMenu = false;
let toggleMenuItem = document.querySelector('.menu__item--fixed');
let toggleBtn = document.querySelector(".mobile-trigger__nav-side-bar");
let scrollIndicator = document.getElementById('scrollIndicator');
let menuItem = document.querySelectorAll('.menu__item a');
let sectionNav = document.querySelectorAll('.section-nav');

window.addEventListener("scroll", function () {
    if (isFloatMenu && window.scrollY < 80) {
        $(".menu").removeClass("fixed");
        isFloatMenu = false;
    }

    if (!isFloatMenu && window.scrollY > 80) {
        $(".menu").addClass("fixed");
        isFloatMenu = true;
    }

    if (window.scrollY < 50) {
        $("#top").addClass("hidden");
    } else {
        $("#top").removeClass("hidden");
    }

    setHeightIndicator();

});

function setHeightIndicator() {
    const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
    const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    const scrolled = (winScroll / height) * 100;
    scrollIndicator.style.width = scrolled + '%';
}

function scrollToSection(id) {
    $("html, body").animate({
        scrollTop: $('#section_'+id).offset().top,
    },500);
}

function scrollToTop() {
    $("html, body").animate({
        scrollTop: 0
    },500);
}

function showModal(id) {
    document.getElementsByTagName('html')[0].classList.add('overflow-hidden');
    let content = document.getElementById('input_' + id).value;
    let modal = document.getElementById('modal');
    modal.classList.add('active');
    modal.children[1].innerHTML = content;
}

function closeModal() {
    document.getElementsByTagName('html')[0].classList.remove('overflow-hidden');
    let modal = document.getElementById('modal');
    modal.classList.remove('active');
    modal.children[1].innerHTML = '';
}

toggleMenuItem.addEventListener("click", (e) => {
    e.target.parentElement.classList.toggle('toggle');
});

menuItem.forEach(function(item) {
    item.addEventListener('click', function(e) {
        scrollToSection(e.target.id);
    });
});

document.getElementById('top').addEventListener('click', scrollToTop);


let btnModal = document.querySelectorAll('.post__description button');
btnModal.forEach(element => {
    element.addEventListener('click', function(e) {
       showModal(e.target.id);
    });
});

sectionNav.forEach(element => {
   element.addEventListener('click', function(e) {
        scrollToSection(e.target.parentElement.id.split('_')[1]);
   });
});


toggleBtn != null ? toggleBtn.addEventListener('click', (e) => {
    console.log(e);
    document.querySelector('.section__posts--all').classList.toggle('active');
}) : '';