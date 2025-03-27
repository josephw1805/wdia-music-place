<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\AlbumChapterTrack;
use App\Models\Subscription;
use App\Models\WatchHistory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SubscribedAlbumController extends Controller
{
    function index(): View
    {
        $subscriptions = Subscription::with('album')->where('user_id', user()->id)->paginate(5);
        return view('frontend.student-dashboard.albums.index', compact('subscriptions'));
    }

    function playerIndex(string $slug): View
    {
        $album = Album::where('slug', $slug)->firstOrFail();
        if (!Subscription::where('user_id', user()->id)->where('album_id', $album->id)->where('have_access', 1)->exists()) return abort(404);
        $trackCount = AlbumChapterTrack::where('album_id', $album->id)->count();
        $watchHistory = WatchHistory::where(['user_id' => user()->id, 'album_id' => $album->id])->orderBy('updated_at', 'desc')->first();
        $watchedTrackIds = WatchHistory::where(['user_id' => user()->id, 'album_id' => $album->id, 'is_completed' => 1])->pluck('track_id')->toArray();
        return view('frontend.student-dashboard.albums.player-index', compact('album', 'watchHistory', 'watchedTrackIds', 'trackCount'));
    }

    function getTrackContent(Request $request): Response
    {
        $track = AlbumChapterTrack::where(['album_id' => $request->album_id, 'chapter_id' => $request->chapter_id, 'id' => $request->track_id])->first();

        return response($track);
    }

    function updateWatchHistory(Request $request)
    {
        WatchHistory::updateOrCreate(
            [
                'user_id' => user()->id,
                'track_id' => $request->track_id,
            ],
            [
                'album_id' => $request->album_id,
                'chapter_id' => $request->chapter_id,
                'updated_at' => now()
            ]
        );
    }

    function updateTrackHistory(Request $request)
    {
        $watchedTrack = WatchHistory::where([
            'user_id' => user()->id,
            'track_id' => $request->track_id
        ])->first();

        WatchHistory::updateOrCreate(
            [
                'user_id' => user()->id,
                'track_id' => $request->track_id,
            ],
            [
                'album_id' => $request->album_id,
                'chapter_id' => $request->chapter_id,
                'is_completed' => $watchedTrack->is_completed == 1 ? 0 : 1
            ]
        );
    }
}
