@extends('frontend.layouts.master')
@section('content')
    <section class="wsus__breadcrumb" style="background: url({{ asset('frontend/assets/images/breadcrumb_bg.jpg') }});">
        <div class="wsus__breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12 wow fadeInUp">
                        <div class="wsus__breadcrumb_text">
                            <h1>Albums</h1>
                            <ul>
                                <li><a href="{{ route('home') }}">Home</a></li>
                                <li>Albums</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="wsus__courses mt_120 xs_mt_100 pb_120 xs_pb_100">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-8 order-2 order-lg-1 wow fadeInLeft">
                    <div class="wsus__sidebar">
                        <form action="#">
                            <div class="wsus__sidebar_category">
                                <h3>Categories</h3>
                                <ul class="categoty_list">
                                    <li class="">Studio albums
                                        <div class="wsus__sidebar_sub_category">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="flexCheckDefaultc1">
                                                <label class="form-check-label" for="flexCheckDefaultc1">
                                                    Game developments
                                                </label>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <div class="wsus__sidebar_course_lavel">
                                <h3>genres</h3>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Pop
                                    </label>
                                </div>
                            </div>
                            <div class="wsus__sidebar_course_lavel duration">
                                <h3>Language</h3>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefaulte1">
                                    <label class="form-check-label" for="flexCheckDefaulte1">
                                        English
                                    </label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8 order-lg-1">
                    <div class="wsus__page_courses_header wow fadeInUp">
                        <p>Showing <span>1-9</span> Of <span>62</span> Results</p>
                        <form action="">
                            <select name="order" class="select_js">
                                <option value="desc">New to Old</option>
                                <option value="asc">Old to New</option>
                            </select>
                        </form>
                    </div>
                    <div class="row">
                        @forelse ($albums as $album)
                            <div class="col-xl-4 col-md-6 wow fadeInUp">
                                <div class="wsus__single_courses_3">
                                    <div class="wsus__single_courses_3_img">
                                        <img src="{{ asset($album->thumbnail) }}" alt="Courses" class="img-fluid">
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
                                        <span class="time"><i class="far fa-clock"></i> {{ $album->duration }}</span>
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
                                        <a class="author" href="{{ route('artist.index', $album->artist->id) }}">
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
                    <div class="wsus__pagination mt_50 wow fadeInUp">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <i class="far fa-arrow-left"></i>
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link active" href="#">01</a></li>
                                <li class="page-item"><a class="page-link" href="#">02</a></li>
                                <li class="page-item"><a class="page-link" href="#">03</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <i class="far fa-arrow-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
