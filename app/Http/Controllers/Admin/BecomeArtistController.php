<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BecomeArtist;
use App\Traits\FileUpload;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BecomeArtistController extends Controller
{
    use FileUpload;

    function index(): View
    {
        $becomeArtist = BecomeArtist::first();
        return view('admin.sections.become-artist.index', compact('becomeArtist'));
    }

    function store(Request $request): RedirectResponse
    {
        $validateData = $request->validate([
            'title' => ['nullable', 'string', 'max:255'],
            'subtitle' => ['nullable', 'string', 'max:255'],
            'button_text' => ['nullable', 'string', 'max:255'],
            'button_url' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'max:3000']
        ]);

        if ($request->hasFile('image')) {
            $image = $this->uploadFile($request->file('image'));
            $this->deleteFile($request->prev_image);
            $validateData['image'] = $image;
        }

        BecomeArtist::updateOrCreate(
            ['id' => 1],
            $validateData
        );

        notyf()->success('Update Successfully');
        return redirect()->back();
    }
}
