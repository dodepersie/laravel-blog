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
    $trail->parent('home');
    $trail->push('Register', route('register'));
});

// Home > Verification Email
Breadcrumbs::for('verification', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Verification', route('verification.notice'));
});

// Home > Posts > [Title]
Breadcrumbs::for('post', function (BreadcrumbTrail $trail, Post $post) {
    $trail->parent('posts');
    $trail->push($post->title, route('post', $post));
});

// Dashboard: Home
Breadcrumbs::for('dashboard.home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('dashboard.home'));
});

// Dashboard: Home > Posts
Breadcrumbs::for('dashboard.posts', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard.home');
    $trail->push('Posts', route('posts.index'));
});

// Dashboard: Home > Posts > Create
Breadcrumbs::for('dashboard.post.create', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard.posts');
    $trail->push('Create', route('posts.create'));
});

// Dashboard: Home > Posts > View: [Title]
Breadcrumbs::for('dashboard.post.view', function (BreadcrumbTrail $trail, Post $post) {
    $trail->parent('dashboard.posts');
    $trail->push('View: ' . $post->title, route('post', $post));
});

// Dashboard: Home > Posts > Edit: [Title]
Breadcrumbs::for('dashboard.post.edit', function (BreadcrumbTrail $trail, Post $post) {
    $trail->parent('dashboard.posts');
    $trail->push('Edit: ' . $post->title, route('post', $post));
});

// Dashboard: Home > Categories
Breadcrumbs::for('dashboard.categories', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard.home');
    $trail->push('Categories', route('categories.index'));
});

// Dashboard: Home > Users List
Breadcrumbs::for('dashboard.users_list', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard.home');
    $trail->push('Users List', route('users_list.index'));
});

// Dashboard: Home > Profile
Breadcrumbs::for('dashboard.profile', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard.home');
    $trail->push('Profile', route('profile.index'));
});