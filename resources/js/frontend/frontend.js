import './cart';

const base_url = $("meta[name='base_url']").attr('content')
const csrf_token = $('meta[name=csrf_token]').attr('content');

/** Notyf init */
window.notyf = new Notyf({
    duration: 4000,
    position: {
        x: 'right',
        y: 'top',
    }
});

$(function () {
    // dynamic delete popup
    $('.delete-item').on('click', function (e) {
        e.preventDefault();

        let url = $(this).attr('href');
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    method: 'DELETE',
                    url: url,
                    data: {
                        _token: csrf_token
                    },
                    success: function (data) {
                        window.location.reload();
                    },
                    error: function (xhr, status, error) {
                        notyf.error(error);
                    }
                })
            }
        });
    });

    $('.newsletter').on('submit', function (e) {
        e.preventDefault();

        let formData = $(this).serialize();
        $.ajax({
            method: 'POST',
            url: `${base_url}/newsletter-subscribe`,
            data: formData,
            beforeSend: function () {
                $('.newsletter-btn').text('Subscribing...');
                $('.newsletter-btn').prop('disabled', true);
            },
            success: function (data) {
                notyf.success(data.message);
                $('.newsletter-btn').trigger('reset');
                $('.newsletter-btn').text('Subscribe');
                $('.newsletter-btn').prop('disabled', false);
            },
            error: function (xhr, status, error) {
                $('.newsletter-btn').trigger('reset');
                $('.newsletter-btn').text('Subscribe');
                notyf.error(xhr.responseJSON.message);
                $('.newsletter-btn').prop('disabled', false);
            }
        })
    });
});