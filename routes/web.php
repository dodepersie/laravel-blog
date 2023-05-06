<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\DashboardProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\App;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('choose_lang', [
        'title' => 'Landing Page',
    ]);
});

// 404 Page
Route::fallback(function () {
    return view('errors.404', [
        'title' => 'Not Found',
    ]);
});

Route::prefix('{locale}')
    ->where(['locale' => '[a-zA-Z]{2}'])
    ->middleware('setlocale')
    ->group(function() {

    Route::get('/', function() {
        return view('home', [
            'title' => 'Home',
        ]);
    })->name('home'); 

    Route::get('/posts', [PostController::class, 'index'])->name('posts');
    Route::get('/posts/{post:slug}', [PostController::class, 'show'])->name('post');
    Route::post('/posts/{post:slug}', [PostController::class, 'postComment']);
    
    Route::get('/categories', function() {
        return view("categories", [
            'title' => 'Post Categories',
            'categories' => Category::all(),
        ]);
    })->name('categories');
    
    Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
    Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
});

// Auth Route
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::post('/register', [RegisterController::class, 'store']);

// Dashboard things
Route::get('/dashboard', function() {
    return view('dashboard.index', [
        'posts' => Post::where('user_id', auth()->user()->id)->orderByDesc('created_at')->get(),
        'user' => User::where('id', auth()->user()->id)->first(),
    ]);
})->name('dashboard.home')->middleware('auth');

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');
Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('auth');

// Dashboard Profile
Route::resource('/dashboard/profile', DashboardProfileController::class)->middleware('auth');
Route::post('/dashboard/profile/upload', [DashboardProfileController::class, 'uploadAvatar'])->middleware('auth');
Route::post('/dashboard/profile/changepwd', [DashboardProfileController::class, 'changePassword'])->middleware('auth');