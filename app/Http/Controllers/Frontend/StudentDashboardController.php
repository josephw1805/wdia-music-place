<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\User;
use App\Traits\FileUpload;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StudentDashboardController extends Controller
{
    use FileUpload;

    function index(): View
    {
        return view('frontend.student-dashboard.index');
    }

    function becomeArtist(): View
    {
        return view('frontend.student-dashboard.become-artist.index');
    }

    function becomeArtistUpdate(Request $request, User $user): RedirectResponse
    {
        $request->validate(['document' => ['required', 'mimes:pdf,docx,jpg,png', 'max:12000']]);
        $filePath = $this->uploadFile($request->file('document'));
        $user->update([
            'approve_status' => 'pending',
            'document' => $filePath
        ]);

        return redirect()->route('student.dashboard');
    }

    function review(): View
    {
        $reviews = Review::where('user_id', user()->id)->latest()->paginate(10);
        return view('frontend.student-dashboard.review.index', compact('reviews'));
    }

    function reviewDestroy(string $id)
    {
        try {
            $review = Review::where('id', $id)->where('user_id', user()->id)->firstOrFail();
            $review->delete();
            return response(['message' => 'Deleted Successfully!'], 200);
        } catch (Exception $e) {
            return response(['message' => 'Something went wrong!'], 500);
        }
    }
}
