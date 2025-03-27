@extends('frontend.layouts.master')

@section('content')
    <section class="wsus__breadcrumb" style="background: url({{ asset('frontend/assets/images/breadcrumb_bg.jpg') }});">
        <div class="wsus__breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12 wow fadeInUp">
                        <div class="wsus__breadcrumb_text">
                            <h1>Add Albums</h1>
                            <ul>
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li>Add Albums</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="wsus__dashboard mt_90 xs_mt_70 pb_120 xs_pb_100">
        <div class="container">
            <div class="row">
                @include('frontend.artist-dashboard.sidebar')
                <div class="col-xl-9 col-md-8 wow fadeInRight">
                    <div class="wsus__dashboard_contant">
                        <div class="wsus__dashboard_contant_top">
                            <div class="wsus__dashboard_heading relative">
                                <h5>Add Album</h5>
                                <p>Manage your albums.</p>
                            </div>
                        </div>

                        <div class="dashboard_add_courses">
                            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link album-tab {{ request('step') == 1 ? 'active' : '' }}"
                                        data-step="1">Basic Infos</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link album-tab {{ request('step') == 2 ? 'active' : '' }}"
                                        data-step="2">More Infos</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link album-tab {{ request('step') == 3 ? 'active' : '' }}"
                                        data-step="3">Album Contents</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link album-tab {{ request('step') == 4 ? 'active' : '' }}"
                                        data-step="4">Finish</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                @yield('album_content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('header_scripts')
    @vite(['resources/js/frontend/album.js'])
@endpush
