<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AlbumCategory;
use App\Models\LatestAlbum;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LatestAlbumController extends Controller
{
    function index(): View
    {
        $categories = AlbumCategory::whereNull('parent_id')->get();
        $latestAlbum = LatestAlbum::first();
        return view('admin.sections.latest-album.index', compact('categories', 'latestAlbum'));
    }

    function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'category_one' => ['nullable', 'integer', 'exists:album_categories,id'],
            'category_two' => ['nullable', 'integer', 'exists:album_categories,id'],
            'category_three' => ['nullable', 'integer', 'exists:album_categories,id'],
            'category_four' => ['nullable', 'integer', 'exists:album_categories,id'],
        ]);

        LatestAlbum::updateOrCreate(
            ['id' => 1],
            $validatedData
        );

        notyf()->success('Update Successfully');
        return redirect()->back();
    }
}
