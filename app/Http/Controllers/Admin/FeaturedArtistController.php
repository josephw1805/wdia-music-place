<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\FeaturedArtist;
use App\Models\User;
use App\Traits\FileUpload;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FeaturedArtistController extends Controller
{
    use FileUpload;

    function index(): View
    {
        $artists = User::where(['role' => 'artist', 'approve_status' => 'approved'])->get();
        $featuredArtist = FeaturedArtist::first();
        $selectedAlbums = json_decode($featuredArtist?->featured_albums);
        $selectedArtistAlbums = Album::select(['id', 'title'])->where('artist_id', $featuredArtist?->artist)->get();
        return view('admin.sections.featured-artist.index', compact('artists', 'featuredArtist', 'selectedAlbums', 'selectedArtistAlbums'));
    }

    function getArtistAlbums(string $id): Response
    {
        $albums = Album::select(['id', 'title'])->where(['artist_id' => $id, 'is_approved' => 'approved'])->get();
        return response(['albums' => $albums]);
    }

    function store(Request $request): RedirectResponse
    {
        $validateData = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'subtitle' => ['required', 'string', 'max:255'],
            'button_text' => ['required', 'string', 'max:255'],
            'button_url' => ['required', 'string', 'max:255'],
            'artist' => ['required', 'exists:users,id'],
            'artist_image' => ['nullable', 'image', 'max:3000'],
            'featured_albums' => ['required', 'array'],
            'featured_albums.*' => ['required', 'exists:albums,id'],
        ]);

        $validateData['featured_albums'] = json_encode($validateData['featured_albums']);

        if ($request->hasFile('artist_image')) {
            $this->deleteFile($request->prev_artist_image);
            $image = $this->uploadFile($request->file('artist_image'));
            $validateData['artist_image'] = $image;
        }

        FeaturedArtist::updateOrCreate(
            ['id' => 1],
            $validateData
        );

        notyf()->success('Update Successfully');
        return redirect()->back();
    }
}
