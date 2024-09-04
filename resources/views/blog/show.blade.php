@extends('layouts.blog')

@section('title', 'Article')


@section('content')<!--page header section start-->

<!--page header section start-->
<section class="page-header position-relative overflow-hidden ptb-120 bg-dark" style="background: url('assets/img/page-header-bg.svg')no-repeat bottom left">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 col-12">
                <h1 class="fw-bold display-5">{{ $post->title }}</h1>
            </div>
        </div>
        <div class="bg-circle rounded-circle circle-shape-3 position-absolute bg-dark-light right-5"></div>
    </div>
</section>
<!--page header section end-->

<!--blog details section start-->
<section class="blog-details ptb-120">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-8 pe-lg-5">
            <img src="{{ asset('storage/' . $post->feature_image) }}" alt="Ecopy Dashboard" class="img-fluid rounded-custom mb-4">
            {!! $post->content !!}

            </div>
            <div class="col-lg-4">
                <div class="author-wrap text-center bg-light-subtle p-5 sticky-sidebar rounded-custom mt-5 mt-lg-0">
                    <div class="author-info my-4">
                        <h5 class="mb-0">{{ $post->author }}</h5>
                        <span class="small">E-commerce Expert</span>
                    </div>
                    <p>Touzani has over a decade of experience in e-commerce, specializing in optimizing online stores for growth and efficiency. He's passionate about helping businesses leverage the latest tools to succeed in the competitive online marketplace.</p>
                    <ul class="list-unstyled author-social-list list-inline mt-3 mb-0">
                        <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fab fa-github"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--blog details section end-->

@endsection