<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Register' 
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:8|max:255|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => [
                'required',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
            ],
        ], [
            'required' => 'The :attribute field is required.',
            'min' => 'The :attribute must be at least :min characters.',
            'unique' => 'The :attribute has already been taken.',
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);
        User::create($validatedData);
        return redirect(Carbon::getLocale() . '/login')->with('success', 'Register success!');
    }
}
