<section class="wsus__category_4 mt_190 xs_mt_100">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 m-auto wow fadeInUp">
                <div class="wsus__section_heading mb_35">
                    <h5>Categories</h5>
                    <h2>Explore Categories</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($category as $cat)
                <div class="col-xxl-3 col-md-6 col-lg-4 wow fadeInUp">
                    <a href="#" class="wsus__single_category_4">
                        <div class="icon">
                            <img src="{{ asset($cat->icon) }}" alt="category" class="img-fluid w-100">
                        </div>
                        <div class="text">
                            <h4>{{ $cat->name }}</h4>
                            <p>{{ $cat->active_album_count }} Albums</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
