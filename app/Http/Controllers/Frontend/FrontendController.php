<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutUsSection;
use App\Models\Album;
use App\Models\AlbumCategory;
use App\Models\BecomeArtist;
use App\Models\Brand;
use App\Models\Contact;
use App\Models\ContactSetting;
use App\Models\Counter;
use App\Models\Feature;
use App\Models\FeaturedArtist;
use App\Models\Hero;
use App\Models\LatestAlbum;
use App\Models\Newsletter;
use App\Models\Testimonial;
use App\Models\Video;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FrontendController extends Controller
{
    function index(): View
    {
        $hero = Hero::first();
        $feature = Feature::first();
        $category = AlbumCategory::with(['subCategories' => function ($query) {
            $query->withCount(['albums as subcategory_album_count' => function ($query) {
                $query->where(['is_approved' => 'approved', 'status' => 'active']);
            }]);
        }])->whereNull('parent_id')->where('show_at_trending', 1)->limit(12)->get()
            ->map(function ($category) {
                $category->active_album_count = $category->subCategories->sum('subcategory_album_count');
                return $category;
            });
        $about = AboutUsSection::first();
        $latestAlbum = LatestAlbum::first();
        $becomeArtist = BecomeArtist::first();
        $video = Video::first();
        $brands = Brand::where('status', 1)->get();
        $featuredArtist = FeaturedArtist::first();
        $featuredArtistAlbums = Album::whereIn('id', json_decode($featuredArtist?->featured_albums ?? []))->get();

        /** Featured Category */
        $categoryOne = AlbumCategory::where('id', $latestAlbum->category_one)->first();
        $categoryTwo = AlbumCategory::where('id', $latestAlbum->category_two)->first();
        $categoryThree = AlbumCategory::where('id', $latestAlbum->category_three)->first();
        $categoryFour = AlbumCategory::where('id', $latestAlbum->category_four)->first();

        $testimonials = Testimonial::limit(8)->get();

        return view('frontend.pages.home.index', compact(
            'hero',
            'feature',
            'category',
            'about',
            'becomeArtist',
            'video',
            'brands',
            'featuredArtist',
            'featuredArtistAlbums',
            'categoryOne',
            'categoryTwo',
            'categoryThree',
            'categoryFour',
            'testimonials'
        ));
    }

    function subscribe(Request $request): Response
    {
        $request->validate([
            'email' => 'required|email|unique:newsletters,email'
        ], [
            'email.required' => 'Email is required',
            'email.email' => 'Email is invalid',
            'email.unique' => 'Email is already subscribed'
        ]);

        $newsletter = new Newsletter();
        $newsletter->email = $request->email;
        $newsletter->save();

        return response(['status' => 'success', 'message' => 'Successfully Subscribed']);
    }

    function about(): View
    {
        $about = AboutUsSection::first();
        $category = AlbumCategory::with(['subCategories' => function ($query) {
            $query->withCount(['albums as subcategory_album_count' => function ($query) {
                $query->where(['is_approved' => 'approved', 'status' => 'active']);
            }]);
        }])->whereNull('parent_id')->where('show_at_trending', 1)->limit(12)->get()
            ->map(function ($category) {
                $category->active_album_count = $category->subCategories->sum('subcategory_album_count');
                return $category;
            });
        $testimonials = Testimonial::limit(8)->get();
        $counter = Counter::first();
        return view('frontend.pages.about', compact('about', 'category', 'testimonials', 'counter'));
    }

    function contact(): View
    {
        $contactCards = Contact::where('status', 1)->get();
        $contactSetting = ContactSetting::first();
        return view('frontend.pages.contact', compact('contactCards', 'contactSetting'));
    }
}
