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
        <h6 class="m-0 font-weight-bold text-primary">Post Categories</h6>

        <a href="/dashboard/categories/create" class="btn btn-primary btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-edit"></i>
            </span>
            <span class="text">Create new category</span>
        </a>        
    </div>
    <div class="card-body">
        <div class="table-responsive col-lg-12">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Category ID</th>
                        <th>Category Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Category ID</th>
                        <th>Category Name</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <a href="/dashboard/categories/{{ $category->id }}/edit" class="btn btn-success mr-1"><i class="fas fa-edit"></i></a>
                            <form action="/dashboard/categories/{{ $category->id }}" method="POST" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger border-0" onClick="return confirm('Are you sure want to delete {{ $category->name }} ?')">
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