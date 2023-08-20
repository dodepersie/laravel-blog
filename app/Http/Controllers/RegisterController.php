<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\User;
use App\Http\Requests\RegisterRequest;

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
        User::create($validatedData);
        return redirect(Carbon::getLocale() . '/login')->with('success', 'Register success!');
    }
}
