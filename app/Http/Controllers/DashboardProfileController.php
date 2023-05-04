<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class DashboardProfileController extends Controller
{
    public function uploadAvatar(Request $request)
    {
        $request->validate([
            'image' => 'image|file|mimes:jpeg,png,jpg|max:1500|dimensions:max_width=800,max_height=800'
        ]);

        if ($request->hasFile('image')) {   
            $filename = $request->image->getClientOriginalName();

            $this->deleteOldAvatar();

            $request->image->storeAs('user-images', $filename, 'public');
            auth()->user()->update(['avatar' => $filename]);

            return redirect()->back()->with('successUploadImg', 'Profile picture updated successfully!');
        }

        return redirect()->back()->with('errorUploadImg', 'Failed. Check your image!');
    }

    protected function deleteOldAvatar()
    {
        if(auth()->user()->avatar)
        {
            Storage::delete('storage/user-images/' . auth()->user()->avatar);
        }
    }

    public function changePassword(Request $request)
    {
        $validatedData = $request->validate([
            'currentpwd' => 'required|max:255',
            'password' => 'required|confirmed|min:8|max:255',
        ]);

        if (!Hash::check($validatedData['currentpwd'], $request->user()->password)) {
            return back()->withErrors(['currentpwd' => 'The current password is incorrect.']);
        }

        $request->user()->update(['password' => Hash::make($validatedData['password'])]); // Update password

        return redirect('/dashboard/profile/'.auth()->user()->username.'/edit')->with('successUpdateProfile', 'Password has been changed!');
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
            'user' => User::where('id', auth()->user()->id)->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('dashboard.profile.edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'max:255',
            'email' => 'email|max:255',
            'description' => 'max:255',
            'username' => 'max:255',
        ]);

        $request->user()->update($validatedData);
    
        return redirect('/dashboard/profile/'.auth()->user()->username.'/edit')->with('successUpdateProfile', 'Account details has been edited!');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
