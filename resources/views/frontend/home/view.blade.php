@extends('frontend.layout.master')
@section('content')
<div class="container">
    <img loading="lazy" decoding="async"
    src="{{ asset('storage/images/post/' . $post->image) }}" alt="Post Thumbnail"
    class="img-fluid">
    <div class="px-3 py-2 ">
        <span class="badge text-bg-success">{{ $post->category->name }}</span>
        <p class="fs-4 text-title pt-1 mb-0">{{ $post->title }} </p>
        <p>{{ $post->description }}</p>
    </div>
</div>
@endsection