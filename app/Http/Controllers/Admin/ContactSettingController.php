<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactSetting;
use App\Traits\FileUpload;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ContactSettingController extends Controller
{
    use FileUpload;

    function index():View
    {
        $contactSetting = ContactSetting::first();
        return view('admin.contact-setting.index', compact('contactSetting'));
    }

    function store(Request $request): RedirectResponse
    {
        $validateData = $request->validate([
            'image' => ['nullable', 'image', 'max:3000'],
            'map' => ['nullable', 'string', 'max:1000'],
        ]);

        if ($request->hasFile('image')) {
            $image = $this->uploadFile($request->file('image'));
            $this->deleteFile($request->image);
            $validateData['image'] = $image;
        }

        ContactSetting::updateOrCreate(
            ['id' => 1],
            $validateData
        );

        notyf()->success('Update Successfully');
        return redirect()->back();
    }
}
