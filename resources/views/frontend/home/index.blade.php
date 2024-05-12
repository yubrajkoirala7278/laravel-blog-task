@extends('frontend.layout.master')
@section('content')
    <div class="container">
        <h2 class="text-title fs-2 fw-semibold">Blogs</h2>
        <div class="row d-flex mb-4" style="row-gap: 20px">
            @if (count($posts) > 0)
                @foreach ($posts as $post)
                    <div class="col col-12 col-md-6 col-lg-4">
                        <div class="blog-card pb-3">
                            <div class="blog-img-div">
                                <a href="{{ route('frontend.read-more', $post->slug) }}"><img loading="lazy" decoding="async"
                                        src="{{ asset('storage/images/post/' . $post->image) }}" alt="Post Thumbnail"
                                        class="img-fluid"></a>
                            </div>
                            <div class="px-3 py-2">
                                <span class="badge text-bg-success">{{ $post->category->name }}</span>
                                <p class="fs-4 text-title pt-1 mb-0">{{ $post->title }} </p>
                                <p>{{ Str::limit($post->description, 200) }}</p>
                                <a href="{{ route('frontend.read-more', $post->slug) }}" class="d-block text-end text-decoration-none text-title fw-semibold">Read
                                    More<i class="fa-solid fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
            <div class="col col-12 col-md-6 col-lg-4 text-center">
                <p>No Blogs to display</p>
            </div>
            @endif
        </div>
        {{ $posts->links() }}
    </div>
@endsection

@section('script')
@endsection
