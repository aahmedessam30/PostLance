@extends('admin.layouts.admin-master')
@section('title', 'Admins')
@section('content')
    <h1>Admins</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">All Admins</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Age</th>
                            <th>Country</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Manage Users</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($users) == 0)
                            <tr>
                                <td colspan="10">There's No Users</td>
                            </tr>
                        @else
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    @if ($user->image == null)
                                        <td>No Photo</td>
                                    @else
                                        <td><img src="{{ asset($user->image) }}" alt="Profile Image"
                                                style="width: 50px; height: 50px;"></td>
                                    @endif
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->gender }}</td>
                                    <td>{{ $user->age }}</td>
                                    @if ($user->country_id == null)
                                        <td>No Country</td>
                                    @else
                                        <td>{{ $user->country->name }}</td>
                                    @endif
                                    <td>{{ $user->address }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td class="text-center" style="width: 180px">
                                        @if (auth()->user()->id == $user->id)
                                        @else
                                            <a href="{{ route('admin.remove_admin.admin', ['user' => $user]) }}"
                                                style="text-decoration: none">
                                                <button class="btn btn-danger" style="margin-top: 5px">
                                                    <i class="fa fa-trash"></i> Delete
                                                </button>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                <div class="pagination justify-content-center mb-4">
                    {{ $users->render() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- Page level plugins -->
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

@endsection
