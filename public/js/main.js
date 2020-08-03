$(document).ready(function () {
    $("#dtBasicExample").DataTable();
    $(".dataTables_length").addClass("bs-select");

    // Init summer note
    $("#summernote").summernote({
        'height': 150
    });
    // End summer note

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
    });

    // $(".card").on("click", function () {
    //     let ele = $(this);
    //     let id = ele.attr("id");

    //     if (!ele.hasClass("active")) {
    //         ele.siblings().removeClass("active");
    //         $("#s_" + id)
    //             .siblings()
    //             .removeClass("active");
    //         ele.addClass("active");
    //         $("#s_" + id).addClass("active");
    //     }
    // });

    $(".btn-toggle").on("click", function (e) {
        e.preventDefault();
        var target = $(this).attr('data-target');
        $('#section_'+target).toggleClass('active');
    });

    $('.btn-cancel').on('click', function(){
        if ($('.section_toggle').hasClass('active')) {
            $('.section_toggle').removeClass('active');
        }
    });

    $('.delete').on('click', function(e){
        e.preventDefault();
        var link = $(this).attr("href");
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.value) {
                window.location.href = link;
            }
        })
    });
});
