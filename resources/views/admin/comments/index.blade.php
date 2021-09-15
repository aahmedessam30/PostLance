@extends('admin.layouts.admin-master')
@section('title', 'Comments')
@section('content')
    <h1>Comments</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">All Comments</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Content</th>
                            <th>On Post</th>
                            <th>Manage Comments</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($comments) == 0)
                            <tr>
                                <td colspan="6">There's No Comments</td>
                            </tr>
                        @else
                            @foreach ($comments as $comment)
                                <tr>
                                    <td>{{ $comment->id }}</td>
                                    @if ($comment->image == null)
                                        <td>Null</td>
                                    @else
                                        <td class="text-center">
                                            <img src="{{ asset($comment->image) }}" height="50px" width="100px" alt="">
                                        </td>
                                    @endif
                                    <td>{{ $comment->name }}</td>
                                    <td>{{ $comment->content }}</td>
                                    <td>{{ $comment->post->id }}</td>
                                    <td class="text-center">
                                        <form action="{{ route('admin.comment.destroy', ['comment' => $comment]) }}"
                                            method="post">
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
                    {{ $comments->render() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- Page level plugins -->
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
@endsection
