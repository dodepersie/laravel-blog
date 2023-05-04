@extends('dashboard.layouts.main')

@section('container')

<div class="row">
    <!-- Total Posts Card -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Posts</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $posts->count() ? $posts->count() : '-' }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-file fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Last Post Title Card -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Last Post Title</div>
                            @if (!empty($posts) && isset($posts[0]))
                            <div class="h5 mb-0 font-weight-bold text-gray-800 text-truncate" style="width: 260px;">{{ $posts[0]->title ? $posts[0]->title : '-' }}</div>
                            @else
                            <div class="h5 mb-0 font-weight-bold text-gray-800">-</div>
                            @endif
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-file-text fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Account Email Status Card -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Account Email Status
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold">
                                    @if($user->email_verified_at)
                                    <p class="text-success">Verified</p>
                                    @else
                                    <p class="text-danger">Not Verified</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        @if($user->email_verified_at)
                        <i class="fas fa-check fa-2x text-gray-300"></i>
                        @else
                        <i class="fas fa-times fa-2x text-gray-300"></i>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    {{-- <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Pending Requests</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</div>

<div class="row">
    <div class="col-lg 12">
        <div class="card shadow mb-3">
            <div class="card-header py-3">
                <div class="d-sm-flex align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary"><i class='fas fa-theater-masks mr-2'></i>Dashboard</h6>
                    <div>
                        <span>{{ now()->format('d.m.Y') }}</span> - <span id="current-time"></span>
                    </div>
                </div>
            </div>
            <div class="card-body">
            </div>
        </div>
    </div>
</div>
@endsection

@section('clockscript')
<script>
    function updateTime() {
        var currentTime = new Date();
        var hours = currentTime.getHours();
        var minutes = currentTime.getMinutes();
        var seconds = currentTime.getSeconds();

        // Tambahkan nol pada digit yang kurang dari 10
        if (hours < 10) {
            hours = "0" + hours;
        }
        if (minutes < 10) {
            minutes = "0" + minutes;
        }
        if (seconds < 10) {
            seconds = "0" + seconds;
        }

        // Tampilkan waktu pada elemen dengan ID "current-time"
        document.getElementById("current-time").innerHTML = hours + ":" + minutes + ":" + seconds;
    }

    setInterval(updateTime, 1000); // Perbarui setiap detik
    </script>
@endsection