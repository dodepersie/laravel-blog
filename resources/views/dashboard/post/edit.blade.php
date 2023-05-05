@extends('dashboard.layouts.main')

@section('container')
<div class="card mb-4 py-3 border-left-primary">
    <div class="card-body">
        <h1 class="h3 mb-0 text-gray-800">Edit post: {{ $post->title }}</h1>
    </div>
</div>

<div class="row gx-3 mb-3">
    <div class="col-lg-12">
        <form method="POST" action="/dashboard/posts/{{ $post->slug }}" enctype="multipart/form-data">
            @method('put')
            @csrf

            <div class="row">
                <!-- Left Col -->
                <div class="col-lg-8">
                    <!-- Title -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <label for="title" class="form-label font-weight-bold text-primary @error('title') is-invalid @enderror">Title</label>
                        </div>
            
                        <div class="card-body">
                            {{-- <label for="title" class="form-label invisible">Title</label> --}}
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ old('title' , $post->title) }}" name="title" required autofocus>
                            @error('title')
                            <div class="invalid-feedback mt-3">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
            
                    <!-- Slug -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <label for="slug" class="form-label font-weight-bold text-primary @error('slug') is-invalid @enderror">Slug</label>
                        </div>
                        
                        <div class="card-body">
                            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" value="{{ old('slug', $post->slug) }}" name="slug" required>
                            @error('slug')
                            <div class="invalid-feedback mt-3">
                                {{ $message }}
                            </div>
                          @enderror
                        </div>
                    </div>

                    <!-- Post Body -->
                    <div class="card shadow mb-3">
                        <div class="card-header py-3">
                            <label for="body" class="form-label font-weight-bold text-primary @error('body') is-invalid @enderror">Body</label>
                        </div>
            
                        <div class="card-body">
                            @error('body')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            <input id="body" type="hidden" name="body" value="{{ old('body', $post->body) }}" required>
                            <trix-editor input="body"></trix-editor>
                        </div>
                    </div>             
                </div>
        
                <!-- Right Col -->
                <div class="col-lg-4">
                    <!-- Post Image -->
                    <div class="card shadow mb-3">
                        <div class="card-header py-3">
                            <label for="image" class="form-label font-weight-bold text-primary @error('image') is-invalid @enderror">Post Image</label>
                        </div>
            
                        <div class="card-body text-center">
                            <input type="hidden" name="oldImage" value="{{ $post->image }}">
                            @if($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" class="img-preview mb-2" style="height: 10rem;">
                            @else
                            <img class="img-preview img-fluid mb-3" style="height: 10rem;">
                            @endif
                            <div class="small font-italic text-muted mb-2">JPG or PNG no larger than 1.5 MB</div>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image" name="image" onChange="previewImage()">
                                    <label class="custom-file-label" for="image">Choose file</label>
                                </div>
                            </div>
                            @error('image')
                            <div class="invalid-feedback mt-3">
                                {{ $message }}
                            </div>
                          @enderror
                        </div>
                    </div>

                    <!-- Category -->
                    <div class="card shadow mb-3">
                        <div class="card-header py-3">
                            <label for="category" class="form-label font-weight-bold text-primary @error('category') is-invalid @enderror">Category</label>
                        </div>
        
                        <div class="card-body">
                            <select class="form-select w-100" name="category_id" style="padding: 0.5rem; border-radius: 0.5rem; border: 1px solid #ccc; background-color: #fff;">
                                @foreach ($categories as $category)
                                  @if(old('category_id', $post->category->id) == $category->id)
                                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                  @else
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                  @endif
                                @endforeach
                              </select>                              
                        </div>
                    </div>

                    <!-- Update button -->
                    <div class="card shadow mb-3">
                        <div class="card-body">
                            <button type="submit" class="btn btn-primary btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                </span>
                                <span class="text">Update</span>
                            </button>

                            <button type="button" onclick="window.history.back();" class="btn btn-danger btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class='fas fa-backspace'></i>
                                </span>
                                <span class="text">Cancel</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('script')
<script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function() {
    fetch('/dashboard/posts/checkSlug?title=' + title.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    });
    
    function previewImage()
    {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
            imgPreview.style.height = '10rem';
        }
    }
</script>
@endsection