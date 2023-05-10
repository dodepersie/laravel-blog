@extends('dashboard.layouts.main')

@section('container')
    <main id="main" class="main pt-4">
        <div class="pagetitle">
            <h1>Dashboard</h1>
            {{ Breadcrumbs::view('breadcrumbs::bootstrap5', 'dashboard.home') }}
        </div><!-- End Page Title -->

        <section class="section dashboard">
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

                        <!-- Last Posts Title Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card revenue-card">
                                <div class="card-body">
                                    <h5 class="card-title">Last Posts</h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-sticky"></i>
                                        </div>
                                        <div class="ps-3">
                                            @if (!empty($posts) && isset($posts[0]))
                                                <h6 class="d-inline-block text-truncate" style="max-width: 205px;">
                                                    {{ $posts[0]->title ? $posts[0]->title : '-' }}</h6>
                                            @else
                                                <h6>-</h6>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Last Posts Title Card -->

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
                                <div class="card top-selling overflow-auto">
                                    <div class="card-body pb-0">
                                        <h5 class="card-title">Your Posts</span></h5>
                                        <table class="table table-hover table-borderless">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Title</th>
                                                    <th scope="col">Excerpt</th>
                                                    <th scope="col">Created</th>
                                                </tr>
                                            </thead>
                                            @foreach ($posts->take(5) as $post)
                                                <tbody>
                                                    <tr>
                                                        <th scope="row"><a href="{{ '/dashboard/posts/' . $post->slug }}"
                                                                class="text-primary fw-bold">{{ $post->title }}</a></th>
                                                        <td><span class="d-inline-block text-truncate" style="max-width: 150px;"
                                                                title="{!! $post->excerpt !!}">{!! $post->excerpt !!}</span>
                                                        </td>
                                                        <td class="fw-bold">{{ $post->created_at->diffForHumans() }}</td>
                                                    </tr>
                                                </tbody>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div><!-- End Your Posts -->
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
                                                <form action="/dashboard/news" method="post">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="mb-3 form-floating">
                                                            <input class="form-control" type="text" name="title"
                                                                id="title" placeholder="News Title" required>
                                                            <label for="title">News Title</label>
                                                        </div>

                                                        <div class="mb-3 form-floating">
                                                            <input class="form-control" type="text" name="description"
                                                                id="description" placeholder="News Description" required>
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
                            @foreach ($news->take(5) as $n)
                                <h4 class="card-title m-0">{{ $n->title }}</h4>
                                <p class="card-text">{{ $n->description }}</p>
                            @endforeach
                        </div>
                    </div><!-- End News & Updates -->
                </div><!-- End Right side columns -->
            </div>
        </section>
    </main>
@endsection
