@extends('admin.layouts.admin-master')
@section('title', 'Create User')
@section('content')

    <div class="container" style="margin-top: 50px; min-height: 694px">
        <h1 style="margin-bottom: 30px">Create User</h1>

        <form method="post" action="{{ route('admin.user.store') }}" enctype="multipart/form-data">
            @csrf

            {{-- User Name --}}
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name"
                    required autofocus value="{{ old('name') }}">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            {{-- User Email --}}
            <div class="   form-group">
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email"
                    required autofocus value="{{ old('email') }}">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            {{-- User Password --}}
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                    id="password" required autofocus value="{{ old('password') }}">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="row">
                {{-- User Gender --}}
                <div class="form-group col-6">
                    <label for="gender">Gender</label>
                    <select class="form-select form-control @error('gender') is-invalid @enderror" name="gender" id="gender"
                        required autofocus value="{{ old('gender') }}">
                        <option value="----" hidden selected>----</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    @error('gender')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- User Age --}}
                <div class="form-group col-6">
                    <label for="age">Age</label>
                    <input type="number" name="age" class="form-control @error('age') is-invalid @enderror" id="age"
                        required autofocus value="{{ old('age') }}">
                    @error('age')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row">
                {{-- User Country --}}
                <div class="form-group col-6">
                    <label for="country">Country</label>
                    <select class="form-select form-control @error('country_id') is-invalid @enderror" name="country_id"
                        required autofocus value="{{ old('country_id') }}">
                        <option selected hidden>----</option>
                        @foreach ($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                        @endforeach
                    </select>
                    @error('country_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- User Address --}}
                <div class="form-group col-6">
                    <label for="address">Address</label>
                    <input type="text" name="address" class="form-control @error('address') is-invalid @enderror"
                        id="address" required autofocus value="{{ old('address') }}">
                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            {{-- User Phone --}}
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                    id="phone" required autofocus value="{{ old('phone') }}">
                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            {{-- User Image --}}
            <div class="form-group">
                <label for="file">User Image</label>
                <input type="file" name="image" id="image"
                    class="form-control-file @error('image') is-invalid @enderror" required autofocus
                    value="{{ old('image') }}">
                @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary" style="margin-top: 15px"><i class="fa fa-user-plus"></i> Create
                User</button>
        </form>
    </div>
@endsection
