<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class DashboardProfileController extends Controller
{
    public function uploadAvatar(Request $request)
    {
        $request->validate(
            [
                'avatar' => 'required|image|file|mimes:jpeg,png,jpg|max:1500|dimensions:max_width=1600,max_height=1600',
            ],
            [
                'required' => 'The :attribute field is required.',
                'image' => 'Must be an :attribute!',
                'max' => 'The :attribute may not be greater than :max kilobytes.',
                'mimes' => 'The :attribute must be a file of type: :values.',
                'dimensions' => 'The :attribute has invalid image dimensions.',
            ],
        );

        // Buat cooldown
        $userId = auth()->user()->id;
        $cooldownKey = 'avatar_cooldown_' . $userId;
        $cooldownDuration = 3600; // Durasi cooldown dalam detik

        if ($request->hasFile('avatar')) {
            $filename = $request->avatar->getClientOriginalName();
            $request->avatar->storeAs('user-images', $filename, 'public');

            if (!Cache::has($cooldownKey)) {
                // Update avatar
                User::where('id', auth()->user()->id)->update(['avatar' => $filename]);

                // Mengupdate avatar pada komentar
                Comments::where('comment_user_id', auth()->user()->id)->update(['comment_avatar' => $filename]);

                // Store cache
                Cache::put($cooldownKey, true, $cooldownDuration);

                return redirect()
                    ->back()
                    ->with('success', 'Avatar updated successfully!');
            } else {
                $cooldownExpiration = Cache::get($cooldownKey) + $cooldownDuration;
                $remainingTime = $cooldownExpiration - time();

                // Verify if cooldown has expired
                if ($remainingTime <= 0) {
                    // Cooldown has expired, update avatar and reset cooldown
                    // Update avatar
                    User::where('id', auth()->user()->id)->update(['avatar' => $filename]);

                    // Mengupdate avatar pada komentar
                    Comments::where('comment_user_id', auth()->user()->id)->update(['comment_avatar' => $filename]);

                    Cache::put($cooldownKey, time(), $cooldownDuration);
                    
                    return redirect()->back()->with('success', 'Avatar updated successfully!');
                }

                // Calculate remaining hours and minutes
                $remainingHours = floor($remainingTime / 3600);
                $remainingMinutes = floor(($remainingTime % 3600) / 60);

                return redirect()
                    ->back()
                    ->with('error', 'Avatar change cooldown in progress. Please try again after ' . $remainingHours . ' hours and ' . $remainingMinutes . ' minutes!');
            }
        }
    }

    public function changePassword(Request $request)
    {
        $validatedData = $request->validate(
            [
                'currentpwd' => 'required|max:255',
                'password' => [
                    'required',
                    'confirmed',
                    Password::min(8)
                        ->letters()
                        ->mixedCase()
                        ->numbers()
                        ->symbols(),
                ],
            ],
            [
                'required' => 'The :attribute field is required.',
                'min' => 'The :attribute must be at least :min characters.',
                'confirmed' => 'Confirm your new password!',
            ],
        );

        if (!Hash::check($validatedData['currentpwd'], $request->user()->password)) {
            return back()->withErrors(['error' => 'The current password is incorrect.']);
        }

        $request->user()->update(['password' => Hash::make($validatedData['password'])]); // Update password

        return redirect('/dashboard/profile/' . auth()->user()->username)->with('success', 'Password has been changed!');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return redirect('/dashboard/profile/' . auth()->user()->username);
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
        return view('dashboard.profile.index', [
            'user' => User::where('id', auth()->user()->id)->first(), // Changed on May 9, 2023 get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('dashboard.profile.index', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate(
            [
                'username' => ['required', 'string', 'max:255', Rule::unique('users', 'username')->ignore(auth()->user()->id)],
                'name' => 'required|max:255',
                'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore(auth()->user()->id)],
                'description' => 'max:255',
            ],
            [
                'required' => 'The field :attribute is required!',
                'max' => 'The :attribute must be not max :max characters.',
                'unique' => 'The :attribute has already been taken.',
            ],
        );

        // Buat cooldown
        $userId = auth()->user()->id;
        $cooldownKey = 'user_update_cooldown_' . $userId;
        $cooldownDuration = 3600; // Durasi cooldown dalam detik

        if (!Cache::has($cooldownKey)) {
            // Update profile
            $request->user()->update($validatedData);

            // Store cache
            Cache::put($cooldownKey, true, $cooldownDuration);
            return redirect('/dashboard/profile/' . auth()->user()->username)->with('success', 'Account details has been edited!');
        } else {
            $cooldownExpiration = Cache::get($cooldownKey) + $cooldownDuration;
            $remainingTime = $cooldownExpiration - time();

            // Verify if cooldown has expired
            if ($remainingTime <= 0) {
                // Cooldown has expired, update profile and reset cooldown
                // Update profile
                $request->user()->update($validatedData);

                Cache::put($cooldownKey, time(), $cooldownDuration);
                
                return redirect()->back()->with('success', 'Account details has been edited!');
            }

            // Calculate remaining hours and minutes
            $remainingHours = floor($remainingTime / 3600);
            $remainingMinutes = floor(($remainingTime % 3600) / 60);

            return redirect()
                ->back()
                ->with('error', 'Profile update cooldown in progress. Please try again after ' . $remainingHours . ' hours and ' . $remainingMinutes . ' minutes!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
