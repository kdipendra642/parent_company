@extends('frontend.layouts.app')
@section('content')

           <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>{{$page->title}}</h2>
          <ol>
            <li><a href="{{ route('customer.index') }}">Home</a></li>
            <li><a href="{{route('customer.news')}}">Blog</a></li>
            <li>{{$page->title}}</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Single Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8 entries">

            <article class="entry entry-single">

              <div class="entry-img">
                <img src="assets/img/blog/blog-1.jpg" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href="#">{{$page->title}}</a>
              </h2>

              <div class="entry-content">
               
                <img src="{{ asset('image/pages/'.$page->cover)}}" class="img-fluid" alt="{{$page->title}}" style="width:100%;">

                <h3>{{$page->sub_title}}</h3>
                <p>
                    {!! $page->description !!}
                </p>
              </div>

              <div class="entry-content">
                <a href="{{$page->url}}" target="_blank">Know More.</a>
              </div>

            </article><!-- End blog entry -->

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

      </div>
    </section><!-- End Blog Single Section -->


@endsection