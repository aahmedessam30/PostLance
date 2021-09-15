@extends('admin.layouts.admin-master')
@section('title', 'Profile')
@section('content')
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
                        <h5>About</h5>
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
                                <label for="fullName">Full Name</label>
                                <p>{{ auth()->user()->name }}</p>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <p>{{ auth()->user()->email }}</p>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="age">Age</label>
                                @if (auth()->user()->age == null)
                                    <p>----</p>
                                @else
                                    <p>{{ auth()->user()->age }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <p>{{ auth()->user()->gender }}</p>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="country">country</label>
                                @if (auth()->user()->country == null)
                                    <p>----</p>
                                @else
                                    <p>{{ auth()->user()->country->name }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="address">Address</label>
                                @if (auth()->user()->address == null)
                                    <p>----</p>
                                @else
                                    <p>{{ auth()->user()->address }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                @if (auth()->user()->phone == null)
                                    <p>----</p>
                                @else
                                    <p>{{ auth()->user()->phone }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <p hidden>{{ auth()->user()->password }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row gutters" style="margin-top: 30px">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="text-right">
                                <a href="{{ route('admin.profile.edit' , ['user'=>auth()->user()]) }}" style="text-decoration: none">
                                    <button type="button" id="submit" name="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Edit
                                        Profile</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
