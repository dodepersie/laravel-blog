@extends('dashboard.layouts.main')

@section('container')
    <main id="main" class="main pt-1">
        <div
            class="d-flex justify-content-between align-items-start align-items-sm-center flex-column flex-sm-row mb-3 mb-sm-0">
            <div class="pagetitle mt-4">
                <h1>{{ auth()->user()->name }}'s Posts</h1>
                {{ Breadcrumbs::view('breadcrumbs::bootstrap5', 'dashboard.posts') }}
            </div><!-- End Page Title -->

            <a href="/dashboard/posts/create" class="btn btn-primary">
                <span class="icon text-white-50">
                    <i class="fas fa-edit"></i>
                </span>
                <i class="bi bi-plus-square me-2"></i><span class="text">Create new post</span>
            </a>
        </div>

        <section class="section">
            @if (session()->has('success'))
                <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle me-1"></i>
                    {{ session('success') }}
                </div>
            @endif
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body pt-4">
                            <!-- Table rows -->
                            <table class="table table-hover table-borderless datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $post)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $post->title }}</td>
                                            <td>{{ $post->category->name }}</td>
                                            <td>
                                                <a href="/dashboard/posts/{{ $post->slug }}"
                                                    class="btn btn-primary mr-1 mb-2 lg:mb-0"><i class="bi bi-eye"></i></a>
                                                <a href="/dashboard/posts/{{ $post->slug }}/edit"
                                                    class="btn btn-success mr-1 mb-2 lg:mb-0"><i
                                                        class="bi bi-pencil-square"></i></a>
                                                <form action="/dashboard/posts/{{ $post->slug }}" method="POST"
                                                    class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-danger border-0 mb-2 lg:mb-0"
                                                    type="button" data-bs-toggle="modal"
                                                    data-bs-target="#deleteUserModal{{ $post->id }}">
                                                        <i class="bi bi-trash"></i>
                                                    </button>

                                                    <!-- Delete Confirmation Modal -->
                                                    <div class="modal fade" id="deleteUserModal{{ $post->id }}"
                                                        data-bs-backdrop="static" data-bs-keyboard="false"
                                                        tabindex="-1">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Delete Post:
                                                                        {{ $post->title }}</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Are you sure want to delete Post:
                                                                        {{ $post->title }} with ID:
                                                                        {{ $post->id }} ?</p>
                                                                </div>
                                                                <div class="modal-footer border-0">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-danger"><i
                                                                            class="bi bi-person-x me-2 "></i>
                                                                        Delete</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!-- End Delete Confirmation Modal-->
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- End Table rows -->
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
