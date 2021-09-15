@extends('admin.layouts.admin-master')
@section('title', 'Admin Posts')
@section('content')
    <h1>Admin Posts</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Admin Posts</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Manage Posts</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($posts) == 0)
                            <tr>
                                <td colspan="5">There's No Posts</td>
                            </tr>
                        @else
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td class="text-center">
                                        <img src="{{ asset($post->image) }}" height="50px" width="100px" alt="">
                                    </td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->content }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.post.show', $post) }}" style="text-decoration: none">
                                            <button class="btn btn-info"><i class="fa fa-eye"></i> Show</button>
                                        </a>
                                        <form action="{{ route('admin.post.destroy', ['post' => $post]) }}" method="post"
                                            style="margin-top: 5px">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>
                                                Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                <div class="pagination justify-content-center mb-4">
                    {{ $posts->render() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- Page level plugins -->
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
@endsection
