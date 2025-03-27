<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Counter;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CounterController extends Controller
{
    function index(): View
    {
        $counter = Counter::first();
        return view('admin.sections.counter.index', compact('counter'));
    }

    function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'counter_one' => ['nullable', 'numeric', 'max:255'],
            'title_one' => ['nullable', 'string', 'max:255'],
            'counter_two' => ['nullable', 'numeric', 'max:255'],
            'title_two' => ['nullable', 'string', 'max:255'],
            'counter_three' => ['nullable', 'numeric', 'max:255'],
            'title_three' => ['nullable', 'string', 'max:255'],
            'counter_four' => ['nullable', 'numeric', 'max:255'],
            'title_four' => ['nullable', 'string', 'max:255'],
        ]);

        Counter::updateOrCreate(
            ['id' => 1],
            $validatedData
        );

        notyf()->success('Updated Successfully');
        return redirect()->back();
    }
}
