@extends('layouts.home-master')
@section('title', 'Edit Comment')
@section('content')

    <div class="container" style="margin-top: 50px; min-height: 694px;">
        <h1 style="margin-bottom: 30px">Edit Comment</h1>

        <form method="post" action="{{ route('user.comment.update', ['comment' => $comment]) }}"
            enctype="multipart/form-data">
            @csrf
            @method('put')

            {{-- Comment UserName And Post --}}
            <input type="hidden" name="name" value="{{ auth()->user()->name }}" required>
            <input type="hidden" name="post_id" value="{{ $comment->post_id }}" required>

            {{-- Comment Image --}}
            <div class="form-group">
                <img src="{{ asset($comment->image) }}" alt="Comment Image" class="img-fluid rounded">
            </div>

            {{-- Comment Content --}}
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror" rows="5"
                    style="margin-bottom: 20px;">{{ $comment->content }}</textarea>
                @error('content')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            {{-- Comment Image --}}
            <div class="form-group">
                <label for="image">Comment Image</label>
                <input type="file" name="image" id="image" class="form-control-file @error('image') is-invalid @enderror"
                    value="{{ $comment->image }}">
                @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary" style="margin: 10px 0 20px 0"><i class="fa fa-edit"></i> Edit
                Comment</button>
        </form>
    </div>
@endsection
