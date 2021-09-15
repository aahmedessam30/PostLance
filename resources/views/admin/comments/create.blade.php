@extends('admin.layouts.admin-master')
@section('title', 'Create Comment')
@section('content')

    <div class="container" style="margin-top: 50px; min-height: 694px">
        <h1 style="margin-bottom: 30px">Create Comment</h1>

        <form method="post" action="{{ route('admin.comment.store') }}" enctype="multipart/form-data">
            @csrf

            {{-- UserName --}}
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control-plaintext @error('name') is-invalid @enderror" id="title"
                    value="{{ auth()->user()->name }}" readonly required>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            {{-- Comment Content --}}
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror" rows="3"
                    required></textarea>
                @error('content')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            {{-- Comment Post --}}
            <div class="form-group">
                <label for="post">On Post</label>
                <select class="form-select form-control @error('post') is-invalid @enderror" name="post_id" required>
                    <option value="" selected>----</option>
                    @foreach ($posts as $post)
                        <option value="{{ $post->id }}"> {{ $post->id }}- {{ $post->title }}</option>
                    @endforeach
                </select>
                @error('post')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            {{-- Post Image --}}
            <div class="form-group">
                <label for="file">Comment Image</label>
                <input type="file" name="image" id="image" class="form-control-file @error('image') is-invalid @enderror">
                @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary" style="margin-top: 15px"><i class="fa fa-plus"></i> Create
                Comment</button>
        </form>
    </div>
@endsection
