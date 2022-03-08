@extends('admin.layouts.app')

@section('content')

<div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
            <section class="panel">
                <header class="panel-heading">
                    <h3>Users</h3>
                </header>
                <div class="panel-body">
                    <div class="btn-group">
                    <a href="{{ route('admin.register') }}" class="btn btn-info btn-xs"><i class="fa fa-arrow-left"> Back</i></a>
                </div>    
                <br>
                <br>                    
                <div class=" form">
                    <form class="form-horizontal" method="POST" action="{{route('admin.register.update',$users->id)}}">
                        @csrf
                        <div class="form-group ">
                            <label for="name" class="control-label col-lg-2">Name (<em style="color:red">*</em>)</label>
                            <div class="col-lg-10">
                                <input type="text" id="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $users->name }}">
                                @if ($errors->has('name'))
                                    <span class="help-block" style="color:red">
                                        * <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>         
                        <div class="form-group ">
                            <label for="name" class="control-label col-lg-2">Email (<em style="color:red">*</em>)</label>
                            <div class="col-lg-10">
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $users->email }}" >
                                @if ($errors->has('email'))
                                    <span class="help-block" style="color:red">
                                        * <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>  
                        <div class="form-group ">
                            <label for="name" class="control-label col-lg-2">Phone</label>
                            <div class="col-lg-10">
                            <input id="phone" type="phone" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ $users->phone }}" >
                                @if ($errors->has('phone'))
                                    <span class="help-block" style="color:red">
                                        * <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>   
                        <div class="form-group ">
                            <label for="name" class="control-label col-lg-2">Password (<em style="color:red">*</em>)</label>
                            <div class="col-lg-10">
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" >
                                @if ($errors->has('password'))
                                    <span class="help-block" style="color:red">
                                        * <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="name" class="control-label col-lg-2">Confirm Password (<em style="color:red">*</em>)</label>
                            <div class="col-lg-10">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" >
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block" style="color:red">
                                        * <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>                     
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <div class="pull-right">
                                    <input class="btn btn-danger" type="submit" value="Submit">
                                    <a href="{{ route('admin.register') }}" class="btn btn-default" type="button">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
<script>
        function previewImage(input) {
            var file = $("input[type=file]").get(0).files[0];
            if(file) {
                var reader = new FileReader();
                reader.onload = function() {
                    $('#previewImg').attr("src", reader.result);
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection