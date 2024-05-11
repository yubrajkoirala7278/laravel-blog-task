@extends('admin.layouts.master')
@section('content')
    <div class="bg-white p-4">
        <div class="d-flex align-items-center justify-content-between">
            <h2 class="fs-5 mb-3 fw-bold">Categories</h2>
            <a href="{{route('category.create')}}" class="text-success  fs-4"><i class="fa-solid fa-circle-plus"></i></a>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">SN</th>
                    <th scope="col">Category</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if (count($categories) > 0)
                    @foreach ($categories as $key => $category)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->slug }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="{{route('category.edit',$category->slug)}}" class="text-warning"><i class="fa-solid fa-pencil"></i></a>
                                    <form action="{{ route('category.destroy', $category->slug) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-transparent text-danger show-alert-delete-box" data-toggle="tooltip" title='Delete'><i
                                                class="fa-solid fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="3" class="text-center">No data to display</td>
                    </tr>
                @endif


            </tbody>
        </table>
    </div>
@endsection
