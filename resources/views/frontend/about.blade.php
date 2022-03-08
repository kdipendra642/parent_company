@extends('frontend.layouts.app')

@section('content')
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

    <div class="d-flex justify-content-between align-items-center">
        <h2>{{$setting->site_title}}</h2>
        <ol>
            <li><a href="{{ route('customer.index') }}">Home</a></li>
            <li>About</li>
        </ol>
    </div>

    </div>
</section>
        
        <!--End Page Title-->
        <section id="about-us" class="about-us">
            <div class="container" data-aos="fade-up">

                <div class="row content">
                <div class="col-lg-6" data-aos="fade-right">
                    <h2>{{$setting->about_title}}</h2>
                    <h3>{{$setting->about_sub_title}}</h3>
                </div>
                <div class="col-lg-12 pt-4 pt-lg-0" data-aos="fade-left">
                    <div class="entry-image">
                        <img src="{{ asset('image/sitesettings/'.$setting->about_image) }}" alt="{{$setting->about_title}}" style="width: 100%;">
                    </div>
                    <p>
                    {!! $setting->about_description !!}
                   
                    </p>
                </div>
                </div>

            </div>
        </section>

        <!-- ======= Our Team Section ======= -->
    <section id="team" class="team section-bg">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Our <strong>Team</strong></h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">

            @foreach($staffs as $staff)
            <div class="col-lg-3 col-md-6 d-flex align-items-stretch" >
                <div class="member" data-aos="fade-up">
                    <div class="member-img">
                    <img src="{{ asset('image/staff/'.$staff->image)}}" class="img-fluid" alt="{{$staff->name}}" style="height: 300px; width: 100%;">
                    </div>
                    <div class="member-info">
                        <h4>{{$staff->name}}</h4>
                        <span>{{$staff->designation}}</span>
                    </div>
                </div>
            </div>
            @endforeach

        </div>

      </div>
    </section><!-- End Our Team Section -->

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
            </section>

       
@endsection