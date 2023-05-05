@extends('dashboard.layouts.main')

@section('container')
    <div class="row">
        <div class="col-lg-6">
            <article class="mb-3">
                <h2>Viewing post: {{ $post->title }}</h2>
                <hr />

                <div class="mb-3">
                    <a href="/dashboard/posts" class="btn btn-primary btn-icon-split mr-2">
                        <span class="icon text-white-50">
                            <i class="fas fa-arrow-left"></i>
                        </span>
                        <span class="text">Back to my posts</span>
                    </a>

                    <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-secondary btn-icon-split mr-2">
                        <span class="icon text-white-50">
                            <i class="fas fa-edit"></i>
                        </span>
                        <span class="text">Edit post</span>
                    </a>

                    <a href="{{ '/' . app()->getLocale() . '/posts/' .$post->slug }}" class="btn btn-success btn-icon-split mr-2">
                        <span class="icon text-white-50">
                            <i class="fas fa-eye"></i>
                        </span>
                        <span class="text">View on blog</span>
                    </a>

                    <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger btn-icon-split" onClick="return confirm('Are you sure want to delete {{ $post->title }} ?')">
                            <span class="icon text-white-50">
                                <i class="fas fa-trash"></i>
                            </span>
                            <span class="text">Delete post</span>
                        </button>
                    </form>
                </div>


                @if ($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid" alt="{{ $post->title }}">
                @else
                <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="img-fluid" alt="{{ $post->title }}">
                @endif

                <article class="my-3 fs-5">
                    {!! $post->body !!}
                </article>
            </article>
        </div>
    </div>
@endsection