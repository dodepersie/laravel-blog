<?php

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\DashboardProfileController;
use App\Http\Controllers\DashboardUsersListController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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

// Route::get('/', function () {
//     return view('choose_lang', [
//         'title' => 'Landing Page',
//     ]);
// })->name('chooseLang');

// Route::prefix('{locale}')
//     ->where(['locale' => '(id|en)'])
//     ->middleware('setlocale')
//     ->group(function () {

// });

Route::get('/', function () {
    return view('home', [
        'title' => 'Home',
    ]);
})->name('home');

// 404 Page
Route::fallback(function () {
    return view('errors.404', [
        'title' => '404',
    ]);
})->name('404');

Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::get('/posts/{post:slug}', [PostController::class, 'show'])->name('post');
Route::post('/posts/{post:slug}', [PostController::class, 'postComment'])->name('postComment');
Route::delete('/posts/{post:slug}', [PostController::class, 'deleteComment'])->name('deleteComment');

Route::get('/categories', function () {
    return view('categories', [
        'title' => 'Post Categories',
        'categories' => Category::all(),
    ]);
})->name('categories');

// Auth Route
Route::get('/login', [LoginController::class, 'index'])
    ->name('login')
    ->middleware('guest');
Route::get('/register', [RegisterController::class, 'index'])
    ->name('register')
    ->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->name('loginAuth');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/register', [RegisterController::class, 'store'])->name('register');
Route::get('/email/verify', function () {
    if (auth()->user()->email_verified_at) {
        return redirect()->route('dashboard.home');
    }

    $title = 'Verification';
    return view('auth.verify-email', compact('title'));
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Link verifikasi terkirim!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::prefix('dashboard')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.home');
    Route::get('/posts/checkSlug', [DashboardPostController::class, 'checkSlug']);
    Route::resource('/posts', DashboardPostController::class);
    Route::resource('/categories', AdminCategoryController::class)->except('show');
    Route::resource('/users_list', DashboardUsersListController::class);
    Route::resource('/profile', DashboardProfileController::class);
    Route::post('/profile/upload_avatar', [DashboardProfileController::class, 'uploadAvatar'])->name('profile.upload_avatar');
    Route::post('/profile/remove_avatar/{userId}', [DashboardProfileController::class, 'removeAvatar'])->name('profile.remove_avatar');
    Route::post('/profile/change_passaword', [DashboardProfileController::class, 'changePassword'])->name('profile.change_password');
    Route::resource('/news', NewsController::class);
});
