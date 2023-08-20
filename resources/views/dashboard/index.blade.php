@extends('dashboard.layouts.main')

@push('swal_delete')
    <script type="text/javascript">
        $(function() {
            $(document).on('click', '#delete_news', function(e) {
                e.preventDefault();
                e.stopPropagation();
                var button = $(this);
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You will delete this selected news. You can't revert this action!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            'Deleted!',
                            'Selected news has been deleted!',
                            'success'
                        ).then(() => {
                            button.closest('form')
                                .submit();
                        });
                    }
                });
            });
        });
    </script>
@endpush

@section('container')
    <main id="main" class="main pt-4">
        <div class="pagetitle">
            <h1>Dashboard</h1>
            {{ Breadcrumbs::view('breadcrumbs::bootstrap5', 'dashboard.home') }}
        </div><!-- End Page Title -->

        <section class="section dashboard">
            @if (session()->has('success'))
                <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle me-1"></i>
                    {{ session('success') }}
                </div>
            @endif
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-8">
                    <div class="row">

                        <!-- Total Posts Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <h5 class="card-title">Total Posts</h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-file-post"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ count($posts) }}</h6>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Total Posts Card -->

                        <!-- Latest Post Title Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card revenue-card">
                                <div class="card-body">
                                    <h5 class="card-title">Latest Post</h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-sticky"></i>
                                        </div>
                                        <div class="ps-3">
                                            @if (!empty($posts) && isset($posts[0]))
                                                <a href="{{ route('posts.show', $posts[0]->slug) }}">
                                                    <h6 class="d-inline-block text-truncate" style="max-width: 150px;">
                                                        {{ $posts[0]->title }}</h6>
                                                </a>
                                            @else
                                                <h6>-</h6>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Latest Post Title Card -->

                        <!-- is Admin Card -->
                        <div class="col-xxl-4 col-xl-12">

                            <div class="card info-card customers-card">

                                <div class="card-body">
                                    <h5 class="card-title">Role</h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-person-check-fill"></i>
                                        </div>
                                        <div class="ps-3">
                                            @can('god')
                                                <h6 class="flick text-white">God</h6>
                                            @elsecan('admin')
                                                <h6>Admin</h6>
                                            @else
                                                <h6>User</h6>
                                            @endcan
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div><!-- End is Admin Card -->

                        @cannot('user')
                            <!-- Your Posts -->
                            <div class="col-12">
                                <div class="card overflow-auto">
                                    <div class="card-body">
                                        <h5 class="card-title">Your Last 5 Posts</span></h5>
                                        <table class="table table-striped table-hover w-full" style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Title</th>
                                                    <th scope="col">Excerpt</th>
                                                    <th scope="col">Created</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($posts->take(5) as $post)
                                                    <tr>
                                                        <th scope="row">
                                                            {{ $loop->iteration }}
                                                        </th>
                                                        <td><a href="{{ route('posts.show', $post->slug) }}"
                                                                class="text-primary fw-bold">{{ $post->title }}</a></td>
                                                        <td><span class="d-inline-block text-truncate" style="max-width: 150px;"
                                                                title="{!! $post->excerpt !!}">{!! $post->excerpt !!}</span>
                                                        </td>
                                                        <td class="fw-bold">{{ $post->created_at->diffForHumans() }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div><!-- End Your Last 5 Posts -->
                        @endcannot

                    </div>
                </div><!-- End Left side columns -->

                <!-- Right side columns -->
                <div class="col-lg-4">
                    <!-- News & Updates Traffic -->
                    <div class="card">
                        <div
                            class="d-flex justify-content-between align-items-start align-items-sm-center flex-column flex-sm-row mb-3 mb-sm-0 p-3 pt-0 pb-0">
                            <div>
                                <h5 class="card-title">News &amp; Updates</h5>
                            </div>

                            @can('god')
                                <div>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#createNewsModal">
                                        <i class="bi bi-journal-plus me-2"></i>Add
                                    </button>

                                    <div class="modal fade" id="createNewsModal" data-bs-backdrop="static"
                                        data-bs-keyboard="false" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Add news</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <!-- Add News Form -->
                                                <form action="{{ route('news.store') }}" method="post">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="mb-3 form-floating">
                                                            <input class="form-control" type="text" name="title"
                                                                id="title" placeholder="News Title" required>
                                                            <label for="title">News Title</label>
                                                        </div>

                                                        <div class="mb-3 form-floating">
                                                            <textarea class="form-control" type="text" name="description" id="description" placeholder="News Description"
                                                                style="height: 10rem;" required></textarea>
                                                            <label for="description">News Description</label>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer border-0">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary"><i
                                                                class="bi bi-journal-plus me-2 "></i>
                                                            Add</button>
                                                    </div>
                                                </form><!-- End Add News Form -->
                                            </div>
                                        </div>
                                    </div><!-- End Add News Modal-->
                                </div>
                            @endcan
                        </div>

                        <div class="card-body">
                            @forelse ($news->take(5) as $n)
                                <div
                                    class="d-flex justify-content-between align-items-start align-items-sm-center flex-column flex-sm-row p-0">

                                    <h4 class="card-title m-0 p-0 mb-2">{{ $n->title }}</h4>

                                    @can('god')
                                        <div>
                                            <button type="button" class="btn btn-success mb-2 me-1 lg:mb-0"
                                                data-bs-toggle="modal" data-bs-target="#edit_news_{{ $n->id }}">
                                                <i class="bi bi-pencil-square"></i>
                                            </button>

                                            <form action="{{ route('news.destroy', $n->id) }}" method="POST"
                                                class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-danger mb-2 lg:mb-0" type="submit" id="delete_news">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>

                                            <!-- Edit news modal -->
                                            <div class="modal fade" id="edit_news_{{ $n->id }}"
                                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit news: {{ $n->title }}</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <!-- Edit News Form -->
                                                        <form action="{{ route('news.update', $n->id) }}" method="post">
                                                            @method('put')
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="mb-3 form-floating">
                                                                    <input class="form-control" type="text" name="title"
                                                                        id="title" placeholder="News Title"
                                                                        value="{{ $n->title }}" required>
                                                                    <label for="title">News Title</label>
                                                                </div>

                                                                <div class="mb-3 form-floating">
                                                                    <textarea class="form-control" type="text" name="description" id="description" placeholder="News Description"
                                                                        style="height: 10rem;" required>{{ $n->description }}</textarea>
                                                                    <label for="description">News Description</label>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer border-0">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary"><i
                                                                        class="bi bi-journal-plus me-2 "></i>
                                                                    Add</button>
                                                            </div>
                                                        </form><!-- End Edit News Form -->
                                                    </div>
                                                </div>
                                            </div><!-- End Edit News Modal-->
                                        </div>
                                    @endcan
                                </div>

                                <p class="card-text">{!! $n->description !!}</p>
                            @empty
                                <p class="card-text">No data available.</p>
                            @endforelse
                        </div>

                    </div><!-- End News & Updates -->
                </div><!-- End Right side columns -->
            </div>
        </section>
    </main>
@endsection
