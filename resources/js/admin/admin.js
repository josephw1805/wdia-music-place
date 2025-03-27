import $ from 'jquery';
window.$ = window.jQuery = $;

const base_url = $("meta[name='base_url']").attr('content')
const csrf_token = $('meta[name=csrf_token]').attr('content');

let notyf = new Notyf({
    duration: 4000,
    position: {
        x: 'right',
        y: 'top',
    }
});

document.addEventListener("DOMContentLoaded", function () {
    tinymce.init({
        license_key: 'gpl',
        selector: '.editor',
        height: 500,
        menubar: false,
        plugins: [
            'advlist', 'autolink', 'lists', 'link', 'charmap',
            'anchor', 'searchreplace', 'visualblocks', 'fullscreen',
            'insertdatetime', 'media', 'table'
        ],
        toolbar: 'undo redo | blocks | ' +
            'bold italic backcolor | alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist outdent indent | ' +
            'removeformat',
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
    });
})

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
            _token: csrf_token
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

/** Certificate js */
$(function () {
    $('.draggable-element').draggable({
        containment: '.certificate-body',
        stop: function (event, ui) {
            let elementId = $(this).attr('id');
            let xposition = ui.position.left;
            let yposition = ui.position.top;

            $.ajax({
                method: 'POST',
                url: `${base_url}/admin/certificate-item`,
                data: {
                    '_token': csrf_token,
                    'element_id': elementId,
                    'x_position': xposition,
                    'y_position': yposition
                },
                success: function (data) { },
                error: function (xhr, status, error) { }
            })
        }
    });
});

/** Featured Artist */
$('.select_artist').on('change', function () {
    let id = $(this).val();

    $.ajax({
        method: 'GET',
        url: `${base_url}/admin/get-artist-albums/${id}`,
        beforeSend: function () {
            $('.artist_albums').empty();
        },
        success: function (data) {
            $.each(data.albums, function (key, value) {
                let option = `<option value='${value.id}'>${value.title}</option>`
                $('.artist_albums').append(option);
            });
        },
        error: function (xhr, status, error) { }
    });
});