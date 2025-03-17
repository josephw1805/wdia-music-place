<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AlbumGenere;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AlbumGenereController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $generes = AlbumGenere::paginate(15);
        return view('admin.album.album-genere.index', compact('generes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.album.album-genere.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate(['name' => ['required', 'max:255', 'unique:album_languages,name']]);

        $genere = new AlbumGenere();
        $genere->name = $request->name;
        $genere->slug = Str::slug($request->name);
        $genere->save();

        notyf()->success('Created Successfully');

        return redirect()->route('admin.album-generes.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AlbumGenere $album_genere)
    {
        return view('admin.album.album-genere.edit', compact('album_genere'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AlbumGenere $album_genere)
    {
        $request->validate(['name' => ['required', 'max:255', 'unique:album_languages,name,' . $album_genere->id]]);

        $album_genere->name = $request->name;
        $album_genere->slug = Str::slug($request->name);
        $album_genere->save();

        notyf()->success('Updated Successfully');

        return redirect()->route('admin.album-generes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AlbumGenere $album_genere)
    {
        try {
            $album_genere->delete();
            notyf()->success('Deleted Successfully');
            return response(['message' => 'Deleted Successfully!'], 200);
        } catch (Exception $e) {
            return response(['message' => 'something went wrong!'], 500);
        }
    }
}
