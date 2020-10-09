$(document).ready(function () {
    
    $("#dtBasicExample").DataTable();
    $(".dataTables_length").addClass("bs-select");

    // Init summer note
    // $("#summernote").summernote({
    //     'height': 150,
    //     codemirror: { // codemirror options
    //      theme: 'monokai'
    //     },
    //     callbacks: {
    //         onPaste: function (e) {
    //         var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('text/html');
    //         e.preventDefault();
    //         var div = $('<div />');
    //         div.append(bufferText);
    //         div.find('*').removeAttr('style');
    //         setTimeout(function () {
    //             document.execCommand('insertHtml', false, div.html());
    //         }, 10);
    //     }
    // }
    // });
    // End summer note

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