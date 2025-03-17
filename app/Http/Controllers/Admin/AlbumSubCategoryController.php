<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AlbumSubCategoryStoreRequest;
use App\Http\Requests\Admin\AlbumSubCategoryUpdateRequest;
use App\Models\AlbumCategory;
use App\Traits\FileUpload;
use Illuminate\Contracts\View\View;
use Exception;
use Illuminate\Support\Str;

class AlbumSubCategoryController extends Controller
{
    use FileUpload;
    /**
     * Display a listing of the resource.
     */
    public function index(AlbumCategory $album_category): View
    {
        $sub_cat = AlbumCategory::where('parent_id', $album_category->id)->get();
        return view('admin.album.album-sub-category.index', compact('album_category', 'sub_cat'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(AlbumCategory $album_category): View
    {
        return view('admin.album.album-sub-category.create', compact('album_category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AlbumSubCategoryStoreRequest $request, AlbumCategory $album_category)
    {
        $category = new AlbumCategory();

        if ($request->hasFile('image')) {
            $imagePath = $this->uploadFile($request->file('image'));
            $category->image = $imagePath;
        }
        $category->icon = $request->icon;
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->parent_id = $album_category->id;
        $category->show_at_trending = $request->show_at_trending ?? 0;
        $category->status = $request->status ?? 0;
        $category->save();

        notyf()->success('Created Successfully');

        return redirect()->route('admin.album-sub-categories.index', $album_category->id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AlbumCategory $album_category, AlbumCategory $album_sub_category)
    {
        return view('admin.album.album-sub-category.edit', compact('album_category', 'album_sub_category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AlbumSubCategoryUpdateRequest $request, AlbumCategory $album_category, AlbumCategory $album_sub_category)
    {
        if ($request->hasFile('image')) {
            $imagePath = $this->uploadFile($request->file('image'));
            $this->deleteFile($album_sub_category->image);
            $album_sub_category->image = $imagePath;
        }
        $album_sub_category->icon = $request->icon;
        $album_sub_category->name = $request->name;
        $album_sub_category->slug = Str::slug($request->name);
        $album_sub_category->parent_id = $album_category->id;
        $album_sub_category->show_at_trending = $request->show_at_trending ?? 0;
        $album_sub_category->status = $request->status ?? 0;
        $album_sub_category->save();

        notyf()->success('Updated Successfully');

        return redirect()->route('admin.album-sub-categories.index', $album_category->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AlbumCategory $album_category, AlbumCategory $album_sub_category)
    {
        try {
            $this->deleteFile($album_sub_category->image);
            $album_sub_category->delete();
            notyf()->success('Deleted Successfully');
            return response(['message' => 'Deleted Successfully!'], 200);
        } catch (Exception $e) {
            return response(['message' => 'something went wrong!'], 500);
        }
    }
}
