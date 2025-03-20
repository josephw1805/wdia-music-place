<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ArtistPayoutInformation;
use App\Models\PayoutGateway;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PayoutGatewayController extends Controller
{
    function index(): View
    {
        $gateways = PayoutGateway::where('status', 1)->get();
        return view('frontend.artist-dashboard.gatwway.index', compact('gateways'));
    }

    function updateGatewayInfo(Request $request): RedirectResponse
    {
        ArtistPayoutInformation::updateOrCreate(
            ['artist_id' => user()->id],
            [
                'gateway' => $request->gateway,
                'information' => $request->information
            ]
        );

        notyf()->success('Updated Successfully');

        return redirect()->back();
    }
}
