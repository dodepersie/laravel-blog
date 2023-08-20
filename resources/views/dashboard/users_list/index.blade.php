@extends('dashboard.layouts.main')

@push('swal_delete')
    <script type="text/javascript">
        $(function() {
            $(document).on('click', '#delete_user', function(e) {
                e.preventDefault();
                e.stopPropagation();
                var button = $(this);
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You will delete this selected user. You can't revert this action!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            'Deleted!',
                            'Selected user has been deleted!',
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
                <h1>All Users</h1>
                {{ Breadcrumbs::view('breadcrumbs::bootstrap5', 'dashboard.users_list') }}
            </div><!-- End Page Title -->

            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#registerNewUserModal">
                <i class="bi bi-person-plus me-2"></i>Register new user
            </button>

            <div class="modal fade" id="registerNewUserModal" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Register new user</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <!-- Register Form -->
                        <form action="{{ route('users_list.store') }}" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3 form-floating">
                                    <input class="form-control @error('username') is-invalid @enderror" type="text" name="username" id="username"
                                        value="{{ old('username') }}" placeholder="Username" required>
                                    <label for="username">Username</label>
                                </div>

                                <div class="mb-3 form-floating">
                                    <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name"
                                        value="{{ old('name') }}" placeholder="Name" required>
                                    <label for="name">Name</label>
                                </div>

                                <div class="mb-3 form-floating">
                                    <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" id="email"
                                        value="{{ old('email') }}" placeholder="Email" required>
                                    <label for="email">Email</label>
                                </div>

                                <div class="mb-3 form-floating">
                                    <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" id="password"
                                        placeholder="Password" required>
                                    <label for="password">Password</label>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="role" id="role">
                                            <label class="form-check-label" for="role">
                                                Give administrator privilege?
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer border-0">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary"><i class="bi bi-person-plus me-2 "></i>
                                    Register</button>
                            </div>
                        </form><!-- End Register Form -->
                    </div>
                </div>
            </div><!-- End Register new user Modal-->
        </div>

        <section class="section">
            @if (session()->has('success'))
                <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle me-1"></i>
                    {{ session('success') }}
                </div>
            @endif

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

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body pt-4">

                            <!-- Table rows -->
                            <table class="table table-hover table-striped datatable" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>UID</th>
                                        <th>Username</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users->where('id', '!=', auth()->user()->id) as $user)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->username }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->role }}</td>
                                            <td>
                                                <button class="btn btn-success mr-1 mb-2 lg:mb-0" type="button"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#edit_user_{{ $user->id }}"><i
                                                        class="bi bi-pencil-square"></i></button>
                                                <form action="{{ route('users_list.destroy', $user->id) }}" method="POST"
                                                    class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-danger border-0 mb-2 lg:mb-0" type="button"
                                                        id="delete_user">
                                                        <i class="bi bi-trash"></i>
                                                    </button>

                                                </form>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="edit_user_{{ $user->id }}"
                                            data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit User: {{ $user->name }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <!-- Edit Form -->
                                                    <form action="{{ route('users_list.update', $user->id) }}"
                                                        method="post">
                                                        @method('put')
                                                        @csrf
                                                        <div class="modal-body">

                                                            <!-- Hidden -->
                                                            <input type="hidden" name="id" id="id"
                                                                value="{{ $user->id }}">

                                                            <div class="mb-3 form-floating">
                                                                <input class="form-control" type="text"
                                                                    name="username" id="username" placeholder="Username"
                                                                    value="{{ $user->username }}"
                                                                    required>
                                                                <label for="username">Username</label>
                                                            </div>

                                                            <div class="mb-3 form-floating">
                                                                <input class="form-control" type="text" name="name"
                                                                    id="name" placeholder="Name"
                                                                    value="{{ $user->name }}" required>
                                                                <label for="name">Name</label>
                                                            </div>

                                                            <div class="mb-3 form-floating">
                                                                <input class="form-control" type="email" name="email"
                                                                    id="email" placeholder="Email"
                                                                    value="{{ $user->email }}" required>
                                                                <label for="email">Email</label>
                                                            </div>

                                                            <div class="row mb-3">
                                                                <div class="col-sm-10">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            name="role" id="role"
                                                                            {{ $user->role == 'Admin' ? 'checked="checked"' : '' }}>
                                                                        <label class="form-check-label" for="role">
                                                                            Give administrator privilege?
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer border-0">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary"><i
                                                                    class="bi bi-person-plus me-2 "></i> Edit</button>
                                                        </div>
                                                    </form><!-- End Edit Form -->
                                                </div>
                                            </div>
                                        </div><!-- End Edit User Modal-->
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>UID</th>
                                        <th>Username</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
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
    </main>
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
