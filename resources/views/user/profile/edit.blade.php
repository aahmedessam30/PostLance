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
                        <form method="post" action="{{ route('user.profile.update', $user) }}"
                            enctype="multipart/form-data" style="display: inline">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="fullName">Full Name</label>
                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror" id="name"
                                            value="{{ $user->name }}">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
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
                                <div class="col">
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
                                    <div class="row justify-content-end" style="margin-top: 50px">
                                        <div class="edit">
                                            <a href="{{ route('user.show.formPassword', ['user' => $user]) }}"
                                                class="btn btn-success"><i class="fa fa-edit"></i>
                                                Change Password</a>
                                            <button type="submit" id="submit" name="submit" class="btn btn-primary"><i
                                                    class="fa fa-edit"></i> Edit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
