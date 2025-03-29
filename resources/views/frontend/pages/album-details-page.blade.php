@extends('frontend.layouts.master')
@push('meta')
    <meta property="og:title" content="{{ $album->title }}">
    <meta property="og:description" content="{{ $album->seo_description }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset($album->thumbnail) }}">
    <meta property="og:type" content="Album">
@endpush
@section('content')
    <section class="wsus__breadcrumb course_details_breadcrumb"
        style="background: url({{ asset('frontend/assets/images/breadcrumb_bg.jpg') }});">
        <div class="wsus__breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12 wow fadeInUp">
                        <div class="wsus__breadcrumb_text">
                            <p class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <span>(4 Reviews)</span>
                            </p>
                            <h1>{{ $album->title }}</h1>
                            <ul class="list">
                                <li>
                                    <span><img src="{{ asset($album->artist->image) }}" alt="user"
                                            class="img-fluid"></span>
                                    By {{ $album->artist->name }}
                                </li>
                                <li>
                                    <span><img src="{{ asset('frontend/assets/images/globe_icon_blue.png') }}"
                                            alt="Globe" class="img-fluid"></span>
                                    {{ $album->category->name }}
                                </li>
                                <li>
                                    <span><img src="{{ asset('frontend/assets/images/calendar_blue.png') }}" alt="Calendar"
                                            class="img-fluid"></span>
                                    Last updated
                                    {{ date('d/m/Y', strtotime($album->updated_at->setTimezone(new DateTimeZone('America/New_York')))) }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="wsus__courses_details pb_120 xs_pb_100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 wow fadeInLeft">
                    <div class="wsus__courses_details_area mt_40">

                        <ul class="nav nav-pills mb_40" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                    aria-selected="true">Overview</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-profile" type="button" role="tab"
                                    aria-controls="pills-profile" aria-selected="false">Content</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-contact" type="button" role="tab"
                                    aria-controls="pills-contact" aria-selected="false">Artist</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-disabled-tab2" data-bs-toggle="pill"
                                    data-bs-target="#pills-disabled2" type="button" role="tab"
                                    aria-controls="pills-disabled2" aria-selected="false">Review</button>
                            </li>
                        </ul>

                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                aria-labelledby="pills-home-tab" tabindex="0">
                                <div class="wsus__courses_overview box_area">
                                    <h3>Overview</h3>
                                    <p>{!! $album->description !!}</p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                aria-labelledby="pills-profile-tab" tabindex="0">
                                <div class="wsus__courses_curriculum box_area">
                                    <h3>Album Content</h3>
                                    <div class="accordion" id="accordionExample">
                                        @foreach ($album->chapters as $chapter)
                                            <div class="accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapse-{{ $chapter->id }}"
                                                        aria-expanded="false"
                                                        aria-controls="collapse-{{ $chapter->id }}">
                                                        {{ $chapter->title }}
                                                    </button>
                                                </h2>
                                                <div id="collapse-{{ $chapter->album_id }}"
                                                    class="accordion-collapse collapse"
                                                    data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <ul>
                                                            @foreach ($chapter->tracks as $track)
                                                                <li class="{{ $track->is_preview ? 'active' : '' }}">
                                                                    <p>{{ $track->title }}</p>
                                                                    @if ($track->is_preview)
                                                                        <a class="right_text venobox vbox-item"
                                                                            data-autoplay="true" data-vbtype="video"
                                                                            href="{{ $track->file_path }}">{{ $track->is_preview ? 'Preview' : $track->duration }}</a>
                                                                    @else
                                                                        <span
                                                                            class="right_text">{{ $track->duration }}</span>
                                                                    @endif
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                aria-labelledby="pills-contact-tab" tabindex="0">
                                <div class="wsus__courses_instructor box_area">
                                    <h3>Artist Details</h3>
                                    <div class="row align-items-center">
                                        <div class="col-lg-4 col-md-6">
                                            <div class="wsus__courses_instructor_img">
                                                <img src="{{ asset($album->artist->image) }}" alt="Instructor"
                                                    class="img-fluid">
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-md-6">
                                            <div class="wsus__courses_instructor_text">
                                                <h4>{{ $album->artist->name }}</h4>
                                                <p class="designation">{{ $album->artist->headline }}</p>
                                                <ul class="list">
                                                    <li><i class="fas fa-star"></i> <b>74,537 Reviews</b></li>
                                                    <li><strong>4.7 Rating</strong></li>
                                                    <li>
                                                        <span><img
                                                                src="{{ asset('frontend/assets/images/book_icon.png') }}"
                                                                alt="book" class="img-fluid"></span>
                                                        {{ $album->artist->albums()->count() }} Albums
                                                    </li>
                                                    <li>
                                                        <span><img
                                                                src="{{ asset('frontend/assets/images/user_icon_gray.png') }}"
                                                                alt="user" class="img-fluid"></span>
                                                        32 Followers
                                                    </li>
                                                </ul>
                                                <ul class="badge d-flex flex-wrap">
                                                    <li data-bs-toggle="tooltip" data-bs-placement="top"
                                                        data-bs-title="Crown">
                                                        <img src="{{ asset('frontend/assets/images/badge_1.png') }}"
                                                            alt="Badge" class="img-fluid">
                                                    </li>
                                                    <li data-bs-toggle="tooltip" data-bs-placement="top"
                                                        data-bs-title="Heart"><img
                                                            src="{{ asset('frontend/assets/images/badge_2.png') }}"
                                                            alt="Badge" class="img-fluid"></li>
                                                    <li data-bs-toggle="tooltip" data-bs-placement="top"
                                                        data-bs-title="Sugar"><img
                                                            src="{{ asset('frontend/assets/images/badge_3.png') }}"
                                                            alt="Badge" class="img-fluid"></li>
                                                    <li data-bs-toggle="tooltip" data-bs-placement="top"
                                                        data-bs-title="Earth"><img
                                                            src="{{ asset('frontend/assets/images/badge_4.png') }}"
                                                            alt="Badge" class="img-fluid">
                                                    </li>
                                                    <li data-bs-toggle="tooltip" data-bs-placement="top"
                                                        data-bs-title="Dragon">
                                                        <img src="{{ asset('frontend/assets/images/badge_5.png') }}"
                                                            alt="Badge" class="img-fluid">
                                                    </li>
                                                </ul>
                                                <p class="description">
                                                    {!! $album->artist->bio !!}
                                                </p>
                                                <ul class="link d-flex flex-wrap">
                                                    @if ($album->artist->website)
                                                        <li><a href="{{ $album->artist->website }}" target="_blank"><i
                                                                    class="fab fa-weibo"></i></a></li>
                                                    @endif
                                                    @if ($album->artist->facebook)
                                                        <li><a href="{{ $album->artist->facebook }}" target="_blank"><i
                                                                    class="fab fa-facebook-f"></i></a></li>
                                                    @endif
                                                    @if ($album->artist->tiktok)
                                                        <li><a href="{{ $album->artist->tiktok }}" target="_blank"><i
                                                                    class="fab fa-tiktok"></i></a></li>
                                                    @endif
                                                    @if ($album->artist->instagram)
                                                        <li><a href="{{ $album->artist->instagram }}" target="_blank"><i
                                                                    class="fab fab fa-instagram"></i></a></li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-disabled2" role="tabpanel"
                                aria-labelledby="pills-disabled-tab2" tabindex="0">
                                <div class="wsus__courses_review box_area">
                                    <h3>Customer Reviews</h3>
                                    <div class="row align-items-center mb_50">
                                        <div class="col-xl-4 col-md-6">
                                            <div class="total_review">
                                                <h2>{{ number_format($album->reviews()->avg('rating'), 1) ?? 0 }}</h2>
                                                <p>
                                                    @for ($i = 0; $i < $album->reviews()->avg('rating'); $i++)
                                                        <i class="fas fa-star"></i>
                                                    @endfor
                                                </p>
                                                <h4>{{ $album->reviews()->count() }} Ratings</h4>
                                            </div>
                                        </div>
                                        <div class="col-xl-8 col-md-6">
                                            <div class="review_bar">
                                                @for ($i = 5; $i > 0; $i--)
                                                    <div class="review_bar_single">
                                                        <p>{{ $i }} <i class="fas fa-star"></i></p>
                                                        <div id="bar1" class="barfiller">
                                                            <div class="tipWrap">
                                                                <span class="tip"></span>
                                                            </div>
                                                            <span class="fill"
                                                                data-percentage="{{ ($album->reviews()->where('rating', $i)->count() / $album->reviews()->count()) * 100 }}"></span>
                                                        </div>
                                                        <span
                                                            class="qnty">{{ $album->reviews()->where('rating', $i)->count() }}</span>
                                                    </div>
                                                @endfor
                                            </div>
                                        </div>
                                    </div>
                                    <h3>Reviews</h3>
                                    @foreach ($reviews as $review)
                                        <div class="wsus__course_single_reviews">
                                            <div class="wsus__single_review_img">
                                                <img src="{{ asset($review->user->image) }}" alt="user"
                                                    class="img-fluid">
                                            </div>
                                            <div class="wsus__single_review_text">
                                                <h4>{{ $review->user->name }}</h4>
                                                <h6> {{ date('d M Y', strtotime($review->created_at)) }}
                                                    <span>
                                                        @for ($i = 0; $i < $review->rating; $i++)
                                                            <i class="fas fa-star"></i>
                                                        @endfor
                                                    </span>
                                                </h6>
                                                <p>{{ $review->review }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div>
                                        {{ $reviews->links() }}
                                    </div>
                                </div>
                                @auth
                                    <div class="wsus__courses_review_input box_area mt_40">
                                        <h3>Write a Review</h3>
                                        <div class="select_rating d-flex flex-wrap">Your Rating:
                                            <ul id="starRating" data-stars="5"></ul>
                                        </div>
                                        <form action="{{ route('review.store') }}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <input type="hidden" name="rating" id="rating">
                                                <input type="hidden" name="album" value="{{ $album->id }}">
                                                <div class="col-xl-12">
                                                    <textarea rows="7" placeholder="Review" name="review"></textarea>
                                                </div>
                                                <div class="col-12">
                                                    <button type="submit" class="common_btn">Post Review</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-8 wow fadeInRight">
                    <div class="wsus__courses_sidebar">
                        <div class="wsus__courses_sidebar_video">
                            <img src="{{ asset($album->thumbnail) }}" alt="Video" class="img-fluid">
                            @if ($album->demo_video_source)
                                <a class="play_btn venobox vbox-item" data-autoplay="true" data-vbtype="video"
                                    href="{{ $album->demo_video_source }}">
                                    <img src="{{ asset('frontend/assets/images/play_icon_white.png') }}" alt="Play"
                                        class="img-fluid">
                                </a>
                            @endif
                        </div>
                        <h3 class="wsus__courses_sidebar_price">
                            @if ($album->price == 0)
                                FREE
                            @elseif ($album->discount > 0)
                                <del>${{ $album->price }}</del>${{ $album->discount }}
                            @else
                                ${{ $album->price }}
                            @endif
                        </h3>
                        <div class="wsus__courses_sidebar_list_info">
                            <ul>
                                <li>
                                    <p>
                                        <span><img src="{{ asset('frontend/assets/images/clock_icon_black.png') }}"
                                                alt="clock" class="img-fluid"></span>
                                        Album Duration
                                    </p>
                                    {{ $album->duration }}
                                </li>
                                <li>
                                    <p>
                                        <span><img src="{{ asset('frontend/assets/images/network_icon_black.png') }}"
                                                alt="network" class="img-fluid"></span>
                                        Genre
                                    </p>
                                    {{ $album->genre->name }}
                                </li>
                                <li>
                                    <p>
                                        <span><img src="{{ asset('frontend/assets/images/user_icon_black_2.png') }}"
                                                alt="User" class="img-fluid"></span>
                                        Followers
                                    </p>
                                    47
                                </li>
                                <li>
                                    <p>
                                        <span><img src="{{ asset('frontend/assets/images/language_icon_black.png') }}"
                                                alt="Language" class="img-fluid"></span>
                                        Language
                                    </p>
                                    {{ $album->language->name }}
                                </li>
                            </ul>
                            <a class="common_btn" href="#">Buy The Album <i class="far fa-arrow-right"></i></a>
                        </div>
                        <div class="wsus__courses_sidebar_share_btn d-flex flex-wrap justify-content-between">
                            <a href="#" class="common_btn"><i class="far fa-heart"></i> Add to Wishlist</a>
                        </div>
                        <div class="wsus__courses_sidebar_share_area">
                            <span>Share:</span>
                            <ul>
                                <li class="ez-facebook"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li class="ez-linkedin"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                <li class="ez-x"><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li class="ez-reddit"><a href="#"><i class="fab fa-reddit"></i></a></li>
                            </ul>
                        </div>
                        <div class="wsus__courses_sidebar_info">
                            <h3>This Album Includes</h3>
                            <ul>
                                <li>
                                    <span><img src="{{ asset('frontend/assets/images/video_icon_black.png') }}"
                                            alt="video" class="img-fluid"></span>
                                    {{ $album->duration }}
                                </li>
                                <li>
                                    <span><img src="{{ asset('frontend/assets/images/file_download_icon_black.png') }}"
                                            alt="download" class="img-fluid"></span>
                                    @php
                                        $downloadable = $album->chapters
                                            ->flatMap(function ($chapter) {
                                                return $chapter->tracks;
                                            })
                                            ->filter(function ($track) {
                                                return $track->downloadable;
                                            })
                                            ->count();
                                    @endphp
                                    {{ $downloadable }}
                                    Downloadable tracks
                                </li>
                                <li>
                                    <span><img src="{{ asset('frontend/assets/images/certificate_icon_black.png') }}"
                                            alt="Certificate" class="img-fluid"></span>
                                    Certificate of Completion
                                </li>
                                <li>
                                    <span><img src="{{ asset('frontend/assets/images/life_time_icon.png') }}"
                                            alt="Certificate" class="img-fluid"></span>
                                    Lifetime Access
                                </li>
                            </ul>

                        </div>
                        <div class="wsus__courses_sidebar_instructor">
                            <div class="image_area d-flex flex-wrap align-items-center">
                                <div class="img">
                                    <img src="{{ asset($album->artist->image) }}" alt="Instructor" class="img-fluid">
                                </div>
                                <div class="text">
                                    <h3>{{ $album->artist->name }}</h3>
                                    <p>{{ $album->artist->headline }}</p>
                                </div>
                            </div>
                            <ul class="d-flex flex-wrap">
                                <li data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Crown">
                                    <img src="{{ asset('frontend/assets/images/badge_1.png') }}" alt="Badge"
                                        class="img-fluid">
                                </li>
                                <li data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Heart"><img
                                        src="{{ asset('frontend/assets/images/badge_2.png') }}" alt="Badge"
                                        class="img-fluid"></li>
                                <li data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Sugar"><img
                                        src="{{ asset('frontend/assets/images/badge_3.png') }}" alt="Badge"
                                        class="img-fluid"></li>
                                <li data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Earth"><img
                                        src="{{ asset('frontend/assets/images/badge_4.png') }}" alt="Badge"
                                        class="img-fluid"></li>
                                <li data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Dragon">
                                    <img src="{{ asset('frontend/assets/images/badge_5.png') }}" alt="Badge"
                                        class="img-fluid">
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/gh/shakilahmed0369/ez-share/dist/ez-share.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            ezShare.execute();
        });
    </script>
    <script>
        $(function() {
            $('#starRating li').on('click', function() {
                let $starRating = $('#starRating').find('.star.active').length;

                $('#rating').val($starRating);
            })
        })
    </script>
@endpush
