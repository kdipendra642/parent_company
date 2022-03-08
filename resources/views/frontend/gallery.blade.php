@extends('frontend.layouts.app')

@section('content')
    <!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <h2>Gallery</h2>
        <ol>
        <li><a href="{{ route('customer.index') }}">Home</a></li>
        <li>Gallery</li>
        </ol>
    </div>

    </div>
</section><!-- End Breadcrumbs -->



    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="row portfolio-container" data-aos="fade-up">
        @foreach($galery as $image)

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
          <a href="{{ asset('storage/image/gallery/'.$image->image) }}" data-gallery="portfolioGallery"
                class="portfolio-lightbox preview-link" >
                <img src="{{ asset('storage/image/gallery/'.$image->image) }}" class="img-fluid" alt="">
              </a>
          </div>
          @endforeach


        </div>

      </div>
    </section><!-- End Portfolio Section -->
@endsection