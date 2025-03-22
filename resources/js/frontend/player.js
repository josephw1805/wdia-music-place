/** Varaibles */
const base_url = $("meta[name='base_url']").attr('content');
const csrf_token = $('meta[name=csrf_token]').attr('content');
let player = new Plyr('#player');

function viewTrack(videoUrl) {
    const videoSource = document.getElementById("videoSource");
    const player = document.getElementById("player");

    if (videoUrl && videoUrl.trim() !== "") {
        videoSource.setAttribute("src", videoUrl);
        player.load();
    }
}

/** Reusable Functions */
// Update the watch history when track is clicked
function updateWatchHistory(albumId, chapterId, trackId) {
    $.ajax({
        method: 'POST',
        url: `${base_url}/student/update-watch-history`,
        data: {
            '_token': csrf_token,
            'chapter_id': chapterId,
            'track_id': trackId,
            'album_id': albumId
        },
        beforeSend: function () {
        },
        success: function (data) {
        },
        error: function (xhr, status, error) {
        }
    });
}

/** On DOM Load */
// Single click handler for track elements
$('.track').on('click', function () {
    // Remove 'active' class from all tracks and add it to the clicked one
    $('.track').removeClass('active');
    $(this).addClass('active');

    // Get data attributes
    let chapterId = $(this).data('chapter-id');
    let trackId = $(this).data('track-id');
    let albumId = $(this).data('album-id');

    // Call updateWatchHistory to update the watch history
    updateWatchHistory(albumId, chapterId, trackId);

    // Fetch track content via AJAX
    $.ajax({
        method: 'GET',
        url: `${base_url}/student/get-track-content`,
        data: {
            'chapter_id': chapterId,
            'track_id': trackId,
            'album_id': albumId
        },
        beforeSend: function () {
        },
        success: function (data) {
            // load the track Lyric
            $('.short_description').html(data.description.replace(/\n/g, '<br>'));
            viewTrack(data.file_path);
        },
        error: function (xhr, status, error) {
        }
    });
});

$('.make_completed').on('click', function () {
    // Get data attributes
    let chapterId = $(this).data('chapter-id');
    let trackId = $(this).data('track-id');
    let albumId = $(this).data('album-id');

    // Fetch track content via AJAX
    $.ajax({
        method: 'POST',
        url: `${base_url}/student/update-track-completion`,
        data: {
            '_token': csrf_token,
            'chapter_id': chapterId,
            'track_id': trackId,
            'album_id': albumId
        },
        beforeSend: function () {
        },
        success: function (data) {

        },
        error: function (xhr, status, error) {
        }
    });
});