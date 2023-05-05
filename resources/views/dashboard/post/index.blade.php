@extends('dashboard.layouts.main')

@section('container')

@if(session()->has('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif

<div class="card shadow mb-4">
    <!-- Card Header -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">{{ auth()->user()->name }}'s Post</h6>

        <a href="/dashboard/posts/create" class="btn btn-primary btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-edit"></i>
            </span>
            <span class="text">Create new post</span>
        </a>
    </div>

    <div class="card-body">
        <div class="table-responsive col-lg-12">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->category->name }}</td>
                        <td>
                            <a href="/dashboard/posts/{{ $post->slug }}" class="btn btn-primary mr-1"><i class="fas fa-eye"></i></a>
                            <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-success mr-1"><i class="fas fa-edit"></i></a>
                            <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger border-0" onClick="return confirm('Are you sure want to delete {{ $post->title }} ?')">
                                <i class="fas fa-trash"></i>
                            </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection