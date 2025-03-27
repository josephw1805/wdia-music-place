@extends('frontend.layouts.master')

@section('content')
    <section class="wsus__breadcrumb" style="background: url({{ asset('frontend/assets/images/breadcrumb_bg.jpg') }});">
        <div class="wsus__breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12 wow fadeInUp">
                        <div class="wsus__breadcrumb_text">
                            <h1>My Albums</h1>
                            <ul>
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li>My Albums</li>
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
                        <div class="wsus__dashboard_contant_top">
                            <div class="wsus__dashboard_heading relative">
                                <h5>My Albums</h5>
                            </div>
                        </div>

                        <div class="wsus__dash_course_table">
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                @forelse ($subscriptions as $subscription)
                                                    <tr>
                                                        <td class="image">
                                                            <div class="image_category">
                                                                <img src="{{ asset($subscription->album->thumbnail) }}"
                                                                    alt="img" class="img-fluid w-100">
                                                            </div>
                                                        </td>
                                                        <td class="details">
                                                            <a class="title"
                                                                href="{{ route('albums.show', $subscription->album->slug) }}">{{ $subscription->album->title }}</a>
                                                            <p class="text-muted">By
                                                                {{ $subscription->album->artist->name }}</p>
                                                            @php
                                                                $trackCount = App\Models\AlbumChapterTrack::where(
                                                                    'album_id',
                                                                    $subscription->album->id,
                                                                )->count();
                                                                $watchedTrackCount = App\Models\WatchHistory::where([
                                                                    'user_id' => user()->id,
                                                                    'album_id' => $subscription->album->id,
                                                                    'is_completed' => 1,
                                                                ])->count();
                                                            @endphp
                                                            @if ($trackCount == $watchedTrackCount)
                                                                <a href="{{ route('student.certificate.download', $subscription->album->id) }}"
                                                                    class="btn btn-sm btn-warning" target="_blank">Download
                                                                    Certificate</a>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('student.album-player.index', $subscription->album->slug) }}"
                                                                class="common_btn">Watch</a>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="3">No Album Available!</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                        <div class="mt-4">
                                            {{ $subscriptions->links() }}
                                        </div>
                                    </div>
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
