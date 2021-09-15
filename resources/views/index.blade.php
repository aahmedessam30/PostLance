@extends("layouts.home-master")
@section('content')

    <!-- Blog Post -->
    <div class="row" style="margin-top: 50px;">
        @foreach ($posts as $post)
            <div class="card mb-4" style="width: 750px;">
                <img class="card-img-top" src="{{ asset($post->image) }}" alt="Card image cap">
                <div class="card-body">
                    <h2 class="card-title">{{ $post->title }}</h2>
                    <p class="card-text">{{ Str::limit($post->content, 49, '...') }}</p>
                    <a href="{{ route('user.post.show', ['post' => $post]) }}" class="btn btn-primary">Read More &rarr;</a>
                    @if (Auth::check() && auth()->user()->id == $post->user_id)
                        <a href="{{ route('user.post.edit', ['post' => $post]) }}" class="btn btn-success">
                            <i class="fa fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('user.post.destroy', ['post' => $post]) }}" method="post"
                            style="display: inline-block">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
                        </form>
                    @endif
                </div>
                <div class="card-footer text-muted">
                    Posted on {{ $post->created_at->diffForHumans() }}
                    By {{ $post->user->name }}
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <ul class="pagination justify-content-center mb-4">
        <li class="page-item">
            {{ $posts->render() }}
        </li>
    </ul>
@endsection
