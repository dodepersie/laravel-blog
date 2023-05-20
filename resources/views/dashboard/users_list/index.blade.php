@extends('dashboard.layouts.main')

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
                        <form action="/dashboard/users_list" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3 form-floating">
                                    <input class="form-control" type="text" name="username" id="username"
                                        value="{{ old('username') }}" placeholder="Username" required>
                                    <label for="username">Username</label>
                                </div>

                                <div class="mb-3 form-floating">
                                    <input class="form-control" type="text" name="name" id="name"
                                        value="{{ old('name') }}" placeholder="Name" required>
                                    <label for="name">Name</label>
                                </div>

                                <div class="mb-3 form-floating">
                                    <input class="form-control" type="email" name="email" id="email"
                                        value="{{ old('email') }}" placeholder="Email" required>
                                    <label for="email">Email</label>
                                </div>

                                <div class="mb-3 form-floating">
                                    <input class="form-control" type="password" name="password" id="password"
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
                            <table class="table table-hover table-borderless datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">UID</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->username }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->role }}</td>
                                            @if (auth()->user()->id === $user->id)
                                                <td>
                                                    <p class="text-danger">-</p>
                                                </td>
                                            @else
                                                <td>
                                                    <button class="btn btn-success mr-1 mb-2 lg:mb-0" type="button"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#editUserModal{{ $user->id }}"><i
                                                            class="bi bi-pencil-square"></i></button>
                                                    <form action="/dashboard/users_list/{{ $user->id }}" method="POST"
                                                        class="d-inline">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="btn btn-danger border-0 mb-2 lg:mb-0"
                                                            type="button" data-bs-toggle="modal"
                                                            data-bs-target="#deleteUserModal{{ $user->id }}">
                                                            <i class="bi bi-trash"></i>
                                                        </button>

                                                        <!-- Delete Confirmation Modal -->
                                                        <div class="modal fade" id="deleteUserModal{{ $user->id }}"
                                                            data-bs-backdrop="static" data-bs-keyboard="false"
                                                            tabindex="-1">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Delete User:
                                                                            {{ $user->name }}</h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p>Are you sure want to delete User:
                                                                            {{ $user->name }} with ID:
                                                                            {{ $user->id }} ?</p>
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
                                            @endif
                                        </tr>
                                        <div class="modal fade" id="editUserModal{{ $user->id }}"
                                            data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit User: {{ $user->name }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <!-- Edit Form -->
                                                    <form action="/dashboard/users_list/{{ $user->id }}"
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
                                                                    value="{{ old('username', $user->username) }}"
                                                                    required>
                                                                <label for="username">Username</label>
                                                            </div>

                                                            <div class="mb-3 form-floating">
                                                                <input class="form-control" type="text" name="name"
                                                                    id="name" placeholder="Name"
                                                                    value="{{ old('name', $user->name) }}" required>
                                                                <label for="name">Name</label>
                                                            </div>

                                                            <div class="mb-3 form-floating">
                                                                <input class="form-control" type="email" name="email"
                                                                    id="email" placeholder="Email"
                                                                    value="{{ old('email', $user->email) }}" required>
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
                            </table>
                            <!-- End Table rows -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
