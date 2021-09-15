@extends('layouts.home-master')
@section('title', 'Profile')
@section('content')
    <div class="row content">
        <div class="col-lg-12 col-md-12 col-sm-12 justify-content-center">
            <div class="card h-auto">
                <div class="card-body">
                    <div class="user-profile">
                        <div class="user-avatar">
                            <img src="{{ asset($user->image) }}" class="img-profile" alt="{{ $user->name }}">
                        </div>
                        <h5 class="user-name">{{ $user->name }}</h5>
                        <h6 class="user-email">{{ $user->email }}</h6>
                    </div>
                    <div class="about">
                        <h5 class="text-primary">About</h5>
                        @if ($user->hasRole(['admin']))
                        <p class="p-about">Admin User<br>Add {{ count($user->posts) }}
                            Posts and
                            {{ count($user->comments) }} Comments
                        </p>
                        @else
                        <p class="p-about">Add {{ count($user->posts) }} Posts and <br>
                                {{ count($user->comments) }} Comments
                            </p>

                        @endif
                    </div>
                    <h6 class=" mb-2 text-primary">Personal Details</h6>
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="fullName">Full Name</label>
                                    <p>{{ $user->name }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="country">country</label>
                                    @if ($user->country == null)
                                        <p>----</p>
                                    @else
                                        <p>{{ $user->country->name }}</p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="age">Age</label>
                                    @if ($user->age == null)
                                        <p>----</p>
                                    @else
                                        <p>{{ $user->age }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    @if ($user->age == null)
                                        <p>----</p>
                                    @else
                                        <p>{{ $user->phone }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <p>{{ $user->email }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    @if ($user->address == null)
                                        <p>----</p>
                                    @else
                                        <p>{{ $user->address }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="gender">Gender</label>
                                    <p>{{ $user->gender }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <p hidden>{{ $user->password }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="edit">
                            <a href="{{ route('user.profile.edit', ['user' => auth()->user()]) }}"
                                class="btn btn-primary">
                                <i class="fa fa-edit"></i> Edit Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
