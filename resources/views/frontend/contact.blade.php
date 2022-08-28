@extends('frontend.layouts.app')

@section('content')

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>Contact</h2>
      <ol>
        <li><a href="{{ route('customer.index') }}">Home</a></li>
        <li>Contact</li>
      </ol>
    </div>

  </div>
</section><!-- End Breadcrumbs -->
<!--  -->
<!-- ======= Contact Section ======= -->


<section id="contact" class="contact">
  <div class="container">
    <div class="section-tit">
      <h2>Send Your Feedback</h2>
    </div>

    <div class="row justify-content-center" data-aos="fade-up">

      <div class="col-lg-10">

        <div class="info-wrap">
          <div class="row">
            <div class="col-lg-4 info">
              <i class="bi bi-geo-alt"></i>
              <h4>Location:</h4>
              <p>{{$setting->address_1}}<br>{{$setting->address_2}}</p>
            </div>

            <div class="col-lg-4 info mt-4 mt-lg-0">
              <i class="bi bi-envelope"></i>
              <h4>Email:</h4>
              <p>{{$setting->contact_email}}<br>{{$setting->contact_email2}}</p>
            </div>

            <div class="col-lg-4 info mt-4 mt-lg-0">
              <i class="bi bi-phone"></i>
              <h4>Call:</h4>
              <p>+977 {{$setting->contact_phone}}<br>+977 {{$setting->contact_phone2}}</p>
            </div>
          </div>
        </div>

      </div>

    </div>

    <div class="row mt-5 justify-content-center" data-aos="fade-up">
      <div class="col-lg-10">
        <form action="{{ route('customer.contact-us.store') }}" method="post" class="form">
          @csrf
          <div class="row">
            <div class="col-md-6 form-group">
              <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
            </div>
            <div class="col-md-6 form-group">
              <input type="phone" name="phone" class="form-control" id="phone" placeholder="Phone" required>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <input type="company" class="form-control" name="company" id="company" placeholder="Company" required>
            </div>
          </div>
          <div class="form-group mt-3">
            <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
          </div>
          <div class="text-center"><button type="submit">Send Message</button></div>
        </form>
      </div>

    </div>

  </div>
</section><!-- End Contact Section -->
<div class="map-section">
  <iframe style="border:0; width: 100%; height: 350px;" src="https://maps.google.com/maps?q=kathmandu&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" allowfullscreen></iframe>
</div>

@endsection