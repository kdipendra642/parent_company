<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from thevectorlab.net/flatlab/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 08 Jan 2019 05:29:03 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.html">

    <title>DCMS</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('backend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('backend/css/bootstrap-reset.css')}}" rel="stylesheet">
    <!--external css-->
    <link href="{{ asset('backend/assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />

    <!--dynamic table-->
    <link href="{{ asset('backend/assets/advanced-datatable/media/css/demo_page.css')}}" rel="stylesheet" />
    <link href="{{ asset('backend/assets/advanced-datatable/media/css/demo_table.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('backend/assets/data-tables/DT_bootstrap.css')}}" />

    <!--right slidebar-->
    <link href="{{ asset('backend/css/slidebars.css')}}" rel="stylesheet">

    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/gallery.css')}}" /> -->

    <!-- Custom styles for this template -->

    <link href="{{ asset('backend/css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('backend/css/style-responsive.css')}}" rel="stylesheet" />


    <!-- Tags input -->
    <!-- <link rel="stylesheet" href="{{ asset('css/bootstrap-tagsinput.css') }}"> -->


    <!-- Toaster -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    @yield('css')

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <section id="container">
        <!--header start-->
        @include('admin.includes.header')

        <!--sidebar start-->
        <aside>
            @include('admin.includes.sidebar')
        </aside>
        <!--sidebar end-->
        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">

                @yield('content')

            </section>
        </section>
        <!--main content end-->


        <!--footer start-->
        <footer class="site-footer">
            <div class="text-center">
                {{ date('Y') }} &copy; .
            </div>
        </footer>
        <!--footer end-->
    </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{ asset('backend/js/jquery.js')}}"></script>
    <script src="{{ asset('backend/js/jquery-ui-1.9.2.custom.min.js')}}"></script>
    <script src="{{ asset('backend/js/jquery-migrate-1.2.1.min.js')}}"></script>
    <script src="{{ asset('backend/js/bootstrap.min.js')}}"></script>
    <script class="include" type="text/javascript" src="{{ asset('backend/js/jquery.dcjqaccordion.2.7.js')}}"></script>
    <script src="{{ asset('backend/js/jquery.scrollTo.min.js')}}"></script>
    <script src="{{ asset('backend/js/jquery.nicescroll.js')}}" type="text/javascript"></script>


    <!-- datatable -->
    <script type="text/javascript" language="javascript" src="{{ asset('backend/assets/advanced-datatable/media/js/jquery.dataTables.js')}}"></script>
    <script type="text/javascript" src="{{ asset('backend/assets/data-tables/DT_bootstrap.js')}}"></script>
    <script src="{{ asset('backend/js/respond.min.js')}}"></script>

    <!--right slidebar-->
    <script src="{{ asset('backend/js/slidebars.min.js')}}"></script>

    <script src="{{ asset('backend/js/dynamic_table_init.js')}}"></script>

    <!--common script for all pages-->
    <script src="{{ asset('backend/js/common-scripts.js')}}"></script>

    <!-- script for this page -->
    <!-- <script src="{{ asset('backend/js/sparkline-chart.js')}}"></script>
    <script src="{{ asset('backend/js/easy-pie-chart.js')}}"></script>
    <script src="{{ asset('backend/js/count.js')}}"></script> -->

    <!--Tags Input  -->
    <!-- <script type="text/javascript" src="{{ asset('js/typeahead.bundle.js')}}"></script> -->

    <!-- <script type="text/javascript" src="{{ asset('js/bootstrap-tagsinput.js')}}"></script> -->


    <!-- Toastr -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @if(Session::has('success_message'))
    <script>
        toastr.success("{!! Session::get('success_message') !!}");
    </script>
    @endif
    @if(Session::has('updated_message'))
    <script>
        toastr.info("{!! Session::get('updated_message') !!}");
    </script>
    @endif
    @if(Session::has('delete_message'))
    <script>
        toastr.warning("{!! Session::get('delete_message') !!}");
    </script>
    @endif

    @stack('scripts')


</body>

<!-- Mirrored from thevectorlab.net/flatlab/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 08 Jan 2019 05:29:54 GMT -->

</html>