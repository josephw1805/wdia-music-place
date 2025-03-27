<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AboutUsSectionRequest;
use App\Models\AboutUsSection;
use App\Traits\FileUpload;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class AboutUsSectionController extends Controller
{
    use FileUpload;

    function index(): View
    {
        $about = AboutUsSection::first();
        return view('admin.sections.about-section.index', compact('about'));
    }

    function store(AboutUsSectionRequest $request): RedirectResponse
    {
        $data = [
            'round_text' => $request->round_text,
            'subscriber_count' => $request->subscriber_count,
            'title' => $request->title,
            'video_url' => $request->video_url,
            'description' => $request->description,
            'button_text' => $request->button_text,
            'button_url' => $request->button_url,
        ];

        if ($request->hasFile('video_image')) {
            $image = $this->uploadFile($request->file('video_image'));
            $this->deleteFile($request->prev_video_image);
            $data['video_image'] = $image;
        }

        if ($request->hasFile('image')) {
            $image = $this->uploadFile($request->file('image'));
            $this->deleteFile($request->prev_image);
            $data['image'] = $image;
        }

        AboutUsSection::updateOrCreate(
            ['id' => 1],
            $data
        );

        notyf()->success('Update Successfully');
        return redirect()->back();
    }
}
