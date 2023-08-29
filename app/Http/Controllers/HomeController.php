<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comments;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $title = 'Beranda';
        $postsCount = Post::count();
        $categoriesCount = Category::count();
        $commentsCount = Comments::count();
        $usersCount = User::count();

        return view('home', compact('title', 'postsCount', 'categoriesCount', 'commentsCount', 'usersCount'));
    }
}
