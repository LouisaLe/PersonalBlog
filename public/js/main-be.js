$(document).ready(function () {
    
    $("#dtBasicExample").DataTable();
    $(".dataTables_length").addClass("bs-select");

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

    $('.btn-show-reply').on('click', function(){
        $(this).addClass('hidden');
        $(this).siblings('form').slideDown();
    });
});