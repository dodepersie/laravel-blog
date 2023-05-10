@extends('dashboard.layouts.main')

@section('container')
    <main id="main" class="main pt-4">
        <div class="pagetitle">
            <h1>Create new post</h1>
            {{ Breadcrumbs::view('breadcrumbs::bootstrap5', 'dashboard.post.create') }}
        </div><!-- End Page Title -->
        <section class="section">
            @if ($errors->any())
                <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show">
                    @foreach ($errors->all() as $error)
                        <p class="mb-0 py-1">
                            <i class="bi bi-exclamation-octagon me-1"></i>
                            {{ $error }}
                        </p>
                    @endforeach
                </div>
            @endif
            <div class="row gx-3">
                <div class="col-lg-12">
                    <form method="POST" action="/dashboard/posts" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <!-- Left Col -->
                            <div class="col-lg-8">
                                <!-- Title -->
                                <div class="card mb-4 pt-lg-5 pt-3">
                                    <div class="card-body">
                                        <!-- Title -->
                                        <div class="row g-0 mb-3">
                                            <label for="title" class="col-sm-1 col-form-label">Title</label>
                                            <div class="col-sm-11">
                                                <input type="text"
                                                    class="form-control @error('title')is-invalid @enderror" id="title"
                                                    name="title" required autofocus>
                                            </div>
                                        </div>

                                        <!-- Slug -->
                                        <div class="row g-0 mb-3">
                                            <label for="slug" class="col-sm-1 col-form-label">Slug</label>
                                            <div class="col-sm-11">
                                                <input type="text"
                                                    class="form-control @error('slug') is-invalid @enderror" id="slug"
                                                    name="slug" required readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Post Body -->
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">Content / Body</h5>
                                        <textarea class="summernote" name="body"></textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- Right Col -->
                            <div class="col-lg-4">
                                <!-- Post Image -->
                                <div class="card mb-3">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Post Image</h5>
                                        <img class="img-preview img-fluid mb-2">
                                        <div class="small font-italic text-muted mb-2">JPG or PNG no larger than 1.5 MB
                                        </div>
                                        <div class="input-group">
                                            <input class="form-control" type="file" id="image" name="image"
                                                onChange="previewImage()">
                                        </div>
                                    </div>
                                </div>

                                <!-- Category -->
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">Category</h5>
                                        <select class="form-select w-100" name="category_id"
                                            style="padding: 0.5rem; border-radius: 0.5rem; border: 1px solid #ccc; background-color: #fff;">
                                            @foreach ($categories as $category)
                                                @if (old('category_id') == $category->id)
                                                    <option value="{{ $category->id }}" selected={{ $category->name }}>
                                                        {{ $category->name }}</option>
                                                @else
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>

                                        <div class="pt-3 float-end">
                                            <button type="submit" class="btn btn-primary me-1">
                                                <i class="bi bi-pencil-square"></i>
                                                <span class="text">Create</span>
                                            </button>

                                            <button type="button" onclick="window.history.back();" class="btn btn-danger">
                                                <i class='bi bi-backspace'></i>
                                                <span class="text">Cancel</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
@endsection

@section('script')
    <script>
        $('.summernote').summernote({
            lang: 'id-ID',
            tabsize: 2,
            minHeight: null,
            maxHeight: null,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture']],
                ['view', ['fullscreen', 'codeview']]
            ]
        });
    </script>

    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function() {
            fetch('/dashboard/posts/checkSlug?title=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });

        function previewImage() {
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
