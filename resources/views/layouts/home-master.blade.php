{{-- Header --}}
@include('layouts.header')

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">{{ config('app.name', 'Post Lance') }}</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>

                    @if (Auth::check())

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.post.index') }}">Posts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.comment.index') }}">Comment</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.post.create') }}">Create Post</a>
                        </li>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @if (auth()->user()->image == null)
                                    <span class="mr-2 d-none d-lg-inline">{{ auth()->user()->name }}</span>
                                    @if (auth()->user()->gender === 'Male')
                                        <img class="img-profile rounded-circle" style="width: 30px; height: 30px;"
                                            src="{{ asset('images/male.png') }}">
                                    @else
                                        <img class="img-profile rounded-circle" style="width: 30px; height: 30px;"
                                            src="{{ asset('images/female.png') }}">
                                    @endif
                                @else
                                    <span class="mr-2 d-none d-lg-inline">{{ auth()->user()->name }}</span>
                                    <img class="img-profile rounded-circle" style="width: 30px; height: 30px;"
                                        src="{{ asset(auth()->user()->image) }}">
                                @endif
                            </a>

                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                @if (auth()->user()->hasRole('admin'))
                                    <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Admin
                                    </a>
                                @else
                                    <a class="dropdown-item"
                                        href="{{ route('user.profile.show', ['user' => auth()->user()]) }}">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Profile
                                    </a>
                                @endif
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('shared.logout') }}">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-lg-8 col-md-8 col-sm-8 container justify-content-center">
                @yield('content')
            </div>

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    @include('layouts.footer')

</body>

</html>
