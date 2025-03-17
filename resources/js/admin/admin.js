import $ from 'jquery';
window.$ = window.jQuery = $;

let notyf = new Notyf({
    duration: 4000,
    position: {
        x: 'right',
        y: 'top',
    }
});

const scrf_token = $('meta[name=csrf_token]').attr('content');
let delete_url = null;

$(function () {
    $('.select2').select2();
})

$('.delete-item').on('click', function (e) {
    e.preventDefault();
    let url = $(this).attr('href');

    delete_url = url;

    $('#modal-danger').modal("show");
})

$('.delete-confirm').on('click', function (e) {
    e.preventDefault();
    $.ajax({
        method: 'DELETE',
        url: delete_url,
        data: {
            _token: scrf_token
        },
        beforeSend: function () {
            $('.delete-confirm').text("Deleting...");
        },
        success: function (data) {
            window.location.reload();
        },
        error: function (xhr, status) {
            let error = xhr.responseJSON;
            notyf.error(error.message);
        },
        complete: function () {
            $('.delete-confirm').text("Delete");
        }
    })
});