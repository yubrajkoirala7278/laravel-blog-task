@extends('admin.layouts.master')

@section('content')
<div class="bg-white p-4">
    <h2 class="fs-5 mb-4">Edit Post</h2>
    <form action="{{ route('posts.update', $post->slug) }}" method="POST">
        @csrf
        @method('PUT')
        {{-- title --}}
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Title"
                value="{{ old('title', $post->title) }}">
            @if ($errors->has('title'))
            <span class="text-danger text-sm">{{ $errors->first('title') }}</span>
            @endif
        </div>
        {{-- slug --}}
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug" placeholder="slug"
                value="{{ old('slug', $post->slug) }}">
            @if ($errors->has('slug'))
            <span class="text-danger text-sm">{{ $errors->first('slug') }}</span>
            @endif
        </div>
        {{-- description --}}
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" placeholder="Description" id="description"
                name="description">{{ old('description', $post->description) }}</textarea>
            @if ($errors->has('description'))
            <span class="text-danger text-sm">{{ $errors->first('description') }}</span>
            @endif
        </div>
        {{-- Status (static single select) --}}
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" name="status" id="status">
                <option disabled value="">Choose Option</option>
                <option @selected(old('status', $post->status) == 1) value="1">Publish</option>
                <option @selected(old('status', $post->status) == 0) value="0">Draft</option>
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
                @foreach ($categories as $category)
                <option @selected(old('category', $post->category_id) == $category->id) value="{{ $category->id }}">{{
                    $category->name }}</option>
                @endforeach
                @if (count($categories) == 0)
                <option value="" disabled>No Category</option>
                @endif
            </select>


            @if ($errors->has('category'))
            <span class="text-danger text-sm">{{ $errors->first('category') }}</span>
            @endif
        </div>
        {{-- image --}}
        <div class="mb-3">
            <label for="filename" class="form-label">Image</label>
            <input type="file" class="form-control" id="filename" name="filename">
            @if ($errors->has('filename'))
            <span class="text-danger text-sm">{{ $errors->first('filename') }}</span>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection

@section('script')

@endsection