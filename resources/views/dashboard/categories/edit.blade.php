@extends('dashboard.layouts.main')

@section('container')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit category: {{ $category->name }}</h1>
</div>
<hr />

<div class="col-lg-8">
    <form method="POST" action="/dashboard/categories/{{ $category->id }}" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label">New Category Name</label>
          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ $category->name }}" name="name" required autofocus>
          @error('name')
            <div class="invalid-feedback mt-3">
                {{ $message }}
            </div>
          @enderror
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" value="{{ $category->slug }}" name="slug" required readonly>
            @error('slug')
            <div class="invalid-feedback mt-3">
                {{ $message }}
            </div>
          @enderror
        </div>
        <button type="submit" class="btn btn-primary mb-3">Edit category</button>
    </form>
</div>
@endsection

@section('script')
<script>
    const name = document.querySelector('#name');
    const slug = document.querySelector('#slug');

    name.addEventListener('change', function() {
       fetch('/dashboard/posts/checkSlug?title=' + name.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    });
</script>
@endsection