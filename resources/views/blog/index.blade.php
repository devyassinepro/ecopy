@extends('layouts.blog')

@section('title', 'Page Title')

@section('content')
<!--page header section start-->
<section class="page-header position-relative overflow-hidden ptb-120 bg-dark" style="background: url('assets/img/page-header-bg.svg')no-repeat center bottom">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-12">
            <div class="section-heading text-center">
                <h1 class="display-5 fw-bold">Ecopy - Dropshipping Blog</h1>
                <p class="lead mb-0">Learn everything you need to know about dropshipping – from choosing a product to getting your first sale.</p>
            </div>
        </div>
    </div>

    <div class="bg-circle rounded-circle circle-shape-3 position-absolute bg-dark-light right-5"></div>
</div>
</section>
<!--page header section end-->
<section class="masonary-blog-section ptb-120">
            <div class="container">
                <div class="row">

                @foreach($posts as $post)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-article rounded-custom my-3">
                        @if ($post->feature_image)
                            <a href="{{ route('blog.show', $post->slug) }}" class="article-img">
                                <img src="{{ asset('storage/' . $post->feature_image) }}" alt="article" class="img-fluid">
                            </a>
                        @endif
                            <div class="article-content p-4">
                                <div class="article-category mb-4 d-block">
                                    <a href="javascript:;" class="d-inline-block text-dark badge bg-warning-soft">Ecopy</a>
                                </div>
                                <a href="{{ route('blog.show', $post->slug) }}">
                                    <h2 class="h5 article-title limit-2-line-text">{{ $post->title }}</h2>
                                </a>
                                <!-- <p class="limit-2-line-text">{{ Str::limit($post->content, 150, '...') }}</p> -->

                                <a href="javascript:;">
                                    <div class="d-flex align-items-center pt-4">
                                        <div class="avatar">
                                            <img src="assets/img/favicon.png" alt="avatar" width="40" class="img-fluid rounded-circle me-3">
                                        </div>
                                        <div class="avatar-info">
                                            <h6 class="mb-0 avatar-name">{{ $post->author }}</h6>
                                            <span class="small fw-medium text-muted">{{ $post->published_at->format('F j, Y') }}</span>
                                        </div>
                                    </div>
                                </a>

                            </div>
                        </div>
                    </div>
                    @endforeach

                    
            </div>
</section>

@endsection