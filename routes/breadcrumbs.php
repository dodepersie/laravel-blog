<?php

// routes/breadcrumbs.php
use App\Models\Post;
// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;
// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Beranda', route('home'));
});

// Home > Posts
Breadcrumbs::for('posts', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Artikel', route('posts'));
});

// Home > Categories
Breadcrumbs::for('categories', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Kategori', route('categories'));
});

// Home > Verification Email
Breadcrumbs::for('verification', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Verifikasi', route('verification.notice'));
});

// Home > Posts > [Title]
Breadcrumbs::for('post', function (BreadcrumbTrail $trail, Post $post) {
    $trail->parent('posts');
    $trail->push($post->title, route('post', $post));
});

// Dashboard
Breadcrumbs::for('dashboard.home', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('dashboard.home'));
});

// Dashboard > Posts
Breadcrumbs::for('dashboard.posts', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard.home');
    $trail->push('Artikel', route('posts.index'));
});

// Dashboard > Posts > Create
Breadcrumbs::for('dashboard.post.create', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard.posts');
    $trail->push('Buat', route('posts.create'));
});

// Dashboard > Posts > View: [Title]
Breadcrumbs::for('dashboard.post.view', function (BreadcrumbTrail $trail, Post $post) {
    $trail->parent('dashboard.posts');
    $trail->push('View: '.$post->title, route('post', $post));
});

// Dashboard > Posts > Edit: [Title]
Breadcrumbs::for('dashboard.post.edit', function (BreadcrumbTrail $trail, Post $post) {
    $trail->parent('dashboard.posts');
    $trail->push('Edit: '.$post->title, route('post', $post));
});

// Dashboard > Categories
Breadcrumbs::for('dashboard.categories', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard.home');
    $trail->push('Kategori', route('categories.index'));
});

// Dashboard > Users List
Breadcrumbs::for('dashboard.users_list', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard.home');
    $trail->push('Daftar User', route('users_list.index'));
});

// Dashboard > Profile
Breadcrumbs::for('dashboard.profile', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard.home');
    $trail->push('Profil', route('profile.index'));
});
