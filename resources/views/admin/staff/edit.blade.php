@extends('admin.layouts.app')

@section('content')

<div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
            <section class="panel">
                <header class="panel-heading">
                    <h3>{{ $_panel }}</h3>
                </header>
                <div class="panel-body">
                    <div class="btn-group">
                    <a href="{{ route($_base_route) }}" class="btn btn-info btn-xs"><i class="fa fa-arrow-left"> Back</i></a>
                </div>    
                <br>
                <br>                    
                <div class=" form">
                    <form class="form-horizontal" method="POST" action="{{route($_base_route.'.update',$staff->id)}}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-lg-8 col-md-8col-xs-8">
                            <section class="panel">
                                <div class="panel-body">
                                    <div class="form-group ">
                                        <label for="image" class="">Name</label>
                                        <input class=" form-control" type="text" id="name" name="name" value="{{ $staff->name }}">
                                        @if ($errors->has('name'))
                                            <span class="help-block" style="color:red">
                                                * <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    
                                    <div class="form-group ">
                                        <label for="image" class="">Description</label>
                                        <textarea class=" form-control" name="description" id="article-ckeditor">{{ $staff->description }}</textarea>
                                        @if ($errors->has('description'))
                                            <span class="help-block" style="color:red">
                                                * <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </section>
                        </div>
                        <div class="col-lg-4 col-md-4 col-xs-4">
                            <section class="panel">
                                <div class="panel-body">
                                    <div class="form-group ">
                                        <label for="image" class="">Designation</label>
                                        <input class=" form-control" type="text" id="designation" name="designation" value="{{ $staff->designation }}">
                                        @if ($errors->has('designation'))
                                            <span class="help-block" style="color:red">
                                                * <strong>{{ $errors->first('designation') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group ">
                                        <label for="image" class="">Staff Image</label>
                                        <input class=" form-control" type="file" id="image" name="image" accept="image/png, image/gif, image/jpeg" onchange="previewImage(this)" value="{{ $staff->image }}">
                                        <img id="previewImg" src="{{ asset('image/staff/'.$staff->image) }}" alt="" style="max-width: 130px; margin-top: 20px;">
                                        @if ($errors->has('image'))
                                            <span class="help-block" style="color:red">
                                                * <strong>{{ $errors->first('image') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group " >
                                        <label for="status" class="control-label col-lg-2">Status</label>
                                            <input type="checkbox"{{ $staff->status == "1" ? 'checked' : '' }} style="width: 20px; float:right; right:150px" class="checkbox form-control" id="status" name="status">
                                    </div>
                                    <div class="form-group " >
                                        <label for="status" class="control-label col-lg-2">Feature</label>
                                            <input type="checkbox"{{ $staff->feature == "1" ? 'checked' : '' }} style="width: 20px; float:right; right:150px" class="checkbox form-control" id="feature" name="feature">
                                    </div>
                                </div>
                            </section>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <div class="pull-right">
                                    <input class="btn btn-danger" type="submit" value="Submit">
                                    <a href="{{ route($_base_route) }}" class="btn btn-default" type="button">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>

    <!-- ck-editor -->
    <script src="https://cdn.ckeditor.com/4.17.1/full/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
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