<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rule;

class DashboardProfileController extends Controller
{
    public function uploadAvatar(Request $request)
    {
        $request->validate([
            'avatar' => 'image|file|mimes:jpeg,png,jpg|max:1500|dimensions:max_width=800,max_height=800'
        ] , [
            'image' => 'Must be an :attribute!',
            'max' => 'The :attribute may not be greater than :max kilobytes.',
            'mimes' => 'The :attribute must be a file of type: :values.',
            'dimensions' => 'The :attribute has invalid image dimensions.',
        ]);

        if($request->hasFile('avatar'))
        {
            $filename = $request->avatar->getClientOriginalName();
            $request->avatar->storeAs('user-images', $filename, 'public');
            auth()->user()->update(['avatar' => $filename]);
            return redirect()->back()->with('success', 'Avatar updated successfully!');
        }
    }

    public function changePassword(Request $request)
    {
        $validatedData = $request->validate([
            'currentpwd' => 'required|max:255',
            'password' => [
                'required',
                'confirmed',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
            ],
        ], [
            'required' => 'The :attribute field is required.',
            'min' => 'The :attribute must be at least :min characters.',
            'confirmed' => 'Confirm your new password!'
        ]);

        if (!Hash::check($validatedData['currentpwd'], $request->user()->password)) {
            return back()->withErrors(['currentpwd' => 'The current password is incorrect.']);
        }

        $request->user()->update(['password' => Hash::make($validatedData['password'])]); // Update password

        return redirect('/dashboard/profile/'.auth()->user()->username)->with('success', 'Password has been changed!');
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
        $validatedData = $request->validate([
            'username' => [
                'required',
                'string',
                'max:255',
                Rule::unique('users', 'username')->ignore(auth()->user()->id)
            ],
            'name' => 'required|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore(auth()->user()->id)
            ],
            'description' => 'max:255',
        ], [
            'required' => 'The field :attribute is required!',
            'max' => 'The :attribute must be not max :max characters.',
            'unique' => 'The :attribute has already been taken.',
        ]);

        $request->user()->update($validatedData);
    
        return redirect('/dashboard/profile/'.auth()->user()->username)->with('success', 'Account details has been edited!');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
