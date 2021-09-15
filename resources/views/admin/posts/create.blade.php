@extends('admin.layouts.admin-master')
@section('title', 'Create Post')
@section('content')

    <div class="container" style="margin-top: 50px; min-height: 694px">
        <h1 style="margin-bottom: 30px">Create Post</h1>

        <form method="post" action="{{ route('admin.post.store') }}" enctype="multipart/form-data">
            @csrf

            {{-- Post Title --}}
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" required
                    autofocus value="{{ old('title') }}">
                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            {{-- Post Content --}}
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror" rows="5"
                    required autofocus>{{ old('content') }}</textarea>
                @error('content')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            {{-- Post Image --}}
            <div class="form-group">
                <label for="file">Post Image</label>
                <input type="file" name="image" id="image" class="form-control-file @error('image') is-invalid @enderror"
                    required autofocus value="{{ old('image') }}">
                @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary" style="margin-top: 15px">Create Post</button>
        </form>
    </div>
@endsection
