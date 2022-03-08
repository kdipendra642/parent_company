@extends('frontend.layouts.app')

@section('content')
<!--  -->
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>News</h2>
          <ol>
            <li><a href="{{ route('customer.index') }}">Home</a></li>
            <li>News</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8 entries">
          @foreach($page as $pages)

            <article class="entry">

              <div class="entry-img">
                <img src="{{ asset('image/pages/'.$pages->cover)}}" alt="{{$pages->title}}" class="img-fluid" style="width: 100%">
              </div>

              <h2 class="entry-title">
                <a href="{{ route('customer.view-pages', $pages->slug) }}">{{$pages->title}}</a>
              </h2>


              <div class="entry-content">
                <p>{!! str_limit($pages->description, 200) !!}
                </p>
                <div class="read-more">
                  <a href="{{ route('customer.view-pages', $pages->slug) }}">Read More</a>
                </div>
              </div>

            </article><!-- End blog entry -->
            @endforeach

          </div><!-- End blog entries list -->

          <div class="col-lg-4">

            <div class="sidebar">

              <h3 class="sidebar-title">Categories</h3>
              <div class="sidebar-item categories">
                <ul>
                  @foreach($cate as $category)
                  <li><a href="#">{{$category->title}} </a></li>
                  @endforeach
                </ul>
              </div><!-- End sidebar categories-->

              <h3 class="sidebar-title">Gallery Image</h3>
              <div class="sidebar-item tags">
                <ul>
                @foreach($galery as $gallery)
                  <li><img src="{{ asset('storage/image/gallery/'.$gallery->image) }}" alt="" style="width: 75px; height: 75px; margin-top: 5px;"></li>
                @endforeach
                </ul>
                <div class="read-more">
                  <a href="{{ route('customer.gallery') }}">View Gallery</a>
                </div>
              </div><!-- End sidebar tags-->

            </div><!-- End sidebar -->

            </div><!-- End blog sidebar -->

        </div>

      </div>
    </section><!-- End Blog Section -->

@endsection