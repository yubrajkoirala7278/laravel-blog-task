@extends('frontend.layout.master')

@section('content')
    <div class="container">
        <div class="mb-5">
            <h2 class="text-title fs-4 fw-semibold mb-0">Categories with Blogs & News Count</h2>
            @foreach ($categories as $key=>$category)
                <span class="badge text-bg-success">{{$category->name}}({{$category->posts_count}})</span>
            @endforeach
           
        </div>
        <h2 class="text-title fs-4 fw-semibold">Blogs</h2>
        <input type="search" name="search" id="search" placeholder="Search blog by title" autocomplete="off"
            class="form-control mb-3 w-auto">
        <div class="row d-flex mb-3" style="row-gap: 20px" id="blog-cards">
            @if (count($blogs) > 0)
                @foreach ($blogs as $blog)
                    <div class="col col-12 col-md-6 col-lg-4">
                        <div class="blog-card pb-3">
                            <div class="blog-img-div">
                                <a href="{{ route('frontend.read-more', $blog->slug) }}"><img loading="lazy"
                                        decoding="async" src="{{ asset('storage/images/post/' . $blog->image) }}"
                                        alt="Post Thumbnail" class="img-fluid"></a>
                            </div>
                            <div class="px-3 py-2">
                                <span class="badge text-bg-success">{{ $blog->category->name }}</span>
                                <p class="fs-4 text-title pt-1 mb-0">{{ $blog->title }}</p>
                                <p>{{ Str::limit($blog->description, 200) }}</p>
                                <a href="{{ route('frontend.read-more', $blog->slug) }}"
                                    class="d-block text-end text-decoration-none text-title fw-semibold">Read
                                    More<i class="fa-solid fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12 text-center">
                    <p>No Blogs to display</p>
                </div>
            @endif
        </div>
        {{ $blogs->links() }}
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(() => {
            let timer;
            $('#search').on('keyup', () => {
                clearTimeout(timer);
                timer = setTimeout(searchBlogs, 1000);
            });

            const searchBlogs = () => {
                const value = $('#search').val();
                $.get("{{ route('frontend.index') }}", {
                        'search': value
                    })
                    .done(response => {
                        const blogs = response.blogs;
                        $('#blog-cards').empty();
                        if (blogs.length > 0) {
                            blogs.forEach(blog => {
                                const blogCard = `<div class="col col-12 col-md-6 col-lg-4">
                                    <div class="blog-card pb-3">
                                        <div class="blog-img-div">
                                            <a href="{{ route('frontend.read-more', '') }}/${blog.slug}"><img loading="lazy" decoding="async"
                                                    src="{{ asset('storage/images/post/') }}/${blog.image}" alt="Post Thumbnail"
                                                    class="img-fluid"></a>
                                        </div>
                                        <div class="px-3 py-2">
                                            <span class="badge text-bg-success">${blog.category.name}</span>
                                            <p class="fs-4 text-title pt-1 mb-0">${blog.title}</p>
                                            <p>${blog.description.substring(0, 200)}</p>
                                            <a href="{{ route('frontend.read-more', '') }}/${blog.slug}"
                                                class="d-block text-end text-decoration-none text-title fw-semibold">Read
                                                More<i class="fa-solid fa-chevron-right"></i></a>
                                        </div>
                                    </div>
                                </div>`;
                                $('#blog-cards').append(blogCard);
                            });
                        } else {
                            $('#blog-cards').html(
                                '<div class="col-12 text-center"><p>No Blogs to display</p></div>');
                        }
                    });
            };
        });
    </script>
@endsection
