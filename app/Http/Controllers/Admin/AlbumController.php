<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AlbumBasicInfoCreateRequest;
use App\Models\Album;
use App\Models\AlbumCategory;
use App\Models\AlbumChapter;
use App\Models\AlbumGenre;
use App\Models\AlbumLanguage;
use App\Models\User;
use App\Traits\FileUpload;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class AlbumController extends Controller
{
    use FileUpload;

    function index(): View
    {
        $albums = Album::with(['artist'])->paginate(15);
        return view('admin.album.album-module.index', compact('albums'));
    }

    /** change approve status */
    function updateApproval(Request $request, Album $album): Response
    {
        $album->is_approved = $request->status;
        $album->save();
        return response(['status' => 'success', 'message' => 'Updated successfully']);
    }

    function create(): View
    {
        $artists = User::where('role', 'artist')->where('approve_status', 'approved')->get();
        return view('admin.album.album-module.create', compact('artists'));
    }

    function storeBasicInfo(AlbumBasicInfoCreateRequest $request): Response
    {
        $album = new Album();
        $album->title = $request->title;
        $album->slug = Str::slug($request->title);
        $album->seo_description = $request->seo_description;
        $album->thumbnail = $this->uploadFile($request->file('thumbnail'));
        $album->demo_video_storage = $request->demo_video_storage;
        $album->demo_video_source = $request->demo_video_source;
        $album->price = $request->price;
        $album->discount = $request->discount;
        $album->description = $request->description;
        $album->artist_id = $request->artist;
        $album->time_zone = date_default_timezone_get();
        $album->save();

        // save album id on session
        Session::put('album_create_id', $album->id);

        return response([
            'status' => 'success',
            'message' => 'Updated successfully',
            'redirect' => route('admin.albums.edit', ['id' => $album->id, 'step' => $request->next_step])
        ]);
    }

    function edit(Request $request)
    {
        switch ($request->step) {
            case '1':
                $album = Album::findOrFail($request->id);
                $artists = User::where('role', 'artist')->where('approve_status', 'approved')->get();
                return view('admin.album.album-module.edit', compact('album', 'artists'));
            case '2':
                $categories = AlbumCategory::where('status', 1)->get();
                $genres = AlbumGenre::all();
                $languages = AlbumLanguage::all();
                $album = Album::findOrFail($request->id);
                return view('admin.album.album-module.more-info', compact('categories', 'genres', 'languages', 'album'));
            case '3':
                $albumId = $request->id;
                $chapters = AlbumChapter::where(['album_id' => $albumId])->orderBy('order')->get();
                return view('admin.album.album-module.album-content', compact('albumId', 'chapters'));
            case '4':
                $album = Album::findOrFail($request->id);
                $editMode = true;
                return view('admin.album.album-module.finish', compact('album', 'editMode'));
        }
    }

    function update(Request $request)
    {
        switch ($request->current_step) {
            case '1':
                $rules = [
                    'title' => ['required', 'string', 'max:255'],
                    'seo_description' => ['nullable', 'string', 'max:255'],
                    'price' => ['required', 'numeric', 'min:0'],
                    'discount' => ['nullable', 'numeric', 'min:0'],
                    'thumbnail' => ['nullable', 'image', 'max:3000'],
                    'demo_video_source' => ['nullable']
                ];

                $request->validate($rules);
                $album = Album::findOrFail($request->id);
                $album->title = $request->title;
                $album->slug = Str::slug($request->title);
                $album->seo_description = $request->seo_description;
                if ($request->hasFile('thumbnail')) {
                    $this->deleteFile($album->thumbnail);
                    $album->thumbnail = $this->uploadFile($request->file('thumbnail'));
                }
                $album->demo_video_storage = $request->demo_video_storage;
                $album->demo_video_source = $request->filled('file') ? $request->file : $request->url;
                $album->price = $request->price;
                $album->discount = $request->discount;
                $album->description = $request->description;
                $album->artist_id = $album->artist->id;
                $album->save();

                // save album id on session
                Session::put('album_create_id', $album->id);

                return response([
                    'status' => 'success',
                    'message' => 'Updated successfully',
                    'redirect' => route('admin.albums.edit', ['id' => $album->id, 'step' => $request->next_step])
                ]);
            case '2':
                // validation
                $request->validate([
                    'duration' => ['required', 'string', 'max:255'],
                    'category' => ['required', 'integer'],
                    'genre' => ['required', 'integer'],
                    'language' => ['required', 'integer'],
                ]);

                // update album data
                $album = Album::findOrFail($request->id);
                $album->duration = $request->duration;
                $album->category_id = $request->category;
                $album->Genre_id = $request->genre;
                $album->language_id = $request->language;
                $album->save();

                return response([
                    'status' => 'success',
                    'message' => 'Updated successfully',
                    'redirect' => route('admin.albums.edit', ['id' => $album->id, 'step' => $request->next_step])
                ]);
            case '3':
                return response([
                    'status' => 'success',
                    'message' => 'Updated successfully',
                    'redirect' => route('admin.albums.edit', ['id' => $request->id, 'step' => $request->next_step])
                ]);
            case '4':
                // validation
                $request->validate([
                    'message' => ['nullable', 'max:1000'],
                    'status' => ['required', 'in:active,inactive,draft']
                ]);

                // update album data
                $album = Album::findOrFail($request->id);
                $album->message_for_reviewer = $request->message;
                $album->status = $request->status;
                $album->save();

                return response([
                    'status' => 'success',
                    'message' => 'Updated successfully',
                    'redirect' => route('admin.albums.index')
                ]);
        }
    }
}
