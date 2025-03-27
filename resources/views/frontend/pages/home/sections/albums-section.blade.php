<section class="wsus__courses_3 pt_120 xs_pt_100 mt_120 xs_mt_90 pb_120 xs_pb_100">
    <div class="container">

        <div class="row">
            <div class="col-xl-6 m-auto wow fadeInUp">
                <div class="wsus__section_heading mb_45">
                    <h5>Featured Albums</h5>
                    <h2>Latest Digital Albums.</h2>
                </div>
            </div>
        </div>

        <div class="row wow fadeInUp">
            <div class="col-xxl-6 col-xl-8 m-auto">
                <div class="wsus__filter_area mb_15">
                    <ul class="nav nav-pills justify-content-center" id="pills-tab" role="tablist">
                        @if ($categoryOne)
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-{{ $categoryOne->id }}-tab"
                                    data-bs-toggle="pill" data-bs-target="#pills-{{ $categoryOne->id }}" type="button"
                                    role="tab" aria-controls="pills-home"
                                    aria-selected="true">{{ $categoryOne->name }}</button>
                            </li>
                        @endif
                        @if ($categoryTwo)
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-{{ $categoryTwo->id }}-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-{{ $categoryTwo->id }}" type="button" role="tab"
                                    aria-controls="pills-home" aria-selected="true">{{ $categoryTwo->name }}</button>
                            </li>
                        @endif
                        @if ($categoryThree)
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-{{ $categoryThree->id }}-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-{{ $categoryThree->id }}" type="button" role="tab"
                                    aria-controls="pills-home" aria-selected="true">{{ $categoryThree->name }}</button>
                            </li>
                        @endif
                        @if ($categoryFour)
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-{{ $categoryFour->id }}-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-{{ $categoryFour->id }}" type="button" role="tab"
                                    aria-controls="pills-home" aria-selected="true">{{ $categoryFour->name }}</button>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>

        <div class="tab-content" id="pills-tabContent">
            @if ($categoryOne)
                <div class="tab-pane fade show active" id="pills-{{ $categoryOne->id }}" role="tabpanel"
                    aria-labelledby="pills-{{ $categoryOne->id }}-tab" tabindex="0">
                    <div class="row">
                        @foreach ($categoryOne->albums()->latest()->take(8)->get() as $album)
                            <div class="col-xl-3 col-md-6 col-lg-4">
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
                        @endforeach
                    </div>
                    <div class="row mt_60 wow fadeInUp">
                        <div class="col-12 text-center">
                            <a class="common_btn" href="#">Browse More Albums <i
                                    class="far fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            @endif
            @if ($categoryTwo)
                <div class="tab-pane fade" id="pills-{{ $categoryTwo->id }}" role="tabpanel"
                    aria-labelledby="pills-{{ $categoryTwo->id }}-tab" tabindex="1">
                    <div class="row">
                        @foreach ($categoryTwo->albums()->latest()->take(8)->get() as $album)
                            <div class="col-xl-3 col-md-6 col-lg-4">
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
                    <div class="row mt_60 wow fadeInUp">
                        <div class="col-12 text-center">
                            <a class="common_btn" href="#">Browse More Albums <i
                                    class="far fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            @endif
            @if ($categoryThree)
                <div class="tab-pane fade" id="pills-{{ $categoryThree->id }}" role="tabpanel"
                    aria-labelledby="pills-{{ $categoryThree->id }}-tab" tabindex="2">
                    <div class="row">
                        @foreach ($categoryThree->albums()->latest()->take(8)->get() as $album)
                            <div class="col-xl-3 col-md-6 col-lg-4">
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
                    <div class="row mt_60 wow fadeInUp">
                        <div class="col-12 text-center">
                            <a class="common_btn" href="#">Browse More Albums <i
                                    class="far fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            @endif
            @if ($categoryFour)
                <div class="tab-pane fade" id="pills-{{ $categoryFour->id }}" role="tabpanel"
                    aria-labelledby="pills-{{ $categoryFour->id }}-tab" tabindex="3">
                    <div class="row">
                        @foreach ($categoryFour->albums()->latest()->take(8)->get() as $album)
                            <div class="col-xl-3 col-md-6 col-lg-4">
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
                    <div class="row mt_60 wow fadeInUp">
                        <div class="col-12 text-center">
                            <a class="common_btn" href="#">Browse More Albums <i
                                    class="far fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>
