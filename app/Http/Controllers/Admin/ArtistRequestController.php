<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ArtistRequestApprovedMail;
use App\Mail\ArtistRequestRejectMail;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ArtistRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $artistRequests = User::where('approve_status', 'pending')
            ->orWhere('approve_status', 'rejected')->get();
        return view('admin.artist-request.index', compact('artistRequests'));
    }

    /**
     * Download the resource.
     */
    public function download(User $artist_request)
    {
        return response()->download(public_path($artist_request->document));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $artist_request): RedirectResponse
    {
        $request->validate(['status' => ['required', 'in:approved,rejected,pending']]);
        $artist_request->approve_status = $request->status;
        if ($request->status === 'approved') {
            $artist_request->role = 'artist';
        }
        $artist_request->save();

        self::sendNotification($artist_request);

        return redirect()->back();
    }

    public static function sendNotification(User $artist_request): void
    {
        switch ($artist_request->approve_status) {
            case 'approved':
                if (config('mail_queue.is_queue')) {
                    Mail::to($artist_request->email)->queue(new ArtistRequestApprovedMail());
                } else {
                    Mail::to($artist_request->email)->send(new ArtistRequestApprovedMail());
                }
                break;
            case 'rejected':
                if (config('mail_queue.is_queue')) {
                    Mail::to($artist_request->email)->queue(new ArtistRequestRejectMail());
                } else {
                    Mail::to($artist_request->email)->send(new ArtistRequestRejectMail());
                }
                break;
        }
    }
}
