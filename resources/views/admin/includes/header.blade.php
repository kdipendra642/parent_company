<header class="header white-bg">
    <div class="sidebar-toggle-box">
        <i class="fa fa-bars"></i>
    </div>
<!--logo start-->
<a href="#" class="logo">Dashboard</span></a>
<!--logo end-->
<div class="nav notify-row" id="top_menu">
            <!--  notification start -->
            <ul class="nav top-menu">
                <!-- settings start -->
                <li class="">
                    <a href="{{ route('customer.index')}}" target="_blank">
                        <i class="fa fa-home"></i>
                        <span class="">View Site</span>
                    </a>
                </li>
                                <!-- inbox dropdown start-->
                <li class="">
                    <a href="{{ route('admin.contact') }}">
                        <i class="fa fa-envelope-o"></i>
                        <span class="badge bg-important">0 </span>
                    </a>
                </li>
                <!-- inbox dropdown end -->
                
                                <!-- inbox dropdown start-->
                <li class="">
                    <a href="{{ route('admin.gallery') }}">
                        <i class="fa fa-picture-o"></i>
                        <span class="badge bg-important">0 </span>
                    </a>
                </li>
                <!-- inbox dropdown end -->
                <li class="">
                    <ol class="breadcrumb" style="padding: 3px 15px;">
                        <li>
                            <a href="#">
                                <i class="fa fa-home">&nbsp;</i>
                            </a> 
                        </li>               
                             <li>Dashboard</li>
                    </ol>

                </li>
            </ul>
        </div>
    <div class="top-nav ">
        <!-- user info start-->
        <ul class="nav pull-right top-menu">
            <!-- user login dropdown start-->
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <img alt="" src="img/avatar1_small.jpg">
                    <span class="username">{{ Auth::user()->name }}</span>
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu extended logout">
                    <div class="log-arrow-up"></div>
                    <li><a href="{{ route('admin.register.show', Auth::user()->id) }}"><i class=" fa fa-suitcase"></i>Profile</a></li>
                    
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();"><i class="fa fa-key"></i> {{ __('Logout') }}</a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </ul>
            </li>
            <!-- user login dropdown end -->
        </ul>
        <!--search & user info end-->
    </div>
</header>
<!--header end-->