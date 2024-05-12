@extends('admin.layouts.master')

@section('content')
    <div class="bg-white p-4">
        <div class="d-flex align-items-center justify-content-between">
            <h2 class="fs-5 mb-3 fw-bold">Posts</h2>
            <a href="{{ route('posts.create') }}" class="text-success  fs-4"><i class="fa-solid fa-circle-plus"></i></a>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">S.N</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Category</th>
                    <th scope="col">Username</th>
                    <th scope="col">Status</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if (count($posts) > 0)
                    @foreach ($posts as $key => $post)
                        <tr>
                            <th>{{ $key + 1 }}</th>
                            <td>{{ Str::limit($post->title, 15) }}</td>
                            <td>{{ Str::limit($post->description, 15) }}</td>
                            <td>{{ !empty($post->category) ? $post->category->name : '' }}</td>
                            <td>{{ $post->user->name }}</td>
                            <td>{{ $post->status == 1 ? 'Active' : 'Inactive' }}</td>
                            <td>
                                <img  src="{{ asset('/storage/images/post/'.$post->image) }}" style="height: 30px" >
                            </td>
                            <td>
                                <div class="d-flex align-items-center" style="gap: 10px">
                                    <a href="{{ route('posts.show', $post->slug) }}" class="text-primary"><i
                                            class="fa-regular fa-eye"></i></a>
                                    <a href="{{ route('posts.edit', $post->slug) }}" class="text-warning"><i
                                            class="fa-solid fa-pencil"></i></a>
                                    <form action="{{ route('posts.destroy', $post) }}" method="POST">
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
                    <td colspan="20">No Post</td>
                </tr>
                @endif

            </tbody>
        </table>
        {!! $posts->links() !!}
    </div>
@endsection

@section('script')
@endsection
