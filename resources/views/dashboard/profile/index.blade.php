@extends('dashboard.layouts.main')

@section('container')
<!-- Dropdown Card Example -->
<div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">{{ auth()->user()->name }}'s Profile</h6>
        <a href="/dashboard/profile/{{ auth()->user()->username }}/edit" class="btn btn-primary btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-edit"></i>
            </span>
            <span class="text">Edit profile</span>
        </a>
    </div>

    <!-- Card -->
    <div class="row align-items-center">
        <div class="col-md-9">
            <div class="card border-0">
                <div class="card-body">
                    <div class="user-data">
                        <div class="user-data-item">
                            <label>User ID:</label>{{ auth()->user()->id }}
                        </div>
                        <div class="user-data-item">
                            <label>Name:</label>{{ auth()->user()->name }}
                        </div>
                        <div class="user-data-item">
                            <label>Username:</label>{{ auth()->user()->username }}
                        </div>
                        <div class="user-data-item">
                            <label>Email:</label>{{ auth()->user()->email }}
                        </div>
                        <div class="user-data-item">
                            <label>Description:</label>{{ auth()->user()->description }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0">
                <div class="card-body">
                    <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                        @if(auth()->user()->avatar)
                        <img src="/storage/user-images/{{ auth()->user()->avatar }}" class="img-fluid shadow-1-strong rounded" alt="{{ auth()->user()->name }}" />
                        @else
                        <img src="/img/noprofile.jpg" class="img-fluid shadow-1-strong rounded" alt="{{ auth()->user()->name }}">
                        @endif
                        <a href="/">
                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
      
</div>
@endsection