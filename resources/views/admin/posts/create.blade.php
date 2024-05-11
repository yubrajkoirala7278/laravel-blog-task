@extends('admin.layouts.master')

@section('content')
    <div class="bg-white p-4">
        <h2 class="fs-5 mb-4 fw-bold">Create Post</h2>
        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- title --}}
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Title"
                    value="{{ old('title') }}">
                @if ($errors->has('title'))
                    <span class="text-danger text-sm">{{ $errors->first('title') }}</span>
                @endif
            </div>
            {{-- slug --}}
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control" id="slug" name="slug" placeholder="slug"
                    value="{{ old('slug') }}">
                @if ($errors->has('slug'))
                    <span class="text-danger text-sm">{{ $errors->first('slug') }}</span>
                @endif
            </div>
            {{-- description --}}
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" placeholder="Description" id="description" name="description">{{ old('description') }}</textarea>
                @if ($errors->has('description'))
                    <span class="text-danger text-sm">{{ $errors->first('description') }}</span>
                @endif
            </div>
            {{-- Status (static single select) --}}
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" name="status" id="status">
                    <option selected disabled value="">Choose Option</option>
                    <option @selected(old('status') == 1) value="1">Publish</option>
                    <option @selected(old('status') == 0) value="0">Draft</option>
                </select>
                @if ($errors->has('status'))
                    <span class="text-danger text-sm">{{ $errors->first('status') }}</span>
                @endif
            </div>
            {{-- Category (dynamic single select) --}}
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-select" name="category" id="category">
                    <option selected disabled value="">Choose Category</option>
                    @if (count($categories) > 0)
                        @foreach ($categories as $category)
                            <option @selected(old('category') == $category->id) value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    @endif
                </select>
                @if ($errors->has('category'))
                    <span class="text-danger text-sm">{{ $errors->first('category') }}</span>
                @endif
            </div>
            {{-- image --}}
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" name="image">
                @if ($errors->has('image'))
                    <span class="text-danger">{{ $errors->first('image') }}</span>
                @endif

            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
