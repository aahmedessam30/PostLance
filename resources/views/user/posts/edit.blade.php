@extends('layouts.home-master')
@section('title', 'Edit Post')
@section('content')

    <div class="container" style="margin-top: 50px; min-height: 694px;">
        <h1 style="margin-bottom: 30px">Edit Post</h1>

        <form method="post" action="{{ route('user.post.update', ['post' => $post]) }}" enctype="multipart/form-data">
            @csrf
            @method('put')

            {{-- Post Image --}}
            <div class="form-group">
                <img src="{{ asset($post->image) }}" alt="Post Image" class="img-fluid rounded">
            </div>

            {{-- Post Title --}}
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" required
                    autofocus value="{{ $post->title }}">
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
                    required autofocus>{{ $post->content }}</textarea>
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
                    autofocus value="{{ $post->image }}">
                @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary" style="margin: 15px 0 20px 0"><i class="fa fa-edit"></i> Edit
                Post</button>
        </form>
    </div>
@endsection
