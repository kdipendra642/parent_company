@extends('frontend.layouts.app')

@section('content')
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

    <div class="d-flex justify-content-between align-items-center">
        <h2>{{$setting->site_title}}</h2>
        <ol>
            <li><a href="{{ route('customer.index') }}">Home</a></li>
            <li>Introduction</li>
        </ol>
    </div>

    </div>
</section>
  <!--End Page Title-->
  <section id="about-us" class="about-us">
            <div class="container" data-aos="fade-up">

                <div class="row content">
                    <div class="col-lg-6" data-aos="fade-right">
                            <h2>Introduction</h2>
                        </div>
                    <div class="col-lg-12 pt-4 pt-lg-0" data-aos="fade-left">
                        <div class="entry-image">
                            <img src="{{ asset('image/sitesettings/'.$setting->about_image) }}" alt="{{$setting->about_title}}" style="width: 100%;">
                        </div>
                        <div class="col-lg-6" data-aos="fade-right">
                            <h3>{{$setting->about_sub_title}}</h3>
                        </div>
                        <p>
                        {!! $setting->site_description !!}
                    
                        </p>
                    </div>
                    
                </div>

            </div>
        </section>


@endsection