<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Traits\FileUpload;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    use FileUpload;

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $contactCards = Contact::all();
        return view('admin.contact-card.index', compact('contactCards'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.contact-card.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'icon' => ['required', 'image', 'max:3000'],
            'title' => ['required', 'string', 'max:255'],
            'line_one' => ['nullable', 'string', 'max:255'],
            'line_two' => ['nullable', 'string', 'max:255'],
            'status' => ['nullable', 'boolean']
        ]);

        $icon = $this->uploadFile($request->icon);

        $contact = new Contact();
        $contact->icon = $icon;
        $contact->title = $request->title;
        $contact->line_one = $request->line_one;
        $contact->line_two = $request->line_two;
        $contact->status = $request->status;
        $contact->save();

        notyf()->success('Created Successfully');
        return redirect()->route('admin.contact.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact): View
    {
        return view('admin.contact-card.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'icon' => ['nullable', 'image', 'max:3000'],
            'title' => ['required', 'string', 'max:255'],
            'line_one' => ['nullable', 'string', 'max:255'],
            'line_two' => ['nullable', 'string', 'max:255'],
            'status' => ['nullable', 'boolean']
        ]);

        if($request->hasFile('icon')) {
            $this->deleteFile($contact->icon);
            $icon = $this->uploadFile($request->icon);
            $contact->icon = $icon;
        }

        $contact->title = $request->title;
        $contact->line_one = $request->line_one;
        $contact->line_two = $request->line_two;
        $contact->status = $request->status;
        $contact->save();

        notyf()->success('Updated Successfully');
        return redirect()->route('admin.contact.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        try {
            $this->deleteFile($contact->icon);
            $contact->delete();
            notyf()->success('Deleted Successfully');
            return response(['message' => 'Deleted Successfully!'], 200);
        } catch (Exception $e) {
            return response(['message' => 'something went wrong!'], 500);
        }
    }
}
