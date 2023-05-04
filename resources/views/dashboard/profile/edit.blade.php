@extends('dashboard.layouts.main')

@section('container')
@if(session()->has('successUploadImg'))
<div class="alert alert-success mt-4 text-left" role="alert">
    {{ session('successUploadImg') }}
</div>
@elseif(session()->has('errorUploadImg'))
<div class="alert alert-danger mt-4 text-left" role="alert">
    {{ session('errorUploadImg') }}
</div>
@endif

@if(session()->has('successUpdateProfile'))
<div class="alert alert-success alert-dismissible fade show mt-4 text-left" role="alert">
    {{ session('successUpdateProfile') }}
</div>
@endif

<!-- Content Row -->
<div class="row">
    <!-- Account Details -->
    <div class="col-xl-8 col-lg-7">
        <!-- Account Details -->
        <div class="card shadow mb-4">
            <!-- Card Header -->
            <div
                class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Account Details</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <form method="POST" action="/dashboard/profile/{{ auth()->user()->username }}">
                    @method('put')
                    @csrf
                    <div class="mb-3">
                        <label for="username" class="form-label @error('username') is-invalid @enderror">Username</label>
                        <input class="form-control" type="text" name="username" id="username" value="{{ Auth::user()->username }}">
                        @error('name')
                        <div class="invalid-feedback mt-3">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                
                    <div class="mb-3">
                        <label for="name" class="form-label @error('name') is-invalid @enderror">Name</label>
                        <input class="form-control" type="text" name="name" id="name" value="{{ Auth::user()->name }}">
                        @error('name')
                        <div class="invalid-feedback mt-3">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                
                    <div class="mb-3">
                        <label for="email" class="form-label @error('name') is-invalid @enderror">Email</label>
                        <input class="form-control" type="email" name="email" id="email" value="{{ Auth::user()->email }}">
                        @error('email')
                        <div class="invalid-feedback mt-3">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                
                    <div class="mb-3">
                        <label for="description" class="form-label @error('description') is-invalid @enderror">Description</label>
                        <input class="form-control" type="text" name="description" id="description" value="{{ Auth::user()->description }}">
                        @error('description')
                        <div class="invalid-feedback mt-3">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                
                    <button type="submit" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-user-edit"></i>
                        </span>
                        <span class="text">Update</span>   
                    </button>
                </form>
            </div>
        </div>

        <!-- Change Password -->
        <div class="card shadow mb-4">
            <!-- Card Header -->
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Change Password</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <form method="POST" action="/dashboard/profile/changepwd">
                    @csrf
                
                    <div class="mb-3">
                        <label for="currentpwd" class="form-label">Current Password</label>
                        <input type="password" class="form-control @error('currentpwd') is-invalid @enderror" id="currentpwd" name="currentpwd" required>
                        @error('currentpwd')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                
                    <div class="mb-3">
                        <label for="password" class="form-label">New Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm New Password</label>
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" required>
                        @error('password_confirmation')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                
                    <button type="submit" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fa fa-key"></i>
                        </span>
                        <span class="text">Change</span>   
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Image Upload -->
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Header -->
            <div
                class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Profile Picture</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body text-center">
                <form method="POST" action="/dashboard/profile/upload" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="image" class="form-label @error('image') is-invalid @enderror"></label>
                        @if(auth()->user()->avatar)
                        <img src="{{ asset('storage/user-images/' . auth()->user()->avatar) }}" class="img-preview rounded-circle mb-2" style="height: 10rem;">
                        @else
                        <img src="/img/noprofile.jpg" class="img-preview rounded-circle mb-2" style="height: 10rem;">
                        @endif
                        <div class="small font-italic text-muted mb-2">JPG or PNG no larger than 1.5 MB and max 800x800 size</div>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image" onChange="previewImage()">
                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                        </div>
                        @error('image')
                        <div class="invalid-feedback mt-3">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fa fa-upload" aria-hidden="true"></i>
                        </span>
                        <span class="text">Upload</span>
                    </button>
                </form>            
            </div>
        </div>
    </div>
</div>

<script>
    function previewImage()
    {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');
    
        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);
    
        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
@endsection