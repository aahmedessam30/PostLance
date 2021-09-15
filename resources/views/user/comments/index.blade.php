@extends("layouts.home-master")
@section('title', 'My Comments')
@section('content')

    <!-- Blog Comment -->
    <div class="row" style="margin-top: 50px; min-height: 664px;">
        <h1>My Comments</h1>
        @if (count($comments) == 0)
            <div class="align-self-center">
                <h5>There's No Comments</h5>
            </div>
        @else
            @foreach ($comments as $comment)
                <div class="card mb-4" style="width: 750px;">
                    <img class="card-img-top" src="{{ asset($comment->image) }}" alt="Card image cap">
                    <div class="card-body">
                        <h2 class="card-title">{{ $comment->name }}</h2>
                        <p class="card-text">{{ $comment->content }}</p>
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
                    </div>
                    <div class="card-footer text-muted">
                        Posted on {{ $comment->created_at->diffForHumans() }}
                        By {{ $comment->user->name }}
                    </div>
                </div>
            @endforeach
        @endif
    </div>

    <!-- Pagination -->
    <ul class="pagination justify-content-center mb-4">
        <li class="page-item">
            {{ $comments->render() }}
        </li>
    </ul>
@endsection
