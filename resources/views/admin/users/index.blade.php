@extends('admin.layouts.master')
@section('content')
    <div class="container bg-white p-4">
        <div class="d-flex align-items-center justify-content-between">
            <h2 class="fs-5 mb-3 fw-bold">Users</h2>
            <a href="{{ route('users.create') }}" class="text-success  fs-4"><i class="fa-solid fa-circle-plus"></i></a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">S/N</th>
                    <th scope="col">Name</th>
                    <th scope="col">Role</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if (count($users) > 0)
                    @foreach ($users as $key => $user)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->role }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <div class="d-flex align-items-center" style="gap: 10px">
                                    <form action="{{ route('users.destroy', $user) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="btn btn-transparent text-danger p-0 show-alert-delete-box"
                                            data-toggle="tooltip" title='Delete'><i
                                                class="fa-regular fa-trash-can"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr class="text-center">
                        <td colspan="20">No user to display</td>
                    </tr>
                @endif


            </tbody>
        </table>
    </div>
@endsection

@section('script')
@endsection
