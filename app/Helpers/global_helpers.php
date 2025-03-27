<?php

/** convert Minutes to hours */

use App\Models\Cart;

if (!function_exists('convertMinutesToHours')) {
    function convertMinutesToHours(int $minutes): string
    {
        $hours = floor($minutes / 60);
        $minutes = $minutes % 60;
        return sprintf('%dh:%02dm', $hours, $minutes);
    }
}

if (!function_exists('user')) {
    function user()
    {
        return auth('web')->user();
    }
}

if (!function_exists('adminUser')) {
    function adminUser()
    {
        return auth('admin')->user();
    }
}

if (!function_exists('cartCount')) {
    function cartCount()
    {
        return Cart::where('user_id', user()?->id)->count();
    }
}

/** calculate cart total */
if (!function_exists('cartTotal')) {
    function cartTotal()
    {
        $total = 0;

        $cart = Cart::where('user_id', user()->id)->get();

        foreach ($cart as $item) {
            if ($item->album->discount > 0) {
                $total += $item->album->discount;
            } else {
                $total += $item->album->price;
            }
        }

        return $total;
    }
}

/** calculate commission */
if (!function_exists('calculateCommission')) {
    function calculateCommission($amount, $commission)
    {
        return $amount == 0 ? 0 : $amount * $commission / 100;
    }
}
