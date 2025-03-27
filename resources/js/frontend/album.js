const base_url = $("meta[name='base_url']").attr('content')
const basic_info_url = base_url + '/artist/albums/create';
const update_url = base_url + '/artist/albums/update';
const csrf_token = $('meta[name=csrf_token]').attr('content');

let loader = `
<div class="modal-content text-center p-3" style="display:inline">
    <div class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
</div>`;

//album tab navigation
$('.album-tab').on('click', function (e) {
    e.preventDefault();
    let step = $(this).data('step');
    $('.album-form').find('input[name=next_step]').val(step);
    $('.album-form').trigger('submit');
});

$('.basic_info_form').on('submit', function (e) {
    e.preventDefault();
    let formData = new FormData(this);
    $.ajax({
        method: 'POST',
        url: basic_info_url,
        data: formData,
        contentType: false,
        processData: false,
        beforeSend: function () { },
        success: function (data) {
            if (data.status == 'success') {
                window.location.href = data.redirect;
            }
        },
        error: function (xhr, status, error) {
            let errors = xhr.responseJSON.errors;
            $.each(errors, function (key, value) {
                notyf.error(value[0]);
            });
        },
        complete: function () { }
    });
});

$('.more_info_form').on('submit', function (e) {
    e.preventDefault();
    let formData = new FormData(this);
    $.ajax({
        method: 'POST',
        url: update_url,
        data: formData,
        contentType: false,
        processData: false,
        beforeSend: function () { },
        success: function (data) {
            if (data.status == 'success') {
                window.location.href = data.redirect;
            }
        },
        error: function (xhr, status, error) {
            let errors = xhr.responseJSON.errors;
            $.each(errors, function (key, value) {
                notyf.error(value[0]);
            });
        },
        complete: function () { }
    });
});

$('.basic_info_update_form').on('submit', function (e) {
    e.preventDefault();
    let formData = new FormData(this);
    $.ajax({
        method: 'POST',
        url: update_url,
        data: formData,
        contentType: false,
        processData: false,
        beforeSend: function () { },
        success: function (data) {
            if (data.status == 'success') {
                window.location.href = data.redirect;
            }
        },
        error: function (xhr, status, error) {
            let errors = xhr.responseJSON.errors;
            $.each(errors, function (key, value) {
                notyf.error(value[0]);
            });
        },
        complete: function () { }
    });
});

// show hide path input depending on source
$(document).on('change', '.storage', function () {
    let value = $(this).val();
    $('.source_input').val('');
    if (value == 'upload') {
        $('.upload_source').removeClass('d-none');
        $('.external_source').addClass('d-none');
    } else {
        $('.external_source').removeClass('d-none');
        $('.upload_source').addClass('d-none');
    }
});

/** Album Contents */
$('.dynamic-modal-btn').on('click', function () {
    $('#dynamic-modal').modal('show');

    let album_id = $(this).data('id');

    $.ajax({
        method: 'GET',
        url: base_url + '/artist/album-content/:id/create-chapter'.replace(':id', album_id),
        data: {},
        beforeSend: function () {
            $('.dynamic-modal-content').html(loader);
        },
        success: function (data) {
            $('.dynamic-modal-content').html(data);
        },
        error: function (xhr, status, error) { }
    })
});

$('.edit_chapter').on('click', function () {
    $('#dynamic-modal').modal('show');

    let chapter_id = $(this).data('chapter-id');

    $.ajax({
        method: 'GET',
        url: base_url + '/artist/album-content/:id/edit-chapter'.replace(':id', chapter_id),
        data: {},
        beforeSend: function () {
            $('.dynamic-modal-content').html(loader);
        },
        success: function (data) {
            $('.dynamic-modal-content').html(data);
        },
        error: function (xhr, status, error) { }
    })
});

$('.add_track').on('click', function () {
    $('#dynamic-modal').modal('show');

    let albumId = $(this).data('album-id');
    let chapterId = $(this).data('chapter-id');

    $.ajax({
        method: 'GET',
        url: base_url + '/artist/album-content/create-track',
        data: {
            'album_id': albumId,
            'chapter_id': chapterId
        },
        beforeSend: function () {
            $('.dynamic-modal-content').html(loader);
        },
        success: function (data) {
            $('.dynamic-modal-content').html(data);
        },
        error: function (xhr, status, error) { }
    })
});

$('.edit_track').on('click', function () {
    $('#dynamic-modal').modal('show');

    let albumId = $(this).data('album-id');
    let chapterId = $(this).data('chapter-id');
    let trackId = $(this).data('track-id');

    $.ajax({
        method: 'GET',
        url: base_url + '/artist/album-content/edit-track',
        data: {
            'album_id': albumId,
            'chapter_id': chapterId,
            'track_id': trackId
        },
        beforeSend: function () {
            $('.dynamic-modal-content').html(loader);
        },
        success: function (data) {
            $('.dynamic-modal-content').html(data);
        },
        error: function (xhr, status, error) { }
    })
});

if ($('.sortable_list').length) {
    $('.sortable_list').sortable({
        items: 'li',
        cursor: 'move',
        handle: '.dragger',
        update: function (event, ui) {
            let orderId = $(this).sortable('toArray', {
                attribute: 'data-track-id',
            });

            let chapterId = ui.item.data('chapter-id');

            $.ajax({
                method: 'POST',
                url: base_url + `/artist/album-content/${chapterId}/sort-track`,
                data: {
                    _token: csrf_token,
                    order_ids: orderId
                },
                success: function (data) {
                    notyf.success(data.message);
                },
                error: function (xhr, status, error) {
                    notyf.error(error);
                }
            })
        }
    });
}

$('.sort_chapter_btn').on('click', function () {
    $('#dynamic-modal').modal('show');
    let albumId = $(this).data('id');
    $.ajax({
        method: 'GET',
        url: base_url + `/artist/album-content/${albumId}/sort-chapter`,
        data: {
        },
        beforeSend: function () {
            $('.dynamic-modal-content').html(loader);
        },
        success: function (data) {
            $('.dynamic-modal-content').html(data);
        },
        error: function (xhr, status, error) {
            notyf.error(error);
        }
    })
});