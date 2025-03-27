<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use App\Traits\FileUpload;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    use FileUpload;

    function index(): View
    {
        $video = Video::first();
        return view('admin.sections.video.index', compact('video'));
    }

    function store(Request $request): RedirectResponse
    {
        $validateData = $request->validate([
            'video_url' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:255'],
            'button_text' => ['nullable', 'string', 'max:255'],
            'button_url' => ['nullable', 'string', 'max:255']
        ]);

        if ($request->hasFile('background')) {
            $image = $this->uploadFile($request->file('background'));
            $this->deleteFile($request->prev_background);
            $validateData['background'] = $image;
        }

        Video::updateOrCreate(
            ['id' => 1],
            $validateData
        );

        notyf()->success('Update Successfully');
        return redirect()->back();
    }
}
