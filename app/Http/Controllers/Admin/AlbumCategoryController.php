<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AlbumCategoryStoreRequest;
use App\Http\Requests\Admin\AlbumCategoryUpdateRequest;
use App\Models\AlbumCategory;
use App\Traits\FileUpload;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;

class AlbumCategoryController extends Controller
{
    use FileUpload;
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $categories = AlbumCategory::whereNull('parent_id')->paginate(15);
        return view('admin.album.album-category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.album.album-category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AlbumCategoryStoreRequest $request): RedirectResponse
    {
        $imagePath = $this->uploadFile($request->file('image'));
        $category = new AlbumCategory();
        $category->image = $imagePath;
        $category->icon = $request->icon;
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->show_at_trending = $request->show_at_trending ?? 0;
        $category->status = $request->status ?? 0;
        $category->save();

        notyf()->success('Created Successfully');

        return redirect()->route('admin.album-categories.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AlbumCategory $album_category): View
    {
        return view('admin.album.album-category.edit', compact('album_category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AlbumCategoryUpdateRequest $request, AlbumCategory $album_category): RedirectResponse
    {
        if ($request->hasFile('image')) {
            $imagePath = $this->uploadFile($request->file('image'));
            $this->deleteFile($album_category->image);
            $album_category->image = $imagePath;
        }
        $album_category->icon = $request->icon;
        $album_category->name = $request->name;
        $album_category->slug = Str::slug($request->name);
        $album_category->show_at_trending = $request->show_at_trending ?? 0;
        $album_category->status = $request->status ?? 0;
        $album_category->save();

        notyf()->success('Updated Successfully');

        return redirect()->route('admin.album-categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AlbumCategory $album_category)
    {
        if (AlbumCategory::where('parent_id', $album_category->id)->exists()) {
            return response(['message' => 'Cannot delete a category with subcategory!'], 422);
        }
        try {
            $this->deleteFile($album_category->image);
            $album_category->delete();
            notyf()->success('Deleted Successfully');
            return response(['message' => 'Deleted Successfully!'], 200);
        } catch (Exception $e) {
            return response(['message' => 'something went wrong!'], 500);
        }
    }
}
