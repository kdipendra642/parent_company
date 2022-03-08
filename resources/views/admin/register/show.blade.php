@extends('admin.layouts.app')
@section('content')
<section class="wrapper">
            <!-- page start-->
<div class="row">
    <aside class="profile-nav col-lg-3">
    <section class="panel">
        <div class="user-heading round">
             
                <a href="#">
                    <img alt="" src="https://kathmandu.edcu.gov.np/assets/dcms/img/lochan.png">
                </a>
                        <h1>{{Auth::user()->name}}</h1>
            <p>{{Auth::user()->email}}</p>
        </div>

        <ul class="nav nav-pills nav-stacked">
            <li class="active"><a href="#"> <i class="fa fa-user"></i> Profile</a></li>
        </ul>

    </section>
</aside>    <aside class="profile-info col-lg-9">
        <section class="panel">
            <div class="bio-graph-heading">
            {{Auth::user()->name}}'s Profile
            </div>
            <div class="panel-body bio-graph-info">
                <h1>Bio Graph</h1>
                <div class="row">
                    <div class="bio-row">
                        <p><span>Name </span>: {{Auth::user()->name}}</p>
                    </div>
                    <div class="bio-row">
                        <p><span>Email </span>:{{Auth::user()->email}}</p>
                    </div>
                    <div class="bio-row">
                        <p><span>Phone </span>:{{Auth::user()->phone}} </p>
                    </div>
                   
                </div>
            </div>
        </section>
    </aside>
</div>
<!-- page end-->

          </section>
          @endsection