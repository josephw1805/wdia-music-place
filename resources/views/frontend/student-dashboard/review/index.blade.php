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
                                <li>Reviews</li>
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
                                <h5>Reviews</h5>
                            </div>
                        </div>
                        <div class="wsus__dash_course_table wow fadeInUp">
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <th>Album</th>
                                                <th>Rating</th>
                                                <th>Review</th>
                                                <th>Action</th>
                                            </thead>
                                            <tbody>
                                                @forelse ($reviews as $review)
                                                    <tr>
                                                        <td>{{ $review->album->title }}</td>
                                                        <td>{{ $review->rating }}</td>
                                                        <td style="max-width: 400px;">{{ $review->review }}</td>
                                                        <td class="action">
                                                            <a class="del delete-item"
                                                                href="{{ route('student.review.destroy', $review->id) }}"><i
                                                                    class="far fa-trash-alt"></i></a>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td>No Data Found</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
