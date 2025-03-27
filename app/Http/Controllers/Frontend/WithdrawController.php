<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Withdraw;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class WithdrawController extends Controller
{
    function index(): View
    {
        $currentBalance = user()->wallet;
        $pendingBalance = Withdraw::where('artist_id', user()->id)->where('status', 'pending')->sum('amount');
        $totalPayout = Withdraw::where('artist_id', user()->id)->where('status', 'approved')->sum('amount');
        return view('frontend.artist-dashboard.withdraw.index', compact('currentBalance', 'pendingBalance', 'totalPayout'));
    }

    function requestPayout(Request $request): RedirectResponse
    {
        $request->validate([
            'amount' => 'required|numeric|min:0'
        ]);

        if (user()->wallet < $request->amount) {
            notyf()->error('Insufficient Balance');
            return redirect()->back();
        }

        if (Withdraw::where('artist_id', user()->id)->where('status', 'pending')->exists()) {
            notyf()->error('Withdraw Request Already Pending');
            return redirect()->back();
        }

        $withdraw = new Withdraw();
        $withdraw->artist_id = user()->id;
        $withdraw->amount = $request->amount;
        $withdraw->save();
        notyf()->success('Withdraw Request Sent');
        return redirect()->back();
    }
}
