@extends('admin.layouts.app')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <div class="row state-overview">
                    <div class="col-lg-3 col-sm-6">
                        <section class="panel">
                            <div class="symbol terques">
                                <i class="fa fa-user"></i>
                            </div>
                            <div class="value">
                                <h1 class="">
                                {{ count($users) }}
                                </h1>
                                <p>Users</p>
                            </div>
                        </section>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <section class="panel">
                            <div class="symbol red">
                                <i class="fa fa-book"></i>
                            </div>
                            <div class="value">
                                <h1 class="">
                                {{ count($pages) }}
                                </h1>
                                <p>Page</p>
                            </div>
                        </section>
                    </div>
                    
                    <div class="col-lg-3 col-sm-6">
                        <section class="panel">
                            <div class="symbol yellow">
                                <i class="fa fa-file-o"></i>
                            </div>
                            <div class="value">
                                <h1 class="">
                                {{ count($posts) }}
                                </h1>
                                <p>Posts</p>
                            </div>
                        </section>
                    </div>
                
                    <div class="col-lg-3 col-sm-6 pull-right">
                        <section class="panel">
                            <div class="symbol blue">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <div class="value">
                                <h4 class="">
                                    {{ date('Y-m-d') }}
                                </h4>
                                 <p>Today's Date</p>
                            </div>
                        </section>
                    </div>
                   
                </div>
                <!--state overview end-->

            
            <!-- page end-->
        </section>
    </div>
</div>

@endsection