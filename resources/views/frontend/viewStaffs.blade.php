@extends('frontend.layouts.app')

@section('content')
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

    <div class="d-flex justify-content-between align-items-center">
        <h2></h2>
        <ol>
            <li><a href="{{ route('customer.index') }}">Home</a></li>
            <li>Board</li>
            <li>{{$staffs->name}}</li>
        </ol>
    </div>

    </div>
</section>
       
          <section id="about-us" class="about-us">
            <div class="container" data-aos="fade-up">

                <div class="row content">
                
                <div class="col-lg-12 pt-4 pt-lg-0" data-aos="fade-left">
                    <div class="entry-image">
                        <img src="{{ asset('image/staff/'.$staffs->image) }}" alt="{{$staffs->name}}" style="width: 500px; height: 500px;">
                    </div>
                    <div class="col-lg-6" data-aos="fade-right">
                        <h2>{{$staffs->name}}</h2>
                        <h3>{{$staffs->designation}}</h3>
                    </div>
                    <p>
                    {!! $staffs->description !!}
                   
                    </p>
                </div>
                </div>

            </div>
        </section>

    

@endsection