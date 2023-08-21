<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Register' 
        ]);
    }

    public function store(RegisterRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['password'] = bcrypt($validatedData['password']);
        $user = User::create($validatedData);

        event(new Registered($user));
        Auth::login($user);

        return redirect()->route('verification.notice');
    }
}
