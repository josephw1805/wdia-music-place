<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use App\Traits\FileUpload;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    use FileUpload;

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $testimonials = Testimonial::paginate(20);
        return view('admin.sections.testimonial.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.sections.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'rating' => ['required', 'numeric'],
            'review' => ['required', 'string', 'max:1000'],
            'user_name' => ['required', 'string', 'max:255'],
            'user_title' => ['required', 'string', 'max:255'],
            'user_image' => ['required', 'image', 'max:3000']
        ]);

        $image = $this->uploadFile($request->file('user_image'));

        $testimonial = new Testimonial();
        $testimonial->rating = $request->rating;
        $testimonial->review = $request->review;
        $testimonial->user_name = $request->user_name;
        $testimonial->user_title = $request->user_title;
        $testimonial->user_image = $image;
        $testimonial->save();

        notyf()->success('Created Successfully');

        return redirect()->route('admin.testimonial.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimonial $testimonial)
    {
        return view('admin.sections.testimonial.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            'rating' => ['required', 'numeric'],
            'review' => ['required', 'string', 'max:1000'],
            'user_name' => ['required', 'string', 'max:255'],
            'user_title' => ['required', 'string', 'max:255'],
            'user_image' => ['nullable', 'image', 'max:3000']
        ]);

        if ($request->hasFile('user_image')) {
            $image = $this->uploadFile($request->file('user_image'));
            $this->deleteFile($request->user_image);
            $testimonial->user_image = $image;
        }

        $testimonial->rating = $request->rating;
        $testimonial->review = $request->review;
        $testimonial->user_name = $request->user_name;
        $testimonial->user_title = $request->user_title;
        $testimonial->save();

        notyf()->success('Updated Successfully');

        return redirect()->route('admin.testimonial.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial)
    {
        try {
            $this->deleteFile($testimonial->user_image);
            $testimonial->delete();
            notyf()->success('Deleted Successfully');
            return response(['message' => 'Deleted Successfully!'], 200);
        } catch (Exception $e) {
            return response(['message' => 'something went wrong!'], 500);
        }
    }
}
