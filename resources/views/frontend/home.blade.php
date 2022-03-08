@extends('frontend.layouts.app')
@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <div class="carousel-inner" role="listbox">
           <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url({{ asset('image/sitesettings/'.$setting->about_image)}});">
          <div class="carousel-container">
            <div class="carousel-content animate__animated animate__fadeInUp">
              <h2>Welcome to <span>{{$setting->site_name}}</span></h2>
              <p>{!! str_limit($setting->site_description, 91) !!}</p>
              <div class="text-center"><a href="{{ route('customer.introduction') }}" class="btn-get-started">Read More</a></div>
            </div>
          </div>
        </div>

        <!-- Slide 3 -->
        @foreach($banners as $banner)
        <div class="carousel-item" style="background-image: url({{ asset('image/banner/'.$banner->image)}});">
          <div class="carousel-container">
            <div class="carousel-content animate__animated animate__fadeInUp">
              <h2>{{$banner->title}}</h2>
              <p>{!! $banner->description !!}</p>
            </div>
          </div>
        </div>
        @endforeach


          
        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        </div>
  </section><!-- End Hero -->
  
  <main id="main">

    <!-- ======= About Us Section ======= -->
    <section id="about-us" class="about-us">
      <div class="container" data-aos="fade-up">

        <div class="row content">
          <div class="col-lg-6" data-aos="fade-right">
            <h2>{{$setting->about_title}}</h2>
            <h3>{{$setting->about_sub_title}}</h3>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left">
            <p>
             {!! str_limit($setting->about_description, 500) !!}
             <a href="{{ route('customer.about-us') }}">Ream more</a>
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="row">

        @foreach($cate as $category)
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100" style="width: 380px; margin-top: 20px;">
            <div class="icon-box iconbox-blue" style="width: 380px; margin-top: 10px;">
              <div class="icon">
                <img src="{{ asset('image/category/'.$category->image)}}" alt="{{$category->title}}" style="width: 100px; height: 100px;">
              </div>
              <h4><a href="{{ route('customer.view-category', $category->slug) }}">{{$category->title}}</a></h4>
              <p>{!! $category->description !!}</p>
            </div>
          </div>
        @endforeach

          
        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">

      <div class="section-title">
          <h2>Gallery</h2>
        </div>

        <div class="row portfolio-container" data-aos="fade-up">

        @foreach($galery as $gallery)
          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
          <a href="{{ asset('storage/image/gallery/'.$gallery->image) }}" data-gallery="portfolioGallery"
                class="portfolio-lightbox preview-link" >
                <img src="{{ asset('storage/image/gallery/'.$gallery->image) }}" class="img-fluid" alt="">
              </a>
           
          </div>
        @endforeach
        </div>

      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Our Clients Section ======= -->
    <section id="clients" class="clients">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Clients</h2>
        </div>

        <div class="row no-gutters clients-wrap clearfix" data-aos="fade-up">

        @foreach($clients as $client)
          <div class="col-lg-3 col-md-4 col-6">
            <div class="client-logo">
                <a href="{{$client->url}}" target="_blank">
                    <img src="{{ asset('image/client/'.$client->image)}}" class="img-fluid" alt="{{$client->title}}">
                </a>
            </div>
          </div>
        @endforeach
        </div>

      </div>
    </section><!-- End Our Clients Section -->

  </main><!-- End #main -->

@endsection