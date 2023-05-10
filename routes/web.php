<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\DashboardProfileController;
use App\Http\Controllers\DashboardUsersListController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\NewsController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use App\Models\News;

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
        'title' => '404',
    ]);
})->name('404');

Route::prefix('{locale}')
    ->where(['locale' => '(id|en)'])
    ->middleware('setlocale')
    ->group(function () {
        Route::get('/', function () {
            return view('home', [
                'title' => 'Home',
            ]);
        })->name('home');

        Route::get('/posts', [PostController::class, 'index'])->name('posts');
        Route::get('/posts/{post:slug}', [PostController::class, 'show'])->name('post');
        Route::post('/posts/{post:slug}', [PostController::class, 'postComment']);

        Route::get('/categories', function () {
            return view('categories', [
                'title' => 'Post Categories',
                'categories' => Category::all(),
            ]);
        })->name('categories');

        Route::get('/login', [LoginController::class, 'index'])
            ->name('login')
            ->middleware('guest');
        Route::get('/register', [RegisterController::class, 'index'])
            ->name('register')
            ->middleware('guest');
    });

// Auth Route
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::post('/register', [RegisterController::class, 'store']);

// Dashboard things
Route::get('/dashboard', function () {
    return view('dashboard.index', [
        'posts' => Post::where('user_id', auth()->user()->id)
            ->orderByDesc('created_at')
            ->get(),
        'user' => User::where('id', auth()->user()->id)->first(),
        'news' => News::latest('created_at')->get(),
    ]);
})
    ->name('dashboard.home')
    ->middleware('auth');

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)
    ->names([
        'index' => 'dashboard.posts.index',
        'create' => 'dashboard.posts.create',
        'store' => 'dashboard.posts.store',
        'show' => 'dashboard.posts.show',
        'edit' => 'dashboard.posts.edit',
        'update' => 'dashboard.posts.update',
        'destroy' => 'dashboard.posts.destroy',
    ])
    ->middleware('auth');
Route::resource('/dashboard/categories', AdminCategoryController::class)
    ->except('show')
    ->name('index', 'dashboard.categories')
    ->middleware('auth');
Route::resource('/dashboard/users_list', DashboardUsersListController::class)
    ->name('index', 'dashboard.users_list')
    ->middleware('auth');
Route::resource('/dashboard/profile', DashboardProfileController::class)
    ->name('index', 'dashboard.profile')
    ->middleware('auth');
Route::post('/dashboard/profile/upload', [DashboardProfileController::class, 'uploadAvatar'])->middleware('auth');
Route::post('/dashboard/profile/changepwd', [DashboardProfileController::class, 'changePassword'])->middleware('auth');
Route::resource('/dashboard/news', NewsController::class)->middleware('auth');