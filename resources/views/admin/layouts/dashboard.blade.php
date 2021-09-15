@extends('admin.layouts.admin-master')
@section('title' , 'Dashboard')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Users Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xl-left font-weight-bold text-primary text-uppercase mb-1">
                                Users</div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800">{{ count($users) }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-3x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Posts Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xl-left font-weight-bold text-success text-uppercase mb-1">
                                Posts</div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800">{{ count($posts) }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-sticky-note fa-3x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Comments Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xl-left font-weight-bold text-warning text-uppercase mb-1">
                                Comments</div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800">{{ count($comments) }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-3x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content Row -->

    <div class="row">

        <!-- Latest User -->
        <div class="col-xl-4 col-lg-6">
            <div class="card shadow mb-4 overflow-auto" style="height: 500px">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Last Users</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        @foreach ($users->take(5) as $user)
                            <li class="list-group-item">{{ $user->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <!-- Latest Posts -->
        <div class="col-xl-4 col-lg-6">
            <div class="card shadow mb-4 overflow-auto" style="height: 500px">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-success">Last Posts</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        @foreach ($posts->take(5) as $post)
                            <li class="list-group-item">{{ $post->title }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <!-- Latest Comments -->
        <div class="col-xl-4 col-lg-6">
            <div class="card shadow mb-4 overflow-auto" style="height: 500px;">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-warning">Last Comments</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        @foreach ($comments->take(5) as $comment)
                            <li class="list-group-item">{{ $comment->content }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

    </div>

@endsection
