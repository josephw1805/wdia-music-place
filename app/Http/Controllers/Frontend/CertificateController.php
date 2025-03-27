<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\AlbumChapterTrack;
use App\Models\CertificateBuilder;
use App\Models\CertificateBuilderItem;
use App\Models\WatchHistory;
use Illuminate\Http\Response;
use Barryvdh\DomPDF\Facade\Pdf;

class CertificateController extends Controller
{
    function download(Album $album): Response
    {
        $trackCount = AlbumChapterTrack::where(
            'album_id',
            $album->id
        )->count();
        $watchedTrackCount = WatchHistory::where([
            'user_id' => user()->id,
            'album_id' => $album->id,
            'is_completed' => 1,
        ])->count();

        if ($trackCount != $watchedTrackCount) abort(404);

        $certificate = CertificateBuilder::first();
        $certificateItems = CertificateBuilderItem::all();
        $html = View('frontend.student-dashboard.albums.certificate', compact('certificate', 'certificateItems'))->render();
        $html = str_replace('[user_name]', user()->name, $html);
        $html = str_replace('[album_name]', $album->title, $html);
        $pdf = pdf::loadHTML($html)->setPaper('a4', 'landscape');
        return $pdf->download('certificate.pdf');
    }
}
