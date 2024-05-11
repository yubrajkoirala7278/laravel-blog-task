@extends('frontend.layout.master')

@section('content')
    <main>
        <section class="section">
            <div class="container">
                <div class="row no-gutters-lg">
                    <div class="col-12">
                        <h2 class="section-title">{{ $post->title }}</h2>
                    </div>
                    <div class="col-12 mb-5 mb-lg-0">
                        <div class="row d-flex " style="row-gap: 20px">
                            <div class="col-12">
                                <article class="card article-card">
                                        <div class="card-image">
                                            <div class="post-info"> <span
                                                    class="text-uppercase">{{ $post->created_at->format('d M Y') }}</span>
                                                <span
                                                    class="text-uppercase">{{ round(Str::of($post->description)->wordCount() / 238, 2) }}
                                                    minutes read</span>
                                            </div>
                                            <img loading="lazy" decoding="async"
                                                src="{{ asset('storage/images/post/' . $post->image->filename) }}"
                                                alt="Post Thumbnail" class="w-100">
                                        </div>
                                    <div class="card-body px-0 pb-1">
                                       
                                        <h2 class="h1">{{ $post->title }}</h2>
                                        <p class="card-text">{{ $post->description }}</p>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
