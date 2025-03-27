<section class="wsus__quality_courses mt_120 xs_mt_100">
    <div class="row quality_course_slider">
        <div class="quality_course_slider_item"
            style="background: url({{ asset('frontend/assets/images/quality_courses_bg.jpg') }}");">
            <div class="col-12">
                <div class="row align-items-center">
                    <div class="col-xxl-5 col-xl-4 col-md-6 col-lg-7 wow fadeInLeft">
                        <div class="wsus__quality_courses_text">
                            <div class="wsus__section_heading heading_left mb_30">
                                <h5>100% QUALITY ALBUMS</h5>
                                <h2>{{ $featuredArtist->title }}</h2>
                            </div>
                            <p>{{ $featuredArtist->subtitle }}</p>
                            <a class="common_btn" href="#">{{ $featuredArtist->button_text }} <i
                                    class="far fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-md-6 col-lg-6 d-none d-xl-block wow fadeInUp">
                        <div class="wsus__quality_courses_img">
                            <img src="{{ asset($featuredArtist->artist_image) }}"
                                alt="Quality
                                Courses" class="img-fluid w-100">
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-4 col-md-6 col-lg-5 wow fadeInUp">
                        <div class="row quality_course_card_slider">
                            @foreach ($featuredArtistAlbums as $album)
                                <div class="col-12">
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
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
