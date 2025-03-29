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
                        <form action="{{ route('albums.index') }}">
                            <div class="wsus__sidebar_search">
                                <input type="text" placeholder="Search Album" name="search"
                                    value="{{ request()->search ?? '' }}">
                                <button type="submit">
                                    <img src="{{ asset('frontend/assets/images/search_icon.png') }}" alt="Search"
                                        class="img-fluid">
                                </button>
                            </div>
                            <div class="wsus__sidebar_category">
                                <h3>Categories</h3>
                                <ul class="categoty_list">
                                    @foreach ($categories as $category)
                                        <li class="active">{{ $category->name }}
                                            <div class="wsus__sidebar_sub_category">
                                                @foreach ($category->subcategories as $subcategory)
                                                    <div class="form-check">
                                                        <input @checked(in_array($subcategory->id, request()->category ?? [])) class="form-check-input"
                                                            type="checkbox" value="{{ $subcategory->id }}"
                                                            id="category-{{ $subcategory->id }}" name="category[]">
                                                        <label class="form-check-label"
                                                            for="category-{{ $subcategory->id }}">
                                                            {{ $subcategory->name }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="wsus__sidebar_course_lavel">
                                <h3>Genres</h3>
                                @foreach ($genres as $genre)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="{{ $genre->id }}"
                                            id="genre-{{ $genre->id }}" name="genre[]" @checked(in_array($genre->id, request()->genre ?? []))>
                                        <label class="form-check-label" for="genre-{{ $genre->id }}">
                                            {{ $genre->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="wsus__sidebar_course_lavel duration">
                                <h3>Language</h3>
                                @foreach ($languages as $language)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="{{ $language->id }}"
                                            id="language-{{ $language->id }}" name="language[]"
                                            @checked(in_array($language->id, request()->language ?? []))>
                                        <label class="form-check-label" for="language-{{ $language->id }}">
                                            {{ $language->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="wsus__sidebar_rating">
                                <h3>Price Range</h3>
                                <div class="range_slider"></div>
                            </div>
                            <div class="row mt-3">
                                <button type="submit" class="common_btn">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8 order-lg-1">
                    <div class="wsus__page_courses_header wow fadeInUp">
                        <p>Showing <span>1-{{ $albums->count() }}</span> Of <span>{{ $albums->total() }}</span> Results
                        </p>
                        <form action="{{ route('albums.index') }}">
                            <select name="order" class="select_js" onchange="this.form.submit()">
                                <option value="desc" @selected(request()->order == 'desc')>New to Old</option>
                                <option value="asc" @selected(request()->order == 'asc')>Old to New</option>
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
                        {{ $albums->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
