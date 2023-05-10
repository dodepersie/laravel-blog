@extends('dashboard.layouts.main')

@section('container')
    <main id="main" class="main pt-1">
        <div
            class="d-flex justify-content-between align-items-start align-items-sm-center flex-column flex-sm-row mb-3 mb-sm-0">
            <div class="pagetitle mt-4">
                <h1>All Categories</h1>
                {{ Breadcrumbs::view('breadcrumbs::bootstrap5', 'dashboard.categories') }}
            </div><!-- End Page Title -->

            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createCategoryModal">
                <i class="bi bi-plus-square me-2"></i><span class="text">Create new category</span>
            </button>

            <!-- Create category modal -->
            <div class="modal fade" id="createCategoryModal" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Create new category</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <!-- Create category Form -->
                        <form action="/dashboard/categories" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3 form-floating">
                                    <input type="text" class="name form-control @error('name') is-invalid @enderror"
                                        placeholder="Category name" name="name" required autofocus>
                                    <label for="name">Category name</label>
                                </div>

                                <div class="mb-3 form-floating">
                                    <input type="text" class="slug form-control @error('slug') is-invalid @enderror"
                                        placeholder="Category slug" name="slug" required readonly>
                                    <label for="slug">Category slug</label>
                                </div>
                            </div>

                            <div class="modal-footer border-0">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary"><i class="bi bi-plus me-2 "></i>
                                    Create</button>
                            </div>
                        </form><!-- End Create category Form -->
                    </div>
                </div>
            </div><!-- End Create category Modal-->
        </div>
        <section class="section">
            @if (session()->has('success'))
                <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle me-1"></i>
                    {{ session('success') }}
                </div>
            @endif

            @if (session()->has('info'))
                <div class="alert alert-info bg-info text-light border-0 alert-dismissible fade show" role="alert">
                    <i class="bi bi-info-circle me-1"></i>
                    {{ session('info') }}
                </div>
            @endif

            <div class="card shadow mb-4">
                <div class="card-body pt-4">
                    <div class="table-responsive col-lg-12">
                        <table class="table table-hover table-borderless datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category ID</th>
                                    <th>Category Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            <button class="btn btn-success mr-1 mb-2 lg:mb-0" type="button"
                                                data-bs-toggle="modal"
                                                data-bs-target="#editCategoryModal{{ $category->id }}"><i
                                                    class="bi bi-pencil-square"></i></button>
                                            <form action="/dashboard/categories/{{ $category->id }}" method="POST"
                                                class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-danger border-0 mb-2 lg:mb-0" type="button"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#deleteCategoryModal{{ $category->id }}">
                                                    <i class="bi bi-trash"></i>
                                                </button>

                                                <!-- Delete Confirmation Modal -->
                                                <div class="modal fade" id="deleteCategoryModal{{ $category->id }}"
                                                    data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Delete Category:
                                                                    {{ $category->name }}</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Are you sure want to delete Category:
                                                                    {{ $category->name }} ?</p>
                                                            </div>
                                                            <div class="modal-footer border-0">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-danger"><i
                                                                        class="bi bi-person-x me-2 "></i> Delete</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- End Delete Confirmation Modal-->
                                            </form>
                                        </td>
                                    </tr>

                                    <!-- Edit category modal -->
                                    <div class="modal fade" id="editCategoryModal{{ $category->id }}"
                                        data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Category: {{ $category->name }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <!-- Update Form -->
                                                <form action="/dashboard/categories/{{ $category->id }}" method="post">
                                                    @method('put')
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="mb-3 form-floating">
                                                            <input type="text"
                                                                class="name form-control @error('name') is-invalid @enderror"
                                                                placeholder="Category name"
                                                                value="{{ old('name', $category->name) }}" name="name"
                                                                required autofocus>
                                                            <label for="name">Category name</label>
                                                        </div>

                                                        <div class="mb-3 form-floating">
                                                            <input type="text"
                                                                class="slug form-control @error('slug') is-invalid @enderror"
                                                                placeholder="Category slug"
                                                                value="{{ old('slug', $category->slug) }}" name="slug"
                                                                required>
                                                            <label for="slug">Category slug</label>
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer border-0">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary"><i
                                                                class="bi bi-pencil-square me-2 "></i> Edit</button>
                                                    </div>

                                                </form><!-- End Update Form -->
                                            </div>
                                        </div>
                                    </div><!-- End edit category modal-->
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@section('script')
    <script>
        const name = document.querySelector('.name');
        const slug = document.querySelector('.slug');

        name.addEventListener('change', function() {
            fetch('/dashboard/posts/checkSlug?title=' + name.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });
    </script>
@endsection
