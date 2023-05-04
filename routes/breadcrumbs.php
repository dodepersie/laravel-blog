<?php // routes/breadcrumbs.php
use App\Models\Post;

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('home'));
});

// Home > Posts
Breadcrumbs::for('posts', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Posts', route('posts'));
});

// Home > Categories
Breadcrumbs::for('categories', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Categories', route('categories'));
});

// Home > Login
Breadcrumbs::for('login', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Login', route('login'));
});

// Home > Register
Breadcrumbs::for('register', function (BreadcrumbTrail $trail) {
    $trail->parent('login');
    $trail->push('Register', route('register'));
});

// Home > Posts > [Title]
Breadcrumbs::for('post', function (BreadcrumbTrail $trail, Post $post) {
    $trail->parent('posts');
    $trail->push($post->title, route('post', $post));
});

// Dashboard Home
Breadcrumbs::for('dashboard.home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('dashboard.home'));
});

// Dashboard Home > Posts
Breadcrumbs::for('dashboard.posts', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard.home');
    $trail->push('Posts', route('dashboard.posts'));
});

// // Home > Categories
// Breadcrumbs::for('categories', function (BreadcrumbTrail $trail) {
//     $trail->parent('home');
//     $trail->push('Categories', route('categories'));
// });