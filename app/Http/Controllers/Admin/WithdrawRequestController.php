<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Withdraw;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class WithdrawRequestController extends Controller
{
    function index(): View
    {
        $withdraws = Withdraw::with('artist')->paginate(25);
        return view('admin.withdraw-request.index', compact('withdraws'));
    }

    function show(Withdraw $withdraw): View
    {
        return view('admin.withdraw-request.show', compact('withdraw'));
    }

    function updateStatus(Request $request, Withdraw $withdraw): RedirectResponse
    {
        $request->validate([
            'status' => 'required|in:pending,approved,rejected'
        ]);

        $withdraw->status = $request->status;
        if ($request->status == 'approved') {
            $withdraw->artist->wallet = $withdraw->artist->wallet - $withdraw->amount;
            $withdraw->artist->save();
        }
        $withdraw->save();

        notyf()->success('Updated Successfully');
        return redirect()->route('admin.withdraw-request.index');
    }
}
