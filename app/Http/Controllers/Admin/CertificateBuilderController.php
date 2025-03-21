<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CertificateBuilderUpdateRequest;
use App\Models\CertificateBuilder;
use App\Traits\FileUpload;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CertificateBuilderController extends Controller
{
    use FileUpload;

    function index(): View
    {
        $certificate = CertificateBuilder::first();
        return view('admin.certificate-builder.index', compact('certificate'));
    }

    function update(CertificateBuilderUpdateRequest $request): RedirectResponse
    {
        $data = ['title' => $request->title, 'sub_title' => $request->sub_title, 'description' => $request->description];

        if ($request->hasFile('signature')) {
            $signature = $this->uploadFile($request->file('signature'));
            $data['signature'] = $signature;
        }

        if ($request->hasFile('background')) {
            $background = $this->uploadFile($request->file('background'));
            $data['background'] = $background;
        }

        CertificateBuilder::updateOrCreate(
            ['id' => 1],
            $data
        );

        notyf()->success('Updated Successfully');

        return redirect()->back();
    }
}
