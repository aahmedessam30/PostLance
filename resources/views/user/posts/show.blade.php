@extends('layouts.home-master')
@section('title', 'Show Post')
@section('content')

    <!-- Title -->
    <h1 class="mt-4">{{ $post->title }}</h1>

    <!-- Author -->
    <p class="lead">
        by {{ $post->user->name }}
    </p>

    <hr>

    <!-- Date/Time -->
    <p class="col-9">Posted on {{ $post->created_at->diffForHumans() }}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-fluid rounded" src="{{ asset($post->image) }}" alt="Card Image">

    <hr>

    <!-- Post Content -->
    <p class="lead">{{ $post->content }}</p>

    <hr>


    @if (Auth::check())
        <!-- Comments Form -->
        <div class="card my-4">
            <h5 class="card-header">Leave a Comment:</h5>
            <div class="card-body">
                <form method="post" action="{{ route('user.comment.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="name" value="{{ auth()->user()->name }}" required>
                        <input type="hidden" name="post_id" value="{{ $post->id }}" required>
                        <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror"
                            rows="3" style="margin-bottom: 20px;" required></textarea>
                        @error('content')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="form-group">
                            <input type="file" name="image" id="image"
                                class="form-control-file @error('image') is-invalid @enderror">
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" formaction="{{ route('user.comment.store') }}"
                        class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    @endif

    @foreach ($post->comments as $comment)
        <!-- Comment with nested comments -->
        <div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" src="{{ asset($comment->user->image) }}" alt="User Image"
                style="width: 50px; height: 50px;">
            <div class="media-body">
                <h5 class="mt-0">{{ $comment->name }}</h5>
                @if ($comment->image == null)
                    {{ $comment->content }}
                @else
                    <img src="{{ asset($comment->image) }}" alt="Comment Image"
                        style="width: 200px; height: 100px; margin-bottom: 10px;">
                    <br>
                    <p>{{ $comment->content }}</p>
                    @if (auth()->user()->id == $comment->user_id)
                        <a href="{{ route('user.comment.edit', ['comment' => $comment]) }}" class="btn btn-success">
                            <i class="fa fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('user.comment.destroy', ['comment' => $comment]) }}" method="post"
                            style="display: inline-block">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
                        </form>
                    @endif
                @endif
            </div>
        </div>
    @endforeach
@endsection
