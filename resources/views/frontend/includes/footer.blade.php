<!-- ======= Footer ======= -->
<footer id="footer">

<div class="footer-top">
  <div class="container">
    <div class="row">

      <div class="col-lg-3 col-md-6 footer-contact">
        <h3>{{$setting->site_name}}</h3>
        <p>
            {{$setting->contact_title}}
            <br>
            {{$setting->address_1}}
           <br><br>
          <strong>Phone:</strong> +977 {{$setting->contact_phone}}<br>
          <strong>Email:</strong> {{$setting->contact_email}}<br>
        </p>
      </div>

      <div class="col-lg-2 col-md-6 footer-links">
        <h4>Useful Links</h4>
        <ul>
          <li><i class="bx bx-chevron-right"></i> <a href="{{route('customer.index')}}">Home</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="{{route('customer.about-us')}}">About us</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="{{route('customer.news')}}">News And Events</a></li>
        </ul>
      </div>

      <div class="col-lg-3 col-md-6 footer-links">
        <h4>Our Latest Projects</h4>
        <ul>
        @foreach($footerPosts as $posts)
             <li><i class="bx bx-chevron-right"></i> <a href="{{ route('customer.view-posts', $posts->slug) }}">{{$posts->title}}</a></li>
          @endforeach
        </ul>
      </div>

      <div class="col-lg-4 col-md-6 footer-newsletter">
        <h4>Want To Know More About Us ?</h4>
        <p>Feel Free To Leave Us Message</p>
        <br>
        <p>
            <a href="{{ route('customer.contact') }}">Contact Us</a>
        </p>
        
      </div>

    </div>
  </div>
</div>

<div class="container d-md-flex py-4">

  <div class="me-md-auto text-center text-md-start">
    <div class="copyright">
      &copy; Copyright <strong><span>{{$setting->site_name}}</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      Designed and Developed by <a href="#">Prabidhi Enterprise</a>
    </div>
  </div>
  <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="{{$setting->social_profile_twitter}}" class="twitter" target="_blank"><i class="bu bi-twitter"></i></a>
        <a href="{{$setting->social_profile_fb}}" class="facebook" target="_blank"><i class="bu bi-facebook"></i></a>
        <a href="{{$setting->social_profile_insta}}" class="instagram" target="_blank"><i class="bu bi-instagram"></i></a>
        <a href="{{$setting->social_profile_linkedin}}" class="linkedin" target="_blank"><i class="bu bi-linkedin"></i></i></a>
  </div>
</div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
  class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{ asset('frontend/assets/vendor/aos/aos.js')}}"></script>
<script src="{{ asset('frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('frontend/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
<script src="{{ asset('frontend/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
<script src="{{ asset('frontend/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{ asset('frontend/assets/vendor/waypoints/noframework.waypoints.js')}}"></script>
<script src="{{ asset('frontend/assets/vendor/php-email-form/validate.js')}}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('frontend/assets/js/main.js')}}"></script>

</body>

</html>