@extends('frontend.layouts.app')
@section('content')
         <!-- ======= Breadcrumbs ======= -->
         <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>{{$post->title}}</h2>
          <ol>
            <li><a href="{{ route('customer.index') }}">Home</a></li>
            <li><a href="#">Posts</a></li>
            <li>{{$post->title}}</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->
<!--  -->
<!--  -->
 <!-- ======= Blog Single Section ======= -->
 <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-12 entries">

            <article class="entry entry-single">
                <h2 class="entry-title">
                <a href="#">{{$post->title}}</a>
              </h2>
              <span></span>

              <div class="entry-img">
                @foreach($post->multipic as $img)
                <a href="{{ asset('storage/image/multipic/'.$img->image) }}" data-gallery="portfolioGallery"
                class="portfolio-lightbox preview-link" >
                    <img src="{{ asset('storage/image/multipic/'.$img->image) }}" class="img-fluid" alt="{{$post->title}}" style="width: 200px; height: 200px; margin-left: 20px; margin-top: 20px;">
                </a>
                @endforeach
              </div>

              

              <div class="entry-content">
                <p>
                {!! $post->description !!}
                </p>
              </div>
              <div class="entry-content">
                <a href="{{$post->url}}" target="_blank">Know More.</a>
              </div>

            </article><!-- End blog entry -->
          </div><!-- End blog entries list -->
        </div>

      </div>
    </section><!-- End Blog Single Section -->

@endsection