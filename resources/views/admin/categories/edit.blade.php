@extends('admin.layouts.master')

@section('content')
    <div class="bg-white p-4">
        <h2 class="fs-5 mb-4 fw-bold">Edit Category</h2>
        <form action="{{route('category.update',$category->slug)}}" method="POST">
            @csrf
            @method('PUT')
            {{-- category  --}}
            <div class="mb-3">
                <label for="title" class="form-label">Category</label>
                <input type="text" class="form-control" id="title" name="name" placeholder="Category"
                    value="{{old('name', $category->name)}}">
                @if ($errors->has('name'))
                    <span class="text-danger text-sm">{{ $errors->first('name') }}</span>
                @endif
            </div>
            {{-- slug  --}}
            <div class="mb-3">
                <label for="slug" class="form-label">slug</label>
                <input type="text" class="form-control" id="slug" name="slug" placeholder="slug"
                    value="{{old('slug', $category->slug)}}">
                @if ($errors->has('slug'))
                    <span class="text-danger text-sm">{{ $errors->first('slug') }}</span>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection


