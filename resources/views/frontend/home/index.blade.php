@extends('frontend.layout.master')

@section('content')
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-4">
                    <div>
                        <h2 class="fs-5 text-primary">Categories</h2>
                        <span class="badge text-bg-success p-2 me-2">All</span>
                        @foreach ($categories as $category)
                            <span class="badge text-bg-success p-2 me-2">{{ $category->name }}({{$category->posts_count}})</span>
                        @endforeach
                    </div>
                </div>
                @if (count($posts) > 0)
                    @foreach ($posts as $post)
                        <div class="col-12 col-md-6 col-lg-4 mb-4 ">
                            <div class="card">
                                <a href="{{ route('frontend.read-more', $post->slug) }}">
                                    <div class="card-image">
                                        <div class="post-info"> <span
                                                class="text-uppercase">{{ $post->created_at->format('d M
                                                                                                                                                                            Y') }}</span>
                                        </div>
                                        <img loading="lazy" decoding="async"
                                            src="{{ asset('storage/images/post/' . $post->image->filename) }}"
                                            alt="Post Thumbnail" class="w-100">
                                    </div>
                                </a>
                                <div class="card-body px-0 pb-0">
                                    <span class="badge bg-success">{{$post->category->name}}</span>
                                    <h2><a class="post-title"
                                            href="{{ route('frontend.read-more', $post->slug) }}">{{ $post->title }}</a>
                                    </h2>
                                    <p class="card-text">{{ Str::limit($post->description, 200) }}</p>
                                    <div class="content"> <a class="read-more-btn"
                                            href="{{ route('frontend.read-more', $post->slug) }}">Read Full
                                            Blog</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-12">
                        <p>No Post Yet</p>
                    </div>
                @endif

                {{ $posts->links() }}
            </div>
        </div>
    </section>
@endsection
