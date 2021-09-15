@extends('admin.layouts.admin-master')
@section('title', 'Profile')
@section('content')

    <form method="post" action="{{ route('admin.profile.update', auth()->user()) }}" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="row content">
            <div class="col-xl-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="user-profile">
                            <div class="user-avatar">
                                <img src="{{ asset(auth()->user()->image) }}" class="img-profile"
                                    alt="{{ auth()->user()->name }}">
                            </div>
                            <h5 class="user-name">{{ auth()->user()->name }}</h5>
                            <h6 class="user-email">{{ auth()->user()->email }}</h6>
                        </div>
                        <div class="about">
                            <h5 class="text-primary">About</h5>
                            @if (auth()->user()->is_admin == 1)
                                <p class="p-about">Admin User<br>Add {{ count(auth()->user()->posts) }}
                                    Posts and
                                    {{ count(auth()->user()->comments) }} Comments
                                </p>
                            @else
                                <p class="p-about">Add {{ count(auth()->user()->posts) }} Posts and <br>
                                    {{ count(auth()->user()->comments) }} Comments
                                </p>

                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 personal">
                                <h6 class="mb-2 text-primary">Personal Details</h6>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="name">Full Name</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                        id="name" value="{{ $user->name }}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" name="email"
                                        class="form-control @error('email') is-invalid @enderror" id="email"
                                        value="{{ $user->email }}">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="age">Age</label>
                                    <input type="age" name="age" class="form-control @error('age') is-invalid @enderror"
                                        id="age" value="{{ $user->age }}">
                                    @error('age')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="gender">Gender</label>
                                    <select class="form-select form-control @error('gender') is-invalid @enderror"
                                        name="gender" id="gender">
                                        <option value="{{ $user->gender }}" selected>{{ $user->gender }}</option>
                                        @if ($user->gender === 'Male')
                                            <option value="Female">Female</option>
                                        @else
                                            <option value="Male">Male</option>
                                        @endif
                                    </select>
                                    @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="country">country</label>
                                    <select class="form-select form-control @error('country_id') is-invalid @enderror"
                                        name="country_id">
                                        @if ($user->country_id == null)
                                            <option value="" selected>----</option>
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        @else
                                            <option selected hidden value="{{ $user->country->id }}">
                                                {{ $user->country->name }}</option>
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('country_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" name="address"
                                        class="form-control @error('address') is-invalid @enderror" id="address"
                                        value="{{ $user->address }}">
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone"
                                        class="form-control @error('phone') is-invalid @enderror" id="phone"
                                        value="{{ $user->phone }}">
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="image">User Image</label>
                                    <input type="file" name="image" id="image"
                                        class="form-control-file @error('image') is-invalid @enderror">
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col justify-content-end" style="margin-top: 50px">
                                <div class="text-right">
                                    <a href="{{ route('admin.show.formPassword', ['user' => $user]) }}"
                                        class="btn btn-success"><i class="fa fa-edit"></i>
                                        Change Password</a>
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i>
                                        Edit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
