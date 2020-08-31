$(document).ready(function () {
    $(".menu__item:not(.menu__item--fixed)").on("click", function () {
        let ele = $(this);
        let selectedID = ele.children("a").attr("id");

        if (!ele.hasClass("active")) {
            ele.parent().find(".active").removeClass("active");
            ele.addClass("active");
        } else {
            return;
        }

        $("html, body").animate({
            scrollTop: $("#section_" + selectedID).offset().top,
        },500);
    });

    $("#top").on("click", function () {
        $("html, body").animate({
                scrollTop: 0
            },500);
    });

    $(".btn-toggle").on("click", function (e) {
        e.preventDefault();
        var target = $(this).attr("data-target");
        $("#section_" + target).toggleClass("active");
    });

    $(".btn-show-reply").on("click", function () {
        $(this).addClass("hidden");
        $(this).siblings("form").slideDown();
    });
});

// new fullpage(".section", {
//     autoScrolling: true
// });

let isFloatMenu = false;
let toggleMenuItem = document.querySelector('.menu__item--fixed');
let bgHome = document.querySelector(".section__home");
let bgAbout = document.querySelector(".section__about");
let bgBlog = document.querySelector(".section__blogs");
let bgContact = document.querySelector(".section__contact");
let toggleBtn = document.querySelector(".mobile-trigger__nav-side-bar");
// let contactOffsetY = bgContact.offsetTop;

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

    let backgroundPositionY = window.pageYOffset;

    
    // let puppy = document.querySelector(".puppy");
    // bgHome.style.backgroundPosition = `${
    //     20 - backgroundPositionY / 100
    // }% center`;
    // puppy.style.right = `${40 + backgroundPositionY * 0.2}px`;
    // bgContact.style.transform = `scale(${1 + (backgroundPositionY-contactOffsetY)/100})`
});

function scrollToSection(id) {
    $("html, body").animate({
        scrollTop: $('#'+id).offset().top,
    },500);
}

bgAbout != null ? bgAbout.addEventListener('click', (e) => {
    let id = e.target.id;
    scrollToSection(id);
}) : '';

bgBlog != null ? bgBlog.addEventListener('click', (e) =>{
    let id = e.target.id;
    scrollToSection(id);
}) : '';

bgContact != null ? bgContact.addEventListener('click', (e) => {
    let id = e.target.id;
    scrollToSection(id);
}) : '';

toggleBtn != null ? toggleBtn.addEventListener('click', (e) => {
    console.log(e);
    document.querySelector('.section__posts--all').classList.toggle('active');
}) : '';


// extension for triggering event when window scroll has stopped
// $.fn.scrollEnd = function(callback, timeout) {          
//     $(this).scroll(function(){
//       var $this = $(this);
//       if ($this.data('scrollTimeout')) {
//         clearTimeout($this.data('scrollTimeout'));
//       }
//       $this.data('scrollTimeout', setTimeout(callback,timeout));
//     });
//   };

// function srcollSectionTop(offset) {
//     $(window).scrollEnd(function(){
//             $("html, body").animate({ scrollTop: offset }, 500);
//     }, 600);
        
// }

// using intersection observer

const observerElements = document.querySelectorAll(".section");
const observerOption = {
    threshold: [0, 0.15]
}

const intersectionObserver = new IntersectionObserver((entries, observerOption) => {
    entries.forEach((entry) => {
        if (entry.isIntersecting && entry.intersectionRatio >= 0.15) {
            // srcollSectionTop(entry.target.offsetTop);
            entry.target.classList.add('amination--text');
        } else {
            entry.target.classList.remove('amination--text');
        }
    });
}, observerOption);

observerElements.forEach((element) => intersectionObserver.observe(element));
 
toggleMenuItem.addEventListener("click", (e) => {
    e.target.parentElement.classList.toggle('toggle');
});
