<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Album;
use Illuminate\Contracts\View\View;

class AlbumPageController extends Controller
{
    function index(): View
    {
        $albums = Album::where('is_approved', 'approved')->where('status', 'active')->paginate(9);
        return view('frontend.pages.album-page', compact('albums'));
    }

    function show(string $slug): View
    {
        $album = Album::where('slug', $slug)->where('is_approved', 'approved')->where('status', 'active')->firstOrFail();
        return view('frontend.pages.album-details-page', compact('album'));
    }
}
