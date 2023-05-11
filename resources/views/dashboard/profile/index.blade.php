@extends('dashboard.layouts.main')

@section('container')

    <main id="main" class="main pt-4">
        <div class="pagetitle">
            <h1>My profile</h1>
            {{ Breadcrumbs::view('breadcrumbs::bootstrap5', 'dashboard.profile') }}
        </div><!-- End Page Title -->

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

        <section class="section profile">
            <div class="row">
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center text-center">
                            @if (auth()->user()->avatar)
                                <img src="{{ asset('storage/user-images/' . auth()->user()->avatar) }}"
                                    alt="{{ auth()->user()->name }}" class="img-preview rounded-circle">
                            @else
                                <img src="/img/noprofile.jpg" class="img-preview rounded-circle mb-2">
                            @endif
                            <h2 class="card-title p-0 mb-5">{{ auth()->user()->name }} <span>| Role: {{ auth()->user()->role }}</span></h2>
                            <form method="POST" action="/dashboard/profile/upload" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <div class="small font-italic text-muted mb-2">JPG or PNG no larger than 1.5 MB and max
                                        800x800 size</div>
                                    <div class="input-group">
                                        <input class="form-control" type="file" id="avatar" name="avatar"
                                            onChange="previewImage()">
                                        <button type="submit" class="btn btn-primary btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fa fa-upload" aria-hidden="true"></i>
                                            </span>
                                            <span class="text">Upload</span>
                                        </button>
                                    </div>
                                    @error('avatar')
                                        <div class="invalid-feedback mt-3">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-xl-8">

                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">

                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab"
                                        data-bs-target="#profile-overview">Info</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#profile-edit">Edit</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#profile-change-password">Change Password</button>
                                </li>

                            </ul>
                            <div class="tab-content pt-2">

                                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                    <h5 class="card-title">Description</h5>
                                    <p class="small fst-italic">{{ auth()->user()->description }}</p>

                                    <h5 class="card-title">Profile Details</h5>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Username</div>
                                        <div class="col-lg-9 col-md-8">
                                            {{ auth()->user()->username }}
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                        <div class="col-lg-9 col-md-8">{{ auth()->user()->name }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Email</div>
                                        <div class="col-lg-9 col-md-8">{{ auth()->user()->email }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Account Creation</div>
                                        <div class="col-lg-9 col-md-8">{{ auth()->user()->created_at . ' [' . auth()->user()->created_at->diffForHumans() .']' }}</div>
                                    </div>
                                </div>

                                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                    <!-- Profile Edit Form -->
                                    <form method="POST" action="/dashboard/profile/{{ auth()->user()->username }}">
                                        @method('put')
                                        @csrf
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Username</label>
                                            <input class="form-control" type="text" name="username" id="username"
                                                value="{{ old('username', $user->username) }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input class="form-control" type="text" name="name" id="name"
                                                value="{{ old('name', $user->name) }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input class="form-control" type="email" name="email" id="email"
                                                value="{{ old('email', $user->email) }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="description" class="form-label">Description</label>
                                            <input class="form-control" type="text" name="description"
                                                id="description" value="{{ old('description', $user->description) }}">
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-user-edit"></i>
                                            </span>
                                            <span class="text">Update</span>
                                        </button>
                                    </form><!-- End Profile Edit Form -->

                                </div>

                                <div class="tab-pane fade pt-3" id="profile-change-password">
                                    <!-- Change Password Form -->
                                    <form method="POST" action="/dashboard/profile/changepwd">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="currentpwd" class="form-label">Current Password</label>
                                            <input type="password" class="form-control" id="currentpwd"
                                                name="currentpwd" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="password" class="form-label">New Password</label>
                                            <input type="password" class="form-control" id="password" name="password"
                                                required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="password_confirmation" class="form-label">Confirm New
                                                Password</label>
                                            <input type="password" class="form-control" id="password_confirmation"
                                                name="password_confirmation" required>
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fa fa-key"></i>
                                            </span>
                                            <span class="text">Change</span>
                                        </button>
                                    </form><!-- End Change Password Form -->

                                </div>

                            </div><!-- End Bordered Tabs -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection

@section('script')
    <script>
        function previewImage() {
            const image = document.querySelector('#avatar');
            const imgPreview = document.querySelector('.img-preview');

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
