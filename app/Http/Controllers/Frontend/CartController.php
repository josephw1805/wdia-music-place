<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Cart;
use App\Models\Subscription;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    function index(): View
    {
        $cart = Cart::with(['album'])->where(['user_id' => user()?->id])->paginate();
        return view('frontend.pages.cart', compact('cart'));
    }

    function addToCart(int $id): Response
    {
        if (!Auth::guard('web')->check()) {
            return response(['message' => 'Please Login First'], 401);
        }
        if (Cart::where(['album_id' => $id, 'user_id' => user()->id])->exists()) {
            return response(['message' => 'Already Added'], 401);
        }
        if (Subscription::where(['album_id' => $id, 'user_id' => user()->id])->exists()) {
            return response(['message' => 'You already purchased this album'], 401);
        }

        $album = Album::findOrFail($id);
        $cart = new Cart();
        $cart->album_id = $album->id;
        $cart->user_id = user()->id;
        $cart->save();

        return response(['message' => 'Added Successfully'], 200);
    }

    function removeFromCart(int $id): RedirectResponse
    {
        $cart = Cart::where(['id' => $id, 'user_id' => user()->id])->firstOrFail();
        $cart->delete();
        notyf()->success('Removed Successfully');
        return redirect()->back();
    }
}
