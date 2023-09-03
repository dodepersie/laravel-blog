@extends('dashboard.layouts.main')

@push('swal_delete')
    @if (auth()->user()->avatar)
        <script type="text/javascript">
            $(function() {
                $(document).on('click', '#remove_avatar', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    var button = $(this);
                    Swal.fire({
                        title: 'Kamu yakin?',
                        text: "Kamu akan menghapus foto profil",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        cancelButtonText: 'Tidak',
                        confirmButtonText: 'Ya',
                        showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutUp'
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Swal.fire(
                                'Terhapus!',
                                'Foto profil berhasil dihapus!',
                                'success'
                            ).then(() => {
                                button.closest('form')
                                    .submit();
                            });
                        } else if (result.dismiss === Swal.DismissReason.cancel) {
                            Swal.fire(
                                'Dibatalkan',
                                'Foto profil tidak jadi dihapus :)',
                                'error'
                            )
                        }
                    });
                });
            });
        </script>
    @endif
@endpush

@section('container')

    <main id="main" class="main pt-4">
        <div class="pagetitle">
            <h1>Profil: {{ auth()->user()->name }}</h1>
            {{ Breadcrumbs::view('breadcrumbs::bootstrap5', 'dashboard.profile') }}
        </div><!-- End Page Title -->

        @if (session()->has('success'))
            <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-1"></i>
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
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
                            <div class="mb-2">
                                <img src="{{ auth()->user()->avatar ? asset('user_images/' . auth()->user()->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) . '&size=128' }}"
                                    class="rounded-circle w-10 h-10" />
                            </div>
                            <h2 class="card-title p-0">{{ auth()->user()->name }} <span>| Role:
                                    {{ auth()->user()->role }}</span></h2>
                            <form method="POST" action="{{ route('profile.upload_avatar') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <div class="small font-italic text-muted mb-2">Format JPG atau PNG, ukuran tidak lebih dari 1.5 MB</div>
                                    <div class="input-group">
                                        <input class="form-control" type="file" id="avatar" name="avatar"
                                            onChange="previewImage()">
                                        <button type="submit" class="btn btn-primary btn-icon-split">
                                            <span class="icon">
                                                <i class="bi bi-cloud-arrow-up-fill" aria-hidden="true"></i>
                                            </span>
                                            <span class="text">Upload</span>
                                        </button>
                                    </div>
                                    <input type="hidden" value="{{ auth()->user()->id }}" name="id" />
                                    @error('avatar')
                                        <div class="invalid-feedback mt-3">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </form>

                            @if (auth()->user()->avatar)
                                <form action="{{ route('profile.remove_avatar', auth()->user()->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-icon-split" id="remove_avatar">
                                        <span class="icon">
                                            <i class="bi bi-trash3-fill" aria-hidden="true"></i>
                                        </span>
                                        <span class="text">Hapus foto profil</span>
                                    </button>
                                    <input type="hidden" value="{{ auth()->user()->id }}" name="id" />
                                </form>
                            @endif
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
                                        data-bs-target="#profile-change-password">Ganti Password</button>
                                </li>

                            </ul>
                            <div class="tab-content pt-2">

                                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                    <h5 class="card-title">Deskripsi</h5>
                                    <p class="small fst-italic">{{ auth()->user()->description }}</p>

                                    <h5 class="card-title">Detail</h5>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Username</div>
                                        <div class="col-lg-9 col-md-8">
                                            {{ auth()->user()->username }}
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">Nama</div>
                                        <div class="col-lg-9 col-md-8">{{ auth()->user()->name }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Email</div>
                                        <div class="col-lg-9 col-md-8">{{ auth()->user()->email }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Tanggal Pembuatan</div>
                                        <div class="col-lg-9 col-md-8">
                                            {{ auth()->user()->created_at .' [' .auth()->user()->created_at->diffForHumans() .']' }}
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                    <!-- Profile Edit Form -->
                                    <form method="POST" action="{{ route('profile.update', auth()->user()->id) }}">
                                        @method('put')
                                        @csrf
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Username</label>
                                            <input class="form-control" type="text" name="username" id="username"
                                                value="{{ old('username', $user->username) }}" autocomplete="off">
                                        </div>

                                        <div class="mb-3">
                                            <label for="name" class="form-label">Nama</label>
                                            <input class="form-control" type="text" name="name" id="name"
                                                value="{{ old('name', $user->name) }}" autocomplete="off">
                                        </div>

                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input class="form-control" type="email" name="email" id="email"
                                                value="{{ old('email', $user->email) }}" autocomplete="off">
                                        </div>

                                        <div class="mb-3">
                                            <label for="description" class="form-label">Deskripsi</label>
                                            <input class="form-control" type="text" name="description"
                                                id="description" value="{{ old('description', $user->description) }}"
                                                autocomplete="off">
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-user-edit"></i>
                                            </span>
                                            <span class="text">Edit!</span>
                                        </button>
                                    </form><!-- End Profile Edit Form -->

                                </div>

                                <div class="tab-pane fade pt-3" id="profile-change-password">
                                    <!-- Change Password Form -->
                                    <form method="POST" action="{{ route('profile.change_password') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="currentpwd" class="form-label">Password saat ini</label>
                                            <input type="password" class="form-control" id="currentpwd"
                                                name="currentpwd" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="password" class="form-label">Password baru</label>
                                            <input type="password" class="form-control" id="password" name="password"
                                                required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="password_confirmation" class="form-label">Konfirmasi password baru</label>
                                            <input type="password" class="form-control" id="password_confirmation"
                                                name="password_confirmation" required>
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fa fa-key"></i>
                                            </span>
                                            <span class="text">Ganti!</span>
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
