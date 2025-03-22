<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AlbumGenre;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AlbumGenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $genres = AlbumGenre::paginate(15);
        return view('admin.album.album-genre.index', compact('genres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.album.album-genre.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate(['name' => ['required', 'max:255', 'unique:album_languages,name']]);

        $genre = new AlbumGenre();
        $genre->name = $request->name;
        $genre->slug = Str::slug($request->name);
        $genre->save();

        notyf()->success('Created Successfully');

        return redirect()->route('admin.album-genres.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AlbumGenre $album_Genre)
    {
        return view('admin.album.album-genre.edit', compact('album_Genre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AlbumGenre $album_Genre)
    {
        $request->validate(['name' => ['required', 'max:255', 'unique:album_languages,name,' . $album_Genre->id]]);

        $album_Genre->name = $request->name;
        $album_Genre->slug = Str::slug($request->name);
        $album_Genre->save();

        notyf()->success('Updated Successfully');

        return redirect()->route('admin.album-genres.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AlbumGenre $album_Genre)
    {
        try {
            $album_Genre->delete();
            notyf()->success('Deleted Successfully');
            return response(['message' => 'Deleted Successfully!'], 200);
        } catch (Exception $e) {
            return response(['message' => 'something went wrong!'], 500);
        }
    }
}
