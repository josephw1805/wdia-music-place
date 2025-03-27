@extends('frontend.layouts.master')
@section('content')
    <section class="wsus__breadcrumb" style="background: url({{ asset('frontend/assets/images/breadcrumb_bg.jpg') }});">
        <div class="wsus__breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12 wow fadeInUp">
                        <div class="wsus__breadcrumb_text">
                            <h1>How We Work</h1>
                            <ul>
                                <li><a href="{{ route('home') }}">Home</a></li>
                                <li>About Us</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="wsus__about_3 mt_120 xs_mt_100 ">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-xxl-6 col-lg-5 wow fadeInLeft">
                    <div class="wsus__about_3_img">

                        <img src="{{ asset($about->image) }}" alt="About us" class="about_3_large img-fluid w-100">

                        <div class="text">
                            <h4> <span>
                                    @if (count(App\Models\Newsletter::all()) > 1000)
                                        {{ count(App\Models\Newsletter::all()) }}K+
                                    @else
                                        {{ count(App\Models\Newsletter::all()) }}
                                    @endif
                                </span> Subscribed Users</h4>
                        </div>

                        <div class="circle_box">
                            <svg viewBox="0 0 100 100">
                                <defs>
                                    <path id="circle" d=" M 50, 50 m -37, 0 a 37, 37 0 1, 1 74,0 a 37, 37 0 1,1 -74, 0">
                                    </path>
                                </defs>
                                <text>
                                    <textPath xlink:href="#circle">
                                        {{ $about->round_text }}
                                    </textPath>
                                </text>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6 col-lg-6 wow fadeInRight">
                    <div class="wsus__about_3_text">
                        <div class="wsus__section_heading heading_left mb_15">
                            <h5>Learn More About Us</h5>
                            <h2>{{ $about->title }}</h2>
                        </div>
                        {!! $about->description !!}
                        <a class="common_btn" href="{{ $about->button_url }}">{{ $about->button_text }}</a>
                        <div class="about_video">
                            <img src="{{ asset($about->video_image) }}" alt="Video" class="img-fluid w-100">
                            <a class="play_btn venobox" data-autoplay="true" data-vbtype="video"
                                href="{{ $about->video_url }}">
                                <img src="{{ asset('frontend/assets/images/play_icon.png') }}" alt="Play"
                                    class="img-fluid">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="wsus__features_3 wsus__features pt_120 xs_pt_100">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 m-auto wow fadeInUp">
                    <div class="wsus__section_heading mb_25">
                        <h5>High-Quality Albums</h5>
                        <h2>Remote Access To Digital Albums.</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-md-6 col-lg-4 wow fadeInUp">
                    <div class="wsus__features_item_3 orange">
                        <div class="icon">
                            <img src="{{ asset($category[0]->icon) }}" alt="Features" class="img-fluid">
                        </div>
                        <a href="#" class="title">{{ $category[0]->name }}</a>
                        <p>Original, polished collection of songs recorded in a studio.</p>
                        <span>{{ $category[0]->active_album_count }} Albums</span>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-lg-4 wow fadeInUp">
                    <div class="wsus__features_item_3 blue">
                        <div class="icon">
                            <img src="{{ asset($category[1]->icon) }}" alt="Features" class="img-fluid">
                        </div>
                        <a href="#" class="title">{{ $category[1]->name }}</a>
                        <p>Curated collection of songs from multiple sources or releases.</p>
                        <span>{{ $category[1]->active_album_count }} Albums</span>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-lg-4 wow fadeInUp">
                    <div class="wsus__features_item_3 red">
                        <div class="icon">
                            <img src="{{ asset($category[2]->icon) }}" alt="Features" class="img-fluid">
                        </div>
                        <a href="#" class="title">{{ $category[2]->name }}</a>
                        <p>Music performed in front of an audience.</p>
                        <span>{{ $category[2]->active_album_count }} Albums</span>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-lg-4 wow fadeInUp">
                    <div class="wsus__features_item_3 pink">
                        <div class="icon">
                            <img src="{{ asset($category[3]->icon) }}" alt="Features" class="img-fluid">
                        </div>
                        <a href="#" class="title">{{ $category[3]->name }}</a>
                        <p>Visual accompaniment to a song, with creative storytelling.</p>
                        <span>{{ $category[3]->active_album_count }} Albums</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="wsus__about_counter wsus__counter mt_120 xs_mt_100">
        <div class="container">
            <div class="wsus__counter_bg" style="background: url({{ asset('frontend/assets/images/counter_bg.jpg') }});">
                <div class="row">
                    <div class="col-lg-3 col-md-6 wow fadeInUp">
                        <div class="wsus__single_counter">
                            <h2><span class="counter">{{ $counter->counter_one }}</span>k+</h2>
                            <p>{{ $counter->title_one }}</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp">
                        <div class="wsus__single_counter">
                            <h2><span class="counter">{{ $counter->counter_two }}</span>+</h2>
                            <p>{{ $counter->title_two }}</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp">
                        <div class="wsus__single_counter">
                            <h2><span class="counter">{{ $counter->counter_three }}</span>+</h2>
                            <p>{{ $counter->title_three }}</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp">
                        <div class="wsus__single_counter">
                            <h2><span class="counter">{{ $counter->counter_four }}</span>k</h2>
                            <p>{{ $counter->title_four }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="wsus__testimonial pt_120 xs_pt_80">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 m-auto wow fadeInUp">
                    <div class="wsus__section_heading mb_40">
                        <h5>Testimonial</h5>
                        <h2>See What Our Subscribers Say</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row testimonial_slider">
            @foreach ($testimonials as $testimonial)
                <div class="col-xl-4 wow fadeInUp">
                    <div class="wsus__single_testimonial">
                        <p class="rating">
                            @for ($i = 0; $i < $testimonial->rating; $i++)
                                <i class="fas fa-star"></i>
                            @endfor
                        </p>
                        <p class="description">{{ $testimonial->review }}</p>
                        <div class="wsus__testimonial_footer">
                            <div class="img">
                                <img src="{{ asset($testimonial->user_image) }}" alt="user" class="img-fluid">
                            </div>
                            <h3>
                                {{ $testimonial->user_name }}
                                <span>{{ $testimonial->user_title }}</span>
                            </h3>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <section class="blog_4 mt_110 xs_mt_90 pt_120 xs_pt_100 pb_120 xs_pb_100">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 wow fadeInLeft">
                    <div class="wsus__section_heading heading_left mb_50">
                        <h5>Latest blogs</h5>
                        <h2>Our Latest News Feed.</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row blog_4_slider">
            <div class="col-xl-4 wow fadeInUp">
                <div class="wsus__single_blog_4">
                    <a href="#" class="wsus__single_blog_4_img">
                        <img src="images/blog_4_img_1.jpg" alt="Blog" class="img-fluid">
                        <span class="date">March 23, 2024</span>
                    </a>
                    <div class="wsus__single_blog_4_text">
                        <ul>
                            <li>
                                <span><img src="images/user_icon_black.png" alt="User" class="img-fluid"></span>
                                By Richard Tea
                            </li>
                            <li>
                                <span><img src="images/comment_icon_black.png" alt="Comment" class="img-fluid"></span>
                                3 Comments
                            </li>
                        </ul>
                        <a href="#" class="title">Exploring Learning Landscapes in Academic.</a>
                        <p>Suspends dictum sed sem allium convallis Proin dictum ipsum.</p>
                        <a href="#" class="common_btn">Read More <i class="far fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 wow fadeInUp">
                <div class="wsus__single_blog_4">
                    <a href="#" class="wsus__single_blog_4_img">
                        <img src="images/blog_4_img_2.jpg" alt="Blog" class="img-fluid">
                        <span class="date">April 28, 2024</span>
                    </a>
                    <div class="wsus__single_blog_4_text">
                        <ul>
                            <li>
                                <span><img src="images/user_icon_black.png" alt="User" class="img-fluid"></span>
                                By Doug Lyphe
                            </li>
                            <li>
                                <span><img src="images/comment_icon_black.png" alt="Comment" class="img-fluid"></span>
                                21 Comments
                            </li>
                        </ul>
                        <a href="#" class="title">Uncovering Learning Opportunities in Academia.</a>
                        <p>Suspends dictum sed sem allium convallis Proin dictum ipsum.</p>
                        <a href="#" class="common_btn">Read More <i class="far fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 wow fadeInUp">
                <div class="wsus__single_blog_4">
                    <a href="#" class="wsus__single_blog_4_img">
                        <img src="images/blog_4_img_3.jpg" alt="Blog" class="img-fluid">
                        <span class="date">Jan 12, 2024</span>
                    </a>
                    <div class="wsus__single_blog_4_text">
                        <ul>
                            <li>
                                <span><img src="images/user_icon_black.png" alt="User" class="img-fluid"></span>
                                By Eleanor Fant
                            </li>
                            <li>
                                <span><img src="images/comment_icon_black.png" alt="Comment" class="img-fluid"></span>
                                48 Comments
                            </li>
                        </ul>
                        <a href="#" class="title">Internationally Distinguished Skillful Educators.</a>
                        <p>Suspends dictum sed sem allium convallis Proin dictum ipsum.</p>
                        <a href="#" class="common_btn">Read More <i class="far fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 wow fadeInUp">
                <div class="wsus__single_blog_4">
                    <a href="#" class="wsus__single_blog_4_img">
                        <img src="images/blog_4_img_4.jpg" alt="Blog" class="img-fluid">
                        <span class="date">April 28, 2024</span>
                    </a>
                    <div class="wsus__single_blog_4_text">
                        <ul>
                            <li>
                                <span><img src="images/user_icon_black.png" alt="User" class="img-fluid"></span>
                                By Doug Lyphe
                            </li>
                            <li>
                                <span><img src="images/comment_icon_black.png" alt="Comment" class="img-fluid"></span>
                                21 Comments
                            </li>
                        </ul>
                        <a href="#" class="title">Uncovering Learning Opportunities in Academia.</a>
                        <p>Suspends dictum sed sem allium convallis Proin dictum ipsum.</p>
                        <a href="#" class="common_btn">Read More <i class="far fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
