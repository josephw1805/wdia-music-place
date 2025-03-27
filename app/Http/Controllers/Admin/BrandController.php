<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Traits\FileUpload;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    use FileUpload;
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $brands = Brand::all();
        return view('admin.sections.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.sections.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'image' => ['required', 'image', 'max:3000'],
            'status' => ['required', 'boolean']
        ]);

        $brand = new Brand();
        $brand->image = $this->uploadFile($request->file('image'));
        $brand->status = $request->status;
        $brand->save();

        notyf()->success('Created successfully');
        return redirect()->route('admin.brand.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        return view('admin.sections.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'image' => ['nullable', 'image', 'max:3000'],
            'status' => ['required', 'boolean']
        ]);

        if ($request->hasFile('image')) {
            $this->deleteFile($brand->image);
            $image = $this->uploadFile($request->file('image'));
            $brand->image = $image;
        }

        $brand->status = $request->status;
        $brand->save();

        notyf()->success('Update successfully');
        return redirect()->route('admin.brand.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        try {
            $this->deleteFile($brand->image);
            $brand->delete();
            notyf()->success('Deleted Successfully');
            return response(['message' => 'Deleted Successfully!'], 200);
        } catch (Exception $e) {
            return response(['message' => 'something went wrong!'], 500);
        }
    }
}
