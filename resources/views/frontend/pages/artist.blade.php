@extends('frontend.layouts.master')
@section('content')
    <section class="wsus__breadcrumb" style="background: url({{ asset('frontend/assets/images/breadcrumb_bg.jpg') }});">
        <div class="wsus__breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12 wow fadeInUp">
                        <div class="wsus__breadcrumb_text">
                            <h1>Artist Details</h1>
                            <ul>
                                <li><a href="{{ route('home') }}">Home</a></li>
                                <li>Artist Details</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="wsus__instructor_details mt_120 xs_mt_100 mb_120 xs_mb_100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="instructor_details_content instructor_finder_list">
                        <div class="row align-items-center">
                            <div class="col-xl-4 col-lg-5 col-md-8 wow fadeInLeft">
                                <div class="instructor_finder_img">
                                    <img src="{{ asset($artist->image) }}" alt="Instructor" class="img-fluid w-100">
                                </div>
                            </div>
                            <div class="col-xl-8 col-lg-7 wow fadeInRight">
                                <div class="instructor_finder_text">
                                    <a href="#" class="title">{{ $artist->name }}</a>
                                    <ul class="list">
                                        <li>{!! $artist->headline !!}</li>
                                    </ul>
                                    <ul class="badges d-flex flex-wrap">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Crown">
                                            <img src="{{ asset('frontend/assets/images/badge_1.png') }}" alt="Badge"
                                                class="img-fluid">
                                        </li>
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Heart">
                                            <img src="{{ asset('frontend/assets/images/badge_2.png') }}" alt="Badge"
                                                class="img-fluid">
                                        </li>
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Sugar">
                                            <img src="{{ asset('frontend/assets/images/badge_3.png') }}" alt="Badge"
                                                class="img-fluid">
                                        </li>
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Earth"><img
                                                src="{{ asset('frontend/assets/images/badge_4.png') }}" alt="Badge"
                                                class="img-fluid"></li>
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Dragon">
                                            <img src="{{ asset('frontend/assets/images/badge_5.png') }}" alt="Badge"
                                                class="img-fluid">
                                        </li>
                                    </ul>
                                    <p class="description">{!! $artist->bio !!}</p>

                                    <ul class="overview d-flex flex-wrap">
                                        <li>
                                            <div class="icon green">
                                                <img src="{{ asset('frontend/assets/images/user_icon_white.png') }}"
                                                    alt="user" class="img-fluid">
                                            </div>
                                            <div class="text">
                                                <h2>54</h2>
                                                <span>Followers</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon sky">
                                                <img src="{{ asset('frontend/assets/images/book_icon_white.png') }}"
                                                    alt="book" class="img-fluid">
                                            </div>
                                            <div class="text">
                                                <h2>28</h2>
                                                <span>Courses</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon red">
                                                <img src="{{ asset('frontend/assets/images/comment_icon_white.png') }}"
                                                    alt="comment" class="img-fluid">
                                            </div>
                                            <div class="text">
                                                <h2>77</h2>
                                                <span>Reviews</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon blue">
                                                <img src="{{ asset('frontend/assets/images/video_icon_white.png') }}"
                                                    alt="video" class="img-fluid">
                                            </div>
                                            <div class="text">
                                                <h2>54</h2>
                                                <span>Concerts</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>

                    <ul class="nav nav-pills instructor_det_tabs mt_50 wow fadeInUp" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                aria-selected="true">About</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                                aria-selected="false">Albums</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-disabled-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-disabled" type="button" role="tab"
                                aria-controls="pills-disabled" aria-selected="false">Articles</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-disabled-tab2" data-bs-toggle="pill"
                                data-bs-target="#pills-disabled2" type="button" role="tab"
                                aria-controls="pills-disabled2" aria-selected="false">Badges</button>
                        </li>
                    </ul>

                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab" tabindex="0">
                            <div class="instructor_details_about wow fadeInUp">
                                <h3>{{ $artist->headline }}</h3>
                                <p>{{ $artist->bio }}</p>
                                <h3>Discography</h3>
                                <ul class="skills d-flex flex-wrap">
                                    @forelse (explode("\n", $artist->experience) as $exp)
                                        <li><a href="#">{{ $exp }}</a></li>
                                    @empty
                                        No experience available!
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                            aria-labelledby="pills-profile-tab" tabindex="0">
                            <div class="instructor_details_courses">
                                <div class="row">
                                    @php
                                        $albums = App\Models\Album::where([
                                            'is_approved' => 'approved',
                                            'artist_Id' => $artist->id,
                                        ])
                                            ->limit(4)
                                            ->orderBy('created_at', 'desc')
                                            ->get();
                                    @endphp
                                    @forelse ($albums as $album)
                                        <div class="col-xl-3 col-md-6 col-lg-4">
                                            <div class="wsus__single_courses_3">
                                                <div class="wsus__single_courses_3_img">
                                                    <img src="{{ asset($album->thumbnail) }}" alt="Courses"
                                                        class="img-fluid">
                                                    <ul>
                                                        <li>
                                                            <a href="#">
                                                                <img src="{{ asset('frontend/assets/images/love_icon_black.png') }}"
                                                                    alt="Love" class="img-fluid">
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;" class="add_to_cart"
                                                                data-album-id="{{ $album->id }}">
                                                                <img src="{{ asset('frontend/assets/images/cart_icon_black_2.png') }}"
                                                                    alt="Cart" class="img-fluid">
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <span class="time"><i class="far fa-clock"></i>
                                                        {{ $album->duration }}</span>
                                                </div>
                                                <div class="wsus__single_courses_text_3">
                                                    <div class="rating_area">
                                                        @php
                                                            $category = App\Models\AlbumCategory::where(
                                                                'id',
                                                                $album->category->parent_id,
                                                            )->first();
                                                        @endphp
                                                        <a href="javascript:;" class="category">{{ $category->name }}</a>
                                                    </div>

                                                    <a class="title"
                                                        href="{{ route('albums.show', $album->slug) }}">{{ $album->title }}</a>
                                                    <ul>
                                                        @php
                                                            $trackCount = $album->chapters
                                                                ->flatMap(function ($chapter) {
                                                                    return $chapter->tracks;
                                                                })
                                                                ->count();
                                                        @endphp
                                                        <li>{{ $trackCount }} Tracks</li>
                                                        <li>38 Followers</li>
                                                    </ul>
                                                    <a class="author"
                                                        href="{{ route('artist.index', $album->artist->id) }}">
                                                        <div class="img">
                                                            <img src="{{ asset($album->artist->image) }}" alt="Author"
                                                                class="img-fluid">
                                                        </div>
                                                        <h4>{{ $album->artist->name }}</h4>
                                                    </a>
                                                </div>
                                                <div class="wsus__single_courses_3_footer">
                                                    <a class="common_btn add_to_cart" href="javascript:;"
                                                        data-album-id="{{ $album->id }}">Add to Cart <i
                                                            class="far fa-arrow-right"></i></a>
                                                    <p>
                                                        @if ($album->price == 0)
                                                            FREE
                                                        @elseif ($album->discount > 0)
                                                            <del>${{ $album->price }}</del> ${{ $album->discount }}
                                                        @else
                                                            ${{ $album->price }}
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        No Album Available!
                                    @endforelse
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-disabled" role="tabpanel"
                            aria-labelledby="pills-disabled-tab" tabindex="0">
                            <div class="instructor_details_blog">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="wsus__single_blog_4">
                                            <a href="#" class="wsus__single_blog_4_img">
                                                <img src="images/blog_4_img_1.jpg" alt="Blog" class="img-fluid">
                                                <span class="date">March 23, 2024</span>
                                            </a>
                                            <div class="wsus__single_blog_4_text">
                                                <ul>
                                                    <li>
                                                        <span><img
                                                                src="{{ asset('frontend/assets/images/user_icon_black.png') }}"
                                                                alt="User" class="img-fluid"></span>
                                                        By Richard Tea
                                                    </li>
                                                    <li>
                                                        <span><img
                                                                src="{{ asset('frontend/assets/images/comment_icon_black.png') }}"
                                                                alt="Comment" class="img-fluid"></span>
                                                        3 Comments
                                                    </li>
                                                </ul>
                                                <a href="#" class="title">Exploring Learning Landscapes in
                                                    Academic.</a>
                                                <p>Suspends dictum sed sem allium convallis Proin dictum ipsum.</p>
                                                <a href="#" class="common_btn">Read More <i
                                                        class="far fa-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-disabled2" role="tabpanel"
                            aria-labelledby="pills-disabled-tab2" tabindex="0">
                            <div class="instructor_details_bagdes">
                                <div class="row">
                                    <div class="col-xl-3 col-md-6 col-lg-4">
                                        <div class="instructor_details_bagdes_item">
                                            <div class="img">
                                                <img src="{{ asset('frontend/assets/images/badge_1.png') }}"
                                                    alt="Badges" class="img-fluid">
                                            </div>
                                            <h4>CROWN</h4>
                                            <p>Metal</p>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-6 col-lg-4">
                                        <div class="instructor_details_bagdes_item">
                                            <div class="img">
                                                <img src="{{ asset('frontend/assets/images/badge_2.png') }}"
                                                    alt="Badges" class="img-fluid">
                                            </div>
                                            <h4>HEART</h4>
                                            <p>Fluff</p>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-6 col-lg-4">
                                        <div class="instructor_details_bagdes_item">
                                            <div class="img">
                                                <img src="{{ asset('frontend/assets/images/badge_3.png') }}"
                                                    alt="Badges" class="img-fluid">
                                            </div>
                                            <h4>SUGAR</h4>
                                            <p>Gummy</p>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-6 col-lg-4">
                                        <div class="instructor_details_bagdes_item">
                                            <div class="img">
                                                <img src="{{ asset('frontend/assets/images/badge_4.png') }}"
                                                    alt="Badges" class="img-fluid">
                                            </div>
                                            <h4>EARTH</h4>
                                            <p>Translucent</p>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-6 col-lg-4">
                                        <div class="instructor_details_bagdes_item">
                                            <div class="img">
                                                <img src="{{ asset('frontend/assets/images/badge_5.png') }}"
                                                    alt="Badges" class="img-fluid">
                                            </div>
                                            <h4>DRAGON</h4>
                                            <p>Alien</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-disabled3" role="tabpanel"
                            aria-labelledby="pills-disabled-tab3" tabindex="0">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
