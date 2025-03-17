<style>
    .chapter_sortable_list {
        padding: 10px 0;
    }

    .item_list li {
        color: var(--colorBlack);
        font-size: 18px;
        font-weight: 500;
        border-radius: 8px;
        border: 1px solid gray;
        padding: 13px 50px 13px 55px;
        position: relative;
        margin: 10px;
    }

    .item_list li::before {
        position: absolute;
        content: "\f07c";
        font-family: 'font awesome 5 free';
        font-size: 16px;
        font-weight: 600;
        width: 35px;
        height: 35px;
        line-height: 35px;
        text-align: center;
        background: var(--colorPrimary);
        color: var(--colorWhite);
        top: 7px;
        left: 12px;
        border-radius: 50%;
    }

    .item_list li span {
        font-size: 16px;
        font-weight: bold;
        color: black;
    }
</style>

<div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Sort Chapter</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <form action="" method="POST">
            @csrf
            <ul class="item_list chapter_sortable_list">
                @foreach ($chapters as $chapter)
                    <li data-album-id="{{ $chapter->album_id }}" data-chapter-id="{{ $chapter->id }}">
                        <span>{{ $chapter->title }}</span>
                        <div class="add_course_content_action_btn">
                            <a class="arrow dragger mt-2" href="javascript:;"><i class="fas fa-arrows-alt"></i></a>
                        </div>
                    </li>
                @endforeach
            </ul>
        </form>
    </div>
</div>

<script>
    const base_url = $("meta[name='base_url']").attr('content');
    const csrf_token = $('meta[name=csrf_token]').attr('content');
    $('.btn-close').on('click', function() {
        window.location.reload();
    })

    if ($('.chapter_sortable_list').length) {
        $('.chapter_sortable_list').sortable({
            items: 'li',
            containment: 'parent',
            cursor: 'move',
            handle: '.dragger',
            update: function(event, ui) {
                let orderId = $(this).sortable('toArray', {
                    attribute: 'data-chapter-id',
                });

                let albumId = ui.item.data('album-id');

                $.ajax({
                    method: 'POST',
                    url: base_url + `/artist/album-content/${albumId}/sort-chapter`,
                    data: {
                        _token: csrf_token,
                        order_ids: orderId
                    },
                    success: function(data) {
                        notyf.success(data.message);
                    },
                    error: function(xhr, status, error) {
                        notyf.error(error);
                    }
                })
            }
        });
    }
</script>
