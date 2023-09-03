<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Post;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'posts' => Post::where('user_id', auth()->user()->id)
                ->latest()
                ->get(),
            'user' => User::where('id', auth()->user()->id)->first(),
            'news' => News::latest()->get(),
            'title' => 'Dashboard',
        ]);
    }
}
