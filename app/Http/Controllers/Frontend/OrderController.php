<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    function index(): View
    {
        $orderItems = OrderItem::whereHas('album', function ($query) {
            $query->where('artist_id', user()->id);
        })->paginate(25);
        return view('frontend.artist-dashboard.order.index', compact('orderItems'));
    }
}
