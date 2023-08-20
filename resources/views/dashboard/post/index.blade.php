@extends('dashboard.layouts.main')

@push('swal_delete')
<script type="text/javascript">
    $(function() {
        $(document).on('click', '#delete_post', function(e) {
            e.preventDefault();
            e.stopPropagation();
            var button = $(this);
            Swal.fire({
                title: 'Are you sure?',
                text: "You will delete this selected post. You can't revert this action!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Deleted!',
                        'Selected post has been deleted!',
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
    <main id="main" class="main pt-1">
        <div
            class="d-flex justify-content-between align-items-start align-items-sm-center flex-column flex-sm-row mb-3 mb-sm-0">
            <div class="pagetitle mt-4">
                <h1>{{ auth()->user()->name }}'s Posts</h1>
                {{ Breadcrumbs::view('breadcrumbs::bootstrap5', 'dashboard.posts') }}
            </div><!-- End Page Title -->

            <a href="{{ route('posts.create') }}" class="btn btn-primary">
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
                            <table class="table table-hover table-striped datatable" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $post)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $post->title }}</td>
                                            <td>{{ $post->category->name }}</td>
                                            <td>
                                                <a href="{{ route('posts.show', $post->slug) }}"
                                                    class="btn btn-primary mr-1 mb-2 lg:mb-0"><i class="bi bi-eye"></i></a>
                                                <a href="{{ route('posts.edit', $post->slug) }}"
                                                    class="btn btn-success mr-1 mb-2 lg:mb-0"><i
                                                        class="bi bi-pencil-square"></i></a>
                                                <form action="{{ route('posts.destroy', $post->slug) }}" method="POST"
                                                    class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-danger border-0 mb-2 lg:mb-0"
                                                    type="button" id="delete_post">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                            <!-- End Table rows -->
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection

@push('script')
<script>
    $(document).ready(function() {
        $('.datatable').DataTable({
            scrollX: true,
            scrollCollapse: true,
            fixedColumns: {
                leftColumns: 2
            },
            responsive: true,
        });
    });
</script>
@endpush