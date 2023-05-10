@extends('dashboard.layouts.main')

@section('container')
    <main id="main" class="main pt-4">
        <div class="pagetitle">
            <h1>View Post</h1>
            {{ Breadcrumbs::view('breadcrumbs::bootstrap5', 'dashboard.post.view', $post) }}
        </div><!-- End Page Title -->
        <section class="section">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle me-1"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body pt-4">

                            <div class="mb-3">
                                <a href="/dashboard/posts" class="btn btn-primary btn-icon-split mr-2">
                                    <i class="bi bi-arrow-left"></i>
                                    <span class="text d-none d-lg-inline">Back to my posts</span>
                                </a>

                                <a href="/dashboard/posts/{{ $post->slug }}/edit"
                                    class="btn btn-secondary btn-icon-split mr-2">
                                    <i class="bi bi-pencil-square"></i>
                                    <span class="text d-none d-lg-inline">Edit post</span>
                                </a>

                                <a href="{{ '/' . \Carbon\Carbon::getLocale() . '/posts/' . $post->slug }}"
                                    class="btn btn-success btn-icon-split mr-2" target="_blank" ref="noreferrer">
                                    <i class="bi bi-eye"></i>
                                    <span class="text d-none d-lg-inline">View on blog</span>
                                </a>

                                <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger btn-icon-split"
                                        onClick="return confirm('Are you sure want to delete {{ $post->title }} ?')">
                                        <i class="bi bi-trash"></i>
                                        <span class="text d-none d-lg-inline">Delete post</span>
                                    </button>
                                </form>
                            </div>

                            @if ($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" class="rounded img-fluid"
                                    alt="{{ $post->title }}">
                            @else
                                <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}"
                                    class="rounded img-fluid" alt="{{ $post->title }}">
                            @endif

                            <article class="my-3 text-justify lh-lg">
                                {!! $post->body !!}
                            </article>

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
