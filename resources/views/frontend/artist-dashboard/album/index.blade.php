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
                                <h5>Albums</h5>
                                <p>Manage your albums.</p>
                                <a class="common_btn" href="{{ route('artist.albums.create') }}"><i class="fas fa-plus"></i>
                                    add albums</a>
                            </div>
                        </div>
                        <div class="wsus__dash_course_table">
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <th class="image">
                                                        ALBUMS
                                                    </th>
                                                    <th class="details"></th>
                                                    <th class="sale">PRICE</th>
                                                    <th class="status">
                                                        STATUS
                                                    </th>
                                                    <th class="action">
                                                        ACTION
                                                    </th>
                                                </tr>
                                                @forelse ($albums as $album)
                                                    <tr>
                                                        <td class="image">
                                                            <div class="image_category">
                                                                <img src="{{ $album->thumbnail }}" alt="img"
                                                                    class="img-fluid w-100">
                                                            </div>
                                                        </td>
                                                        <td class="details">
                                                            <p class="rating">
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star-half-alt"></i>
                                                                <i class="far fa-star"></i>
                                                                <span>(5.0)</span>
                                                            </p>
                                                            <p class="title">{{ $album->title }}</p>
                                                        </td>
                                                        <td class="sale">
                                                            <p>${{ $album->discount }}</p>
                                                        </td>
                                                        <td class="status">
                                                            @if ($album->is_approved == 'pending')
                                                                <p class="pending">Pending</p>
                                                            @elseif ($album->is_approved == 'approved')
                                                                <p class="active">Active</p>
                                                            @elseif ($album->is_approved == 'rejected')
                                                                <p class="delete">rejected</p>
                                                            @endif
                                                        </td>
                                                        <td class="action">
                                                            <a class="edit"
                                                                href="{{ route('artist.albums.edit', ['id' => $album->id, 'step' => 1]) }}"><i
                                                                    class="far fa-edit"></i></a>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="5">No Data Available!</td>
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
