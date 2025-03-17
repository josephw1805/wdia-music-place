@extends('frontend.layouts.master')

@section('content')
    <section class="wsus__breadcrumb" style="background: url({{ asset('frontend/assets/images/breadcrumb_bg.jpg') }});">
        <div class="wsus__breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12 wow fadeInUp">
                        <div class="wsus__breadcrumb_text">
                            <h1>Dashboard</h1>
                            <ul>
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li>Dashboard</li>
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
                @include('frontend.student-dashboard.sidebar')
                <div class="col-xl-9 col-md-8 wow fadeInRight">
                    <div class="wsus__dashboard_contant">
                        <div class="wsus__dashboard_contant_top d-flex flex-wrap justify-content-between">
                            <div class="wsus__dashboard_heading">
                                <h5>Profile Details</h5>
                                <p>{{ auth()->user()->headline }}</p>
                            </div>
                            <div class="wsus__dashboard_contant_btn">
                                <a href="{{ route('student.profile.edit', auth()->user()->id) }}" class="common_btn">Edit
                                    Profile</a>
                            </div>
                        </div>

                        <div class="wsus__dashboard_profile">
                            <div class="text ms-0">
                                <h6>About Me</h6>
                                <p>{{ auth()->user()->bio }}</p>
                            </div>
                        </div>

                        <ul class="wsus__dashboard_profile_info">
                            <li><span>Name :</span>{{ auth()->user()->name }}</li>
                            <li><span>Email :</span>{{ auth()->user()->email }}</li>
                            <li><span>Facebook :</span>{{ auth()->user()->facebook }}</li>
                            <li><span>TikTok :</span>{{ auth()->user()->tiktok }}</li>
                            <li><span>Instagram : </span>{{ auth()->user()->instagram }}</li>
                            <li><span>Website :</span>{{ auth()->user()->website }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
