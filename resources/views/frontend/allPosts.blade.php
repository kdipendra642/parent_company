@extends('frontend.layouts.app')

@section('content')
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2>All Posts</h2>
            <ol>
                <li><a href="{{ route('customer.index') }}">Home</a></li>
                <li>Posts</li>
            </ol>
        </div>

    </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Services Section ======= -->
<section id="services" class="services section-bg">
    <div class="container" data-aos="fade-up">

        <div class="row">

            @foreach($post as $allPost)
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100" style="width: 380px; margin-top: 20px;">
                <div class="icon-box iconbox-blue" style="width: 380px; margin-top: 10px;">
                    <div class="icon">
                        <img src="{{ asset('image/posts/'.$allPost->cover)}}" alt="{{$allPost->title}}" style="width: 100px; height: 100px;">
                    </div>
                    <h4><a href="{{ route('customer.view-category', $allPost->slug) }}">{{$allPost->title}}</a></h4>
                    <p>{!! str_limit($allPost->description, 300) !!}</p>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section><!-- End Services Section -->
@endsection