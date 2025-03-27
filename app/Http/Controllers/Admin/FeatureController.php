<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FeatureRequest;
use App\Models\Feature;
use App\Traits\FileUpload;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class FeatureController extends Controller
{
    use FileUpload;

    function index(): View
    {
        $feature = Feature::first();
        return view('admin.sections.feature.index', compact('feature'));
    }

    function store(FeatureRequest $request): RedirectResponse
    {
        $data = [
            'title_one' => $request->title_one,
            'title_two' => $request->title_two,
            'title_three' => $request->title_three,
            'subtitle_one' => $request->subtitle_one,
            'subtitle_two' => $request->subtitle_two,
            'subtitle_three' => $request->subtitle_three,
        ];

        if ($request->hasFile('image_one')) {
            $image = $this->uploadFile($request->file('image_one'));
            $this->deleteFile($request->prev_image_one);
            $data['image_one'] = $image;
        }

        if ($request->hasFile('image_two')) {
            $image = $this->uploadFile($request->file('image_two'));
            $this->deleteFile($request->prev_image_two);
            $data['image_two'] = $image;
        }

        if ($request->hasFile('image_three')) {
            $image = $this->uploadFile($request->file('image_three'));
            $this->deleteFile($request->prev_image_three);
            $data['image_three'] = $image;
        }

        Feature::updateOrCreate(
            ['id' => 1],
            $data
        );

        notyf()->success('Update Successfully');
        return redirect()->back();
    }
}
