<section class="wsus__brand mt_45 pt_120 xs_pt_100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="wsus__brand_slider_area wow fadeInUp">
                    <div class="wsus__section_heading heading_left mb_50">
                        <h2>Top companies choose <a href="javascript:;">WDIA</a> to build
                            <br> in-demand entertainment
                        </h2>
                    </div>
                    <div class="marquee_animi">
                        <ul class="d-flex flex-wrap">
                            @foreach ($brands as $brand)
                                <li>
                                    <img src="{{ asset($brand->image) }}" alt="brand" class="img-fluid w-100">
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
