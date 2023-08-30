<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\UploadAvatarRequest;
use App\Http\Requests\UpdateProfileRequest;

class DashboardProfileController extends Controller
{
    public function uploadAvatar(UploadAvatarRequest $request)
    {
        $request->validated();

        $userId = $request->input('id');
        $user = User::findOrFail($userId);

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');

            $image = Image::make($avatar);
            $image->fit(100, 100)->encode('webp', 90);
            $avatarName = uniqid('avatar_') . '.webp';
            $avatarPath = 'user_images/' . $avatarName;
            $image->save($avatarPath);

            // Delete old avatar
            if ($user->avatar) {
                $oldAvatarPath = 'user_images/' . $user->avatar;
                if (file_exists($oldAvatarPath)) {
                    unlink($oldAvatarPath);
                }
            }

            // Save to Database
            $user->avatar = $avatarName;
            $user->save();

            // Change commentator avatar
            Comments::where('comment_user_id', auth()->user()->id)->update(['comment_avatar' => $avatarPath]);

            return back()->with('success', 'Avatar updated successfully!');
        }
    }

    public function removeAvatar($userId)
    {
        $user = User::findOrFail($userId);

        // Delete avatar file
        if ($user->avatar) {
            $avatarPath = 'user_images/' . $user->avatar;
            if (file_exists($avatarPath)) {
                unlink($avatarPath);
            }
        }

        // Clear avatar field in the database
        $user->avatar = null;
        $user->save();

        Comments::where('comment_user_id', auth()->user()->id)->update(['comment_avatar' => null]);

        return back()->with('success', 'Avatar deleted successfully!');
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $validatedData = $request->validated();

        if (!Hash::check($validatedData['currentpwd'], $request->user()->password)) {
            return back()->withErrors(['error' => 'The current password is incorrect.']);
        }

        $request->user()->update(['password' => Hash::make($validatedData['password'])]);

        return back()->with('success', 'Password has been changed!');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.profile.index', [
            'user' => User::where('id', auth()->user()->id)->first(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProfileRequest $request, User $user)
    {
        $validatedData = $request->validated();
        $request->user()->update($validatedData);
        return redirect()->route('profile.index')->with('success', 'Account details has been edited!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
