@include('frontend.includes.header')
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

        <a href="{{route('customer.index')}}" class="logo me-auto">
            <img src="{{ asset('image/sitesettings/'.$setting->logo)}}" alt="{{$setting->site_name}}" >
        </a>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      <nav id="navbar" class="navbar order-last order-lg-0">
          <!-- navbar goes here -->
          @include('frontend.includes.navbar')
      </nav><!-- .navbar -->

      <div class="header-social-links d-flex">
        <a href="{{$setting->social_profile_twitter}}" class="twitter" target="_blank"><i class="bu bi-twitter"></i></a>
        <a href="{{$setting->social_profile_fb}}" class="facebook" target="_blank"><i class="bu bi-facebook"></i></a>
        <a href="{{$setting->social_profile_insta}}" class="instagram" target="_blank"><i class="bu bi-instagram"></i></a>
        <a href="{{$setting->social_profile_linkedin}}" class="linkedin" target="_blank"><i class="bu bi-linkedin"></i></i></a>
      </div>

    </div>
  </header><!-- End Header -->


  


        @yield('content')
        <!--Main Footer-->
        
@include('frontend.includes.footer')

<!-- new cms -->


  <!-- ======= Header ======= -->
  




  

  