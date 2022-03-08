@extends('frontend.layouts.app')

@section('content')
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

    <div class="d-flex justify-content-between align-items-center">
        <h2>Category</h2>
        <ol>
        <li><a href="{{ route('customer.index') }}">Home</a></li>
        <li>{{$cate->title}}</li>
        </ol>
    </div>

    </div>
</section><!-- End Breadcrumbs -->

 <!-- ======= Services Section ======= -->
 <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="row">
        @foreach($post as $posts)

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100" style="height: 300px; width: 340px; margin-top:20px;">
            <div class="icon-box iconbox-blue">
              <div class="icon">
                  <img src="{{ asset('image/posts/'.$posts->cover)}}" alt="{{$posts->title}}" style="width: 100px; height: 100px;">
              </div>
              <h4><a href="{{ route('customer.view-posts', $posts->slug) }}">{{$posts->title}}</a></h4>
              <p>{!! str_limit($posts->description, 50)!!}</p>
            </div>
          </div>

        @endforeach

        </div>

      </div>
    </section><!-- End Services Section -->
@endsection