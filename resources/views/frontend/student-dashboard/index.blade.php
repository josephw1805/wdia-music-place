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
                <div class="col-xl-9 col-md-8">
                    @if (auth()->user()->approve_status === 'pending')
                        <div class="alert alert-info d-flex align-items-center" role="alert">
                            Hi {{ auth()->user()->name }}, your request is currently pending. We will send a mail to
                            your
                            email when it is approved.
                        </div>
                    @endif
                    @if (auth()->user()->approve_status === 'approved' && auth()->user()->role === 'student')
                        <div class="text-end">
                            <a href="{{ route('student.become-artist') }}" class="common_btn">Become an Artist</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
