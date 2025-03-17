<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\AlbumChapter;
use App\Models\AlbumChapterTrack;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class AlbumContentController extends Controller
{
    function createChapterModal(string $id): String
    {
        return view('admin.album.album-module.partials.album-chapter-modal', compact('id'))->render();
    }

    function storeChapter(Request $request, string $album_id): RedirectResponse
    {
        $request->validate([
            'title' => ['required', 'max:255'],
        ]);

        $album = Album::findOrFail($album_id);

        $chapter = new AlbumChapter();
        $chapter->title = $request->title;
        $chapter->album_id = $album_id;
        $chapter->artist_id = $album->artist_id;
        $chapter->order = AlbumChapter::where('album_id', $album_id)->count() + 1;
        $chapter->save();

        return redirect()->back();
    }

    function editChapterModal(string $id): string
    {
        $editMode = true;
        $chapter = AlbumChapter::where(['id' => $id])->firstOrFail();
        return view('admin.album.album-module.partials.album-chapter-modal', compact('chapter', 'editMode'))->render();
    }

    function updateChapter(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'title' => ['required', 'max:255'],
        ]);

        $chapter = AlbumChapter::findOrFail($id);
        $chapter->title = $request->title;
        $chapter->save();
        notyf()->success('Updated Successfully');
        return redirect()->back();
    }

    function destroyChapter(string $id): Response
    {
        try {
            $chapter = AlbumChapter::findOrFail($id);
            $chapter->delete();
            notyf()->success('Deleted Successfully!');
            return response(['message' => 'Deleted Successfully!'], 200);
        } catch (Exception $e) {
            return response(['message' => 'something went wrong!'], 500);
        }
    }

    function createTrack(Request $request): string
    {
        $albumId = $request->album_id;
        $chapterId = $request->chapter_id;
        return view('admin.album.album-module.partials.chapter-track-modal', compact('albumId', 'chapterId'))->render();
    }

    function storeTrack(Request $request): RedirectResponse
    {
        $rules = [
            'title' => ['required', 'string', 'max:255'],
            'source' => ['required', 'in:upload,external_link'],
            'duration' => ['required'],
            'description' => ['required'],
            'is_preview' => ['nullable', 'boolean'],
            'downloadable' => ['nullable', 'boolean'],
        ];

        if ($request->filled('file')) {
            $rules['file'] = ['required'];
        } else {
            $rules['url'] = ['required'];
        }

        $request->validate($rules);

        $album = Album::findOrFail($request->album_id);

        $track = new AlbumChapterTrack();
        $track->artist_id = $album->artist->id;
        $track->album_id = $request->album_id;
        $track->chapter_id = $request->chapter_id;
        $track->title = $request->title;
        $track->slug = Str::slug($request->title);
        $track->storage = $request->source;
        $track->file_path = $request->filled('file') ? $request->file : $request->url;
        $track->duration = $request->duration;
        $track->description = $request->description;
        $track->is_preview = $request->filled('is_preview');
        $track->downloadable = $request->filled('downloadable');
        $track->order = AlbumChapterTrack::where('chapter_id', $request->chapter_id)->count() + 1;
        $track->save();

        notyf()->success('Updated Successfully');

        return redirect()->back();
    }

    function editTrack(Request $request): string
    {
        $editMode = true;
        $albumId = $request->album_id;
        $chapterId = $request->chapter_id;
        $album = Album::findOrFail($albumId);
        $track = AlbumChapterTrack::where(
            [
                'id' => $request->track_id,
                'chapter_id' => $chapterId,
                'album_id' => $albumId,
                'artist_id' => $album->artist->id,
            ]
        )->first();
        return view('admin.album.album-module.partials.chapter-track-modal', compact('albumId', 'chapterId', 'track', 'editMode'))->render();
    }

    function updateTrack(Request $request, string $id): RedirectResponse
    {
        $rules = [
            'title' => ['required', 'string', 'max:255'],
            'source' => ['required', 'in:upload,external_link'],
            'duration' => ['required'],
            'description' => ['required'],
            'is_preview' => ['nullable', 'boolean'],
            'downloadable' => ['nullable', 'boolean'],
        ];

        if ($request->filled('file')) {
            $rules['file'] = ['required'];
        } else {
            $rules['url'] = ['required'];
        }

        $request->validate($rules);

        $track = AlbumChapterTrack::findOrFail($id);
        $track->title = $request->title;
        $track->slug = Str::slug($request->title);
        $track->storage = $request->source;
        $track->file_path = $request->filled('file') ? $request->file : $request->url;
        $track->duration = $request->duration;
        $track->description = $request->description;
        $track->is_preview = $request->filled('is_preview');
        $track->downloadable = $request->filled('downloadable');
        $track->save();

        notyf()->success('Updated Successfully');

        return redirect()->back();
    }

    function destroyTrack(string $id): Response
    {
        try {
            $lesson = AlbumChapterTrack::findOrFail($id);
            $lesson->delete();
            notyf()->success('Deleted Successfully!');
            return response(['message' => 'Deleted Successfully!'], 200);
        } catch (Exception $e) {
            return response(['message' => 'something went wrong!'], 500);
        }
    }

    /** Sort chapter tracks */
    function sortTrack(Request $request, string $id): Response
    {
        $newOrders = $request->order_ids;
        foreach ($newOrders as $key => $itemId) {
            $track = AlbumChapterTrack::where(['chapter_id' => $id, 'id' => $itemId])->first();
            $track->order = $key + 1;
            $track->save();
        }

        return response(['status' => 'success', 'message' => 'Updated Successfully']);
    }

    /** Sort Chapters */
    function sortChapter(string $id): string
    {
        $chapters = AlbumChapter::where('album_id', $id)->orderBy('order')->get();

        return view('admin.album.album-module.partials.album-chapter-sort-modal', compact('chapters'))->render();
    }

    function updateSortChapter(Request $request, string $id): Response
    {
        $newOrders = $request->order_ids;
        foreach ($newOrders as $key => $itemId) {
            $chapter = AlbumChapter::where(['album_id' => $id, 'id' => $itemId])->first();
            $chapter->order = $key + 1;
            $chapter->save();
        }

        return response(['status' => 'success', 'message' => 'Updated Successfully']);
    }
}
