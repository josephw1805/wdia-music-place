<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AlbumLanguage;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AlbumLanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $languages = AlbumLanguage::paginate(15);
        return view('admin.album.album-language.index', compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.album.album-language.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate(['name' => ['required', 'max:255', 'unique:album_languages,name']]);

        $language = new AlbumLanguage();
        $language->name = $request->name;
        $language->slug = Str::slug($request->name);
        $language->save();

        notyf()->success('Created Successfully');

        return redirect()->route('admin.album-languages.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AlbumLanguage $album_language)
    {
        return view('admin.album.album-language.edit', compact('album_language'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AlbumLanguage $album_language)
    {
        $request->validate(['name' => ['required', 'max:255', 'unique:album_languages,name,' . $album_language->id]]);

        $album_language->name = $request->name;
        $album_language->slug = Str::slug($request->name);
        $album_language->save();

        notyf()->success('Updated Successfully');

        return redirect()->route('admin.album-languages.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AlbumLanguage $album_language)
    {
        try {
            $album_language->delete();
            notyf()->success('Deleted Successfully');
            return response(['message' => 'Deleted Successfully!'], 200);
        } catch (Exception $e) {
            return response(['message' => 'something went wrong!'], 500);
        }
    }
}
