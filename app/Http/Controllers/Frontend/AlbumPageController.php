<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\AlbumCategory;
use App\Models\AlbumGenre;
use App\Models\AlbumLanguage;
use App\Models\Review;
use App\Models\Subscription;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AlbumPageController extends Controller
{
    function index(Request $request): View
    {
        $albums = Album::where('is_approved', 'approved')
            ->where('status', 'active')
            ->when($request->has('search') && $request->filled('search'), function ($query) use ($request) {
                $query->where('title', 'like', '%' . $request->search . '%')
                    ->orWhere('description', 'like', '%' . $request->search . '%');
            })
            ->when($request->has('category') && $request->filled('category'), function ($query) use ($request) {
                $query->whereIn('category_id', $request->category);
            })
            ->when($request->has('genre') && $request->filled('genre'), function ($query) use ($request) {
                $query->whereIn('genre_id', $request->genre);
            })
            ->when($request->has('language') && $request->filled('language'), function ($query) use ($request) {
                $query->whereIn('language_id', $request->language);
            })
            ->when($request->has('from') && $request->has('to') && $request->filled('from') && $request->filled('to'), function ($query) use ($request) {
                $query->whereBetween('price', [$request->from, $request->to]);
            })
            ->orderBy('id', $request->filled('order') ? $request->order : 'desc')
            ->paginate(1);
        $categories = AlbumCategory::where('status', 1)->whereNull('parent_id')->get();
        $genres = AlbumGenre::all();
        $languages = AlbumLanguage::all();
        return view('frontend.pages.album-page', compact('albums', 'categories', 'genres', 'languages'));
    }

    function show(string $slug): View
    {
        $album = Album::with('reviews')->where('slug', $slug)->where('is_approved', 'approved')->where('status', 'active')->firstOrFail();
        $reviews = Review::where('album_id', $album->id)->where('status', 1)->paginate(5);
        return view('frontend.pages.album-details-page', compact('album', 'reviews'));
    }

    function storeReview(Request $request): RedirectResponse
    {
        $request->validate([
            'rating' => ['required', 'numeric'],
            'review' => ['required', 'string', 'max:1000'],
            'album' => ['required', 'integer']
        ]);

        $checkPurchase = Subscription::where('user_id', user()->id)->where('album_id', $request->album)->exists();
        $alreadyReviewed = Review::where('user_id', user()->id)->where('album_id', $request->album)->where('status', 1)->exists();

        if (!$checkPurchase) {
            notyf()->error('Please Purchase Album First');
            return redirect()->back();
        }

        if ($alreadyReviewed) {
            notyf()->error('You have already reviewed');
            return redirect()->back();
        }

        $review = new Review();
        $review->user_id = user()->id;
        $review->album_id = $request->album;
        $review->rating = $request->rating;
        $review->review = $request->review;
        $review->save();

        notyf()->success('Review Submitted Successfully');
        return redirect()->back();
    }
}
