@extends('admin.layouts.admin-master')
@section('title', 'Change Password')
@section('content')

    <div class="col-lg-8 col-md-8 col-sm-8 container justify-content-center">
        <div class="row content" style="min-height: 694px">
            <div class="col-lg-12 col-md-12 col-sm-12 align-self-center">
                <div class="card h-auto">
                    <div class="card-body">
                        <h6 class="mb-2 text-primary">Change Password</h6>
                        <div class="container">
                            <form action="{{ route('admin.change.password', ['user' => auth()->user()]) }}" method="POST">
                                @csrf
                                @method('put')

                                <div class="form-group">
                                    <label for="current_password">Current Password</label>
                                    <input type="password" name="current_password"
                                        class="form-control @error('current_password') is-invalid @enderror"
                                        id="current_password" placeholder="Enter Current Password" required
                                        autocomplete="current-password">
                                    @error('current_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-row">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="password">New Password</label>
                                            <input type="password" name="password"
                                                class="form-control @error('password') is-invalid @enderror" id="password"
                                                placeholder="Enter New Password" required autocomplete="new-password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="password_confirmation">Confirm Password</label>
                                            <input id="password-confirm" type="password"
                                                class="form-control @error('new_password') is-invalid @enderror"
                                                name="password_confirmation" placeholder="Enter Confirm Password" required
                                                autocomplete="new-password">
                                            @error('password_confirmation')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary fa-pull-right"><i class="fa fa-edit"></i>
                                    Change
                                    Password</button>
                            </form>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        <div class="row justify-content-center">
                            @if (session()->has('error'))
                                <span class="alert alert-danger">
                                    <strong>{{ session()->get('error') }}</strong>
                                </span>
                            @elseif (session()->has('success'))
                                <span class="alert alert-success">
                                    <strong>{{ session()->get('success') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
