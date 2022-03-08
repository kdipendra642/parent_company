@extends('frontend.layouts.app')

@section('content')
<section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Board Of Directors</h2>
          <ol>
            <li><a href="{{ route('customer.index') }}">Home</a></li>
            <li>Board Of Directors</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

     <!-- ======= Our Team Section ======= -->
     <section id="team" class="team section-bg">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Our <strong>Team</strong></h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">

        @foreach($staffs as $staff)
            <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                <a href="{{ route('customer.view-staffs', $staff->slug) }}">
                    <div class="member" data-aos="fade-up">
                        <div class="member-img">
                            <img src="{{ asset('image/staff/'.$staff->image)}}" class="img-fluid" alt="{{$staff->name}}" style="height: 300px; width: 100%;">
                        </div>
                        <div class="member-info">
                            <h4>{{$staff->name}}</h4>
                            <span>{{$staff->designation}}</span>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach

        </div>

      </div>
    </section><!-- End Our Team Section -->
@endsection