<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\HeroRequest;
use App\Models\Hero;
use App\Traits\FileUpload;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class HeroController extends Controller
{
    use FileUpload;

    function index(): View
    {
        $hero = Hero::first();
        return view('admin.sections.hero.index', compact('hero'));
    }

    function store(HeroRequest $request): RedirectResponse
    {
        $data = [
            'label' => $request->label,
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'button_text' => $request->button_text,
            'button_url' => $request->button_url,
            'video_button_text' => $request->video_button_text,
            'video_button_url' => $request->video_button_url,
            'banner_item_title' => $request->banner_item_title,
            'banner_item_subtitle' => $request->banner_item_subtitle,
            'round_text' => $request->round_text
        ];

        if ($request->hasFile('image')) {
            $image = $this->uploadFile($request->file('image'));
            $this->deleteFile($request->prev_image);
            $data['image'] = $image;
        }

        Hero::updateOrCreate(
            ['id' => 1],
            $data
        );

        notyf()->success('Update Successfully');
        return redirect()->back();
    }
}
