<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\PasswordUpdateRequest;
use App\Http\Requests\Frontend\ProfileUpdateRequest;
use App\Models\User;
use App\Traits\FileUpload;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    use FileUpload;

    public function index(): View
    {
        return view('frontend.student-dashboard.profile.index');
    }

    public function edit(User $user): View
    {
        return view('frontend.student-dashboard.profile.edit', compact('user'));
    }

    public function updateProfile(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = User::findOrFail(Auth::user()->id);

        // update avatar
        if ($request->hasFile('avatar')) {
            $avatarPath = $this->uploadFile($request->file('avatar'));
            if ($user->image !== 'default-files/avatar.png') {
                $this->deleteFile($user->image);
            }
            $user->image = $avatarPath;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->bio = $request->bio;
        $user->headline = $request->headline;
        $user->gender = $request->gender;
        $user->facebook = $request->facebook;
        $user->tiktok = $request->tiktok;
        $user->instagram = $request->instagram;
        $user->website = $request->website;
        $user->experience = $request->experience;
        $user->save();


        notyf()->success('Updated successfully');

        return redirect()->back();
    }

    public function updatePassword(PasswordUpdateRequest $request): RedirectResponse
    {
        $user = User::findOrFail(Auth::user()->id);
        $user->password = bcrypt($request->password);
        $user->save();
        notyf()->success('Password changed successfully');
        return redirect()->back();
    }
}
