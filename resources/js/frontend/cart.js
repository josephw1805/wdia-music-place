/** variables */
const base_url = $(`meta[name=base_url]`).attr('content');
const csrf_token = $(`meta[name=csrf_token]`).attr('content');

/** reusable functions */
function addToCart(albumId) {
    $.ajax({
        method: 'POST',
        url: base_url + '/add-to-cart/' + albumId,
        data: {
            _token: csrf_token
        },
        beforeSend: function () { },
        success: function (data) {
            notyf.success(data.message);
        },
        error: function (xhr, status, error) {            
            let errorMessage = xhr.responseJSON.message;
            notyf.error(errorMessage);
        }
    });
}

// add album into cart
$('.add_to_cart').on('click', function (e) {
    e.preventDefault();
    let albumId = $(this).data('album-id');
    addToCart(albumId);
});

