<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" />
    <meta name="base_url" content="{{ url('/') }}">
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <title>WDIA - Music Place</title>
    <link rel="icon" type="image/png" href="{{ asset('frontend/assets/images/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/animated_barfiller.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/venobox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/scroll_button.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/pointer.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/jquery.calendar.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/range_slider.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/startRating.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/plyr/3.7.8/plyr.css" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/jquery.simple-bar-graph.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/sticky_menu.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.css') }}">

    <link rel=" stylesheet" href="{{ asset('frontend/assets/css/spacing.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/plyr.css') }}">
    @vite(['resources/js/frontend/player.js'])
</head>

<body class="home_3">

    <div id="preloader">
        <div class="preloader_icon">
            <img src="{{ asset('frontend/assets/images/preloader.png') }}" alt="Preloader" class="img-fluid">
        </div>
    </div>

    <section class="wsus__course_video">
        <div class="col-12">
            <div class="wsus__course_header">
                <a href="{{ route('student.subscribed-albums.index') }}"><i
                        class="fas fa-angle-left"></i>{{ $album->title }}</a>
                <p>Your Progress: {{ $trackCount }} of {{ count($watchedTrackIds) }}
                    ({{ round(count($watchedTrackIds) / $trackCount) * 100 }} %)</p>
            </div>
        </div>

        <div class="wsus__course_video_player">
            <video controls allowfullscreen webkit-playsinline playsinline id="player" style="height: 464px">
                <source id="videoSource" src="" type="video/mp4" />
            </video>
            <div class="video_tabs_area">
                <ul class="nav nav-pills" id="pills-tab2" role="tablist">
                    <li class="nav-item d-lg-none" role="presentation">
                        <button class="nav-link" id="pills-home-tab2" data-bs-toggle="pill"
                            data-bs-target="#pills-home2" type="button" role="tab" aria-controls="pills-home2"
                            aria-selected="true">Album Content</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                            aria-selected="true">Overview</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-disabled-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-disabled" type="button" role="tab"
                            aria-controls="pills-disabled" aria-selected="false">Reviews</button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade d-lg-none" id="pills-home2" role="tabpanel"
                        aria-labelledby="pills-home-tab2" tabindex="0">
                        <div class="video_course_content">
                            <div class="wsus__course_sidebar">
                                <h2 class="video_heading">Album Content</h2>
                                <div class="accordion" id="accordionExample">
                                    @foreach ($album->chapters as $chapter)
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#collapse-{{ $chapter->id }}"
                                                    aria-controls="collapse-{{ $chapter->id }}"
                                                    aria-expanded="false">
                                                    <b>{{ $chapter->title }}</b>
                                                </button>
                                            </h2>
                                            <div id="collapse-{{ $chapter->id }}"
                                                class="accordion-collapse collapse"
                                                data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    @foreach ($chapter->tracks as $track)
                                                        @if ($track->downloadable)
                                                            <div class="form-check">
                                                                <input class="form-check-input make_completed"
                                                                    data-album-id="{{ $album->id }}"
                                                                    data-track-id="{{ $track->id }}"
                                                                    data-chapter-id="{{ $chapter->id }}"
                                                                    type="checkbox" @checked(in_array($track->id, $watchedTrackIds))>
                                                                <label class="form-check-label track"
                                                                    data-album-id="{{ $album->id }}"
                                                                    data-track-id="{{ $track->id }}"
                                                                    data-chapter-id="{{ $chapter->id }}">
                                                                    {{ $track->title }}
                                                                    <span>
                                                                        <img src="{{ asset('frontend/assets/images/video_icon_black_2.png') }}"
                                                                            alt="video" class="img-fluid">
                                                                        {{ $track->duration }}
                                                                    </span>
                                                                </label>
                                                            </div>
                                                            <div class="dropdown">
                                                                <button class="btn btn-secondary" type="button">
                                                                    <i class="fas fa-folder-open"></i> Resources
                                                                </button>
                                                                <ul>
                                                                    <li><a class="dropdown-item"
                                                                            href="{{ $track->file_path }}">Video
                                                                            File</a></li>
                                                                </ul>
                                                            </div>
                                                        @else
                                                            <div class="form-check">
                                                                <input class="form-check-input make_completed"
                                                                    data-album-id="{{ $album->id }}"
                                                                    data-track-id="{{ $track->id }}"
                                                                    data-chapter-id="{{ $chapter->id }}"
                                                                    type="checkbox" @checked(in_array($track->id, $watchedTrackIds))>
                                                                <label class="form-check-label track"
                                                                    data-album-id="{{ $album->id }}"
                                                                    data-track-id="{{ $track->id }}"
                                                                    data-chapter-id="{{ $chapter->id }}">
                                                                    {{ $track->title }}
                                                                    <span>
                                                                        <img src="{{ asset('frontend/assets/images/video_icon_black_2.png') }}"
                                                                            alt="video" class="img-fluid">
                                                                        {{ $track->duration }}
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                        aria-labelledby="pills-home-tab" tabindex="0">
                        <div class="video_about">
                            <h1>Track Lyric</h1>
                            <p class="short_description"></p>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-disabled" role="tabpanel"
                        aria-labelledby="pills-disabled-tab" tabindex="0">
                        <div class="video_review">
                            <h2>Reviews (09)</h2>
                            <div class="course-review-head">
                                <div class="review-author-thumb">
                                    <img src="images/review-author.png" alt="img">
                                </div>
                                <div class="review-author-content">
                                    <div class="author-name">
                                        <h5 class="name">Jura Hujaor <span>2 Days ago</span></h5>
                                        <div class="author-rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                    <h4 class="title">The best LMS Design System</h4>
                                    <p>Maximus ligula eleifend id nisl quis interdum. Sed malesuada tortor non turpis
                                        semper bibendum nisi porta, malesuada risus nonerviverra dolor. Vestibulum ante
                                        ipsum primis in faucibus.</p>
                                </div>
                            </div>


                            <div class="video_review_imput">
                                <h2>Write a reviews</h2>
                                <p>
                                    <span>select rating:</span>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </p>
                                <form action="#">
                                    <textarea name="" id="" cols="30" rows="5" placeholder="Youe coment..."></textarea>
                                    <button type="submit" class="btn arrow-btn back_qna_list">Submit</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="wsus__course_sidebar d-none d-lg-block">
            <h2 class="video_heading">Album Content</h2>
            <div class="accordion" id="accordionExample">
                @foreach ($album->chapters as $chapter)
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse-{{ $chapter->id }}"
                                aria-controls="collapse-{{ $chapter->id }}" aria-expanded="false">
                                <b>{{ $chapter->title }}</b>
                            </button>
                        </h2>
                        <div id="collapse-{{ $chapter->id }}" class="accordion-collapse collapse"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                @foreach ($chapter->tracks as $track)
                                    @if ($track->downloadable)
                                        <div class="form-check">
                                            <input class="form-check-input make_completed"
                                                data-album-id="{{ $album->id }}"
                                                data-track-id="{{ $track->id }}"
                                                data-chapter-id="{{ $chapter->id }}" type="checkbox"
                                                @checked(in_array($track->id, $watchedTrackIds))>
                                            <label class="form-check-label track" data-album-id="{{ $album->id }}"
                                                data-track-id="{{ $track->id }}"
                                                data-chapter-id="{{ $chapter->id }}">
                                                {{ $track->title }}
                                                <span>
                                                    <img src="{{ asset('frontend/assets/images/video_icon_black_2.png') }}"
                                                        alt="video" class="img-fluid">
                                                    {{ $track->duration }}
                                                </span>
                                            </label>
                                        </div>
                                        <div class="dropdown">
                                            <button class="btn btn-secondary" type="button">
                                                <i class="fas fa-folder-open"></i> Resources
                                            </button>
                                            <ul>
                                                <li><a class="dropdown-item" href="{{ $track->file_path }}">Video
                                                        File</a></li>
                                            </ul>
                                        </div>
                                    @else
                                        <div class="form-check">
                                            <input class="form-check-input make_completed" type="checkbox"
                                                @checked(in_array($track->id, $watchedTrackIds)) data-album-id="{{ $album->id }}"
                                                data-track-id="{{ $track->id }}"
                                                data-chapter-id="{{ $chapter->id }}">
                                            <label class="form-check-label track" data-album-id="{{ $album->id }}"
                                                data-track-id="{{ $track->id }}"
                                                data-chapter-id="{{ $chapter->id }}">
                                                {{ $track->title }}
                                                <span>
                                                    <img src="{{ asset('frontend/assets/images/video_icon_black_2.png') }}"
                                                        alt="video" class="img-fluid">
                                                    {{ $track->duration }}
                                                </span>
                                            </label>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>


    <!--jquery library js-->
    <script src="{{ asset('frontend/assets/js/jquery-3.7.1.min.js') }}"></script>
    <!--bootstrap js-->
    <script src="{{ asset('frontend/assets/js/bootstrap.bundle.min.js') }}"></script>
    <!--font-awesome js-->
    <script src="{{ asset('frontend/assets/js/Font-Awesome.js') }}"></script>
    <!--marquee js-->
    <script src="{{ asset('frontend/assets/js/jquery.marquee.min.js') }}"></script>
    <!--slick js-->
    <script src="{{ asset('frontend/assets/js/slick.min.js') }}"></script>
    <!--countup js-->
    <script src="{{ asset('frontend/assets/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.countup.min.js') }}"></script>
    <!--venobox js-->
    <script src="{{ asset('frontend/assets/js/venobox.min.js') }}"></script>
    <!--nice-select js-->
    <script src="{{ asset('frontend/assets/js/jquery.nice-select.min.js') }}"></script>
    <!--Scroll Button js-->
    <script src="{{ asset('frontend/assets/js/scroll_button.js') }}"></script>
    <!--pointer js-->
    <script src="{{ asset('frontend/assets/js/pointer.js') }}"></script>
    <!--range slider js-->
    <script src="{{ asset('frontend/assets/js/range_slider.js') }}"></script>
    <!--barfiller js-->
    <script src="{{ asset('frontend/assets/js/animated_barfiller.js') }}"></script>
    <!--calendar js-->
    <script src="{{ asset('frontend/assets/js/jquery.calendar.js') }}"></script>
    <!--starRating js-->
    <script src="{{ asset('frontend/assets/js/starRating.js') }}"></script>
    <!--Bar Graph js-->
    <script src="{{ asset('frontend/assets/js/jquery.simple-bar-graph.min.js') }}"></script>
    <!--select2 js-->
    <script src="{{ asset('frontend/assets/js/select2.min.js') }}"></script>
    <!--Video player js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/plyr/3.7.8/plyr.min.js"></script>
    <!--wow js-->
    <script src="{{ asset('frontend/assets/js/wow.min.js') }}"></script>

    <!--main/custom js-->
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>

    <script>
        $(function() {
            @if ($watchHistory)
                {
                    let tracks = $('.track');
                    $.each(tracks, function(index, track) {
                        let {
                            chapterId,
                            albumId,
                            trackId
                        } = $(track).data();

                        if (chapterId == @json($watchHistory->chapter_id) &&
                            albumId == @json($watchHistory->album_id) &&
                            trackId == @json($watchHistory->track_id)) {
                            $(track).click();

                            $(track).addClass('active');
                            let accordionCollapse = $(track).closest('.accordion-collapse');
                            accordionCollapse.addClass('show');

                            let accordionButton = accordionCollapse.siblings('.accordion-header').find(
                                '.accordion-button');
                            accordionButton.removeClass('collapsed').attr('aria-expanded', 'true');
                        }
                    })
                }
            @endif
        })
    </script>

</body>

</html>
