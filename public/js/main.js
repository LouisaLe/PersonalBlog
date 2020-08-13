$(document).ready(function () {
    $(".menu__item").on("click", function () {
        let ele = $(this);
        let selectedID = ele.children("a").attr("id");

        if (!ele.hasClass("active")) {
            ele.parent().find(".active").removeClass("active");
            ele.addClass("active");
        } else {
            return;
        }

        $("html, body").animate(
            {
                scrollTop: $("#section_" + selectedID).offset().top,
            },
            500
        );
    });

    $("#top").on("click", function () {
        $("html, body").animate(
            {
                scrollTop: 0,
            },
            500
        );
    });

    let isFloatMenu = false;

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
    });

    $(".btn-toggle").on("click", function (e) {
        e.preventDefault();
        var target = $(this).attr("data-target");
        $("#section_" + target).toggleClass("active");
    });

    $('.btn-show-reply').on('click', function(){
        $(this).addClass('hidden');
        $(this).siblings('form').slideDown();
    });
});
