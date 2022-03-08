@extends('admin.layouts.app')

@section('content')

@include('admin.common.flash_message')
<div class="row">
    <div class="col-sm-12">
       <section class="panel">
            <header class="panel-heading">
                General Settings
            </header>
            <div class="panel-body">
                <form class=" form-horizontal" method="POST" action="{{ route('admin.settings.update',$general->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group ">
                        <label for="image" class="control-label col-lg-2">Favicon</label>
                        <div class="col-lg-10">
                            <input class=" form-control" type="file" id="image" name="favicon" accept="image/png, image/gif, image/jpeg" onchange="previewImage(this)">
                            <img id="previewImg" src="{{ asset('image/sitesettings/'.$general->favicon) }}" alt="" style="max-width: 130px; margin-top: 20px;">
                            
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="image" class="control-label col-lg-2">Logo</label>
                        <div class="col-lg-10">
                            <input class=" form-control" type="file" id="image" name="logo" accept="image/png, image/gif, image/jpeg" onchange="previewImage(this)">
                            <img id="previewImg" src="{{ asset('image/sitesettings/'.$general->logo) }}" style="max-width: 130px; margin-top: 20px;">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="name" class="control-label col-lg-2">Site Name</label>
                        <div class="col-lg-10">
                            <input class=" form-control" type="text" id="name" name="site_name" value="{{ $general->site_name }}">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="slogan" class="control-label col-lg-2">Site Title</label>
                        <div class="col-lg-10">
                            <input class=" form-control" type="text" id="slogan" name="site_title" value="{{ $general->site_title }}">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="control-label col-lg-2">Site Description</label>
                        <div class="col-lg-10">
                            <textarea class=" form-control" name="site_description" id="article-ckeditor">{{ $general->site_description }}</textarea>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="meta" class="control-label col-lg-2">Enter Meta Tags</label>
                        <div class="col-lg-10 ">
                            <input id="tags" type="text" class="form-control" name="meta_title"  value="{{ $general->meta_title}}" data-role="tagsinput">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="slogan" class="control-label col-lg-2">About Title</label>
                        <div class="col-lg-10">
                            <input class=" form-control" type="text" id="slogan" name="about_title" value="{{ $general->about_title}}">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="slogan" class="control-label col-lg-2">About Sub-Title</label>
                        <div class="col-lg-10">
                            <input class=" form-control" type="text" id="slogan" name="about_sub_title" value="{{ $general->about_sub_title}}">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="image" class="control-label col-lg-2">About Image</label>
                        <div class="col-lg-10">
                            <input class=" form-control" type="file" id="image" name="about_image" accept="image/png, image/gif, image/jpeg" onchange="previewImage(this)">
                            <img id="previewImg" src="{{ asset('image/sitesettings/'.$general->about_image) }}" style="max-width: 130px; margin-top: 20px;">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="control-label col-lg-2">About Description</label>
                        <div class="col-lg-10">
                            <textarea class=" form-control" name="about_description" id="article-ckeditor-about">{{ $general->about_description}}</textarea>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="slogan" class="control-label col-lg-2">Facebook</label>
                        <div class="col-lg-10">
                            <input class=" form-control" type="url" id="slogan" name="social_profile_fb" value="{{ $general->social_profile_fb}}">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="slogan" class="control-label col-lg-2">Instagram</label>
                        <div class="col-lg-10">
                            <input class=" form-control" type="url" id="slogan" name="social_profile_insta" value="{{ $general->social_profile_insta}}">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="slogan" class="control-label col-lg-2">Youtube</label>
                        <div class="col-lg-10">
                            <input class=" form-control" type="url" id="slogan" name="social_profile_youtube" value="{{ $general->social_profile_youtube}}">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="slogan" class="control-label col-lg-2">Twitter</label>
                        <div class="col-lg-10">
                            <input class=" form-control" type="url" id="slogan" name="social_profile_twitter" value="{{ $general->social_profile_twitter}}">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="slogan" class="control-label col-lg-2">Linkedin</label>
                        <div class="col-lg-10">
                            <input class=" form-control" type="url" id="slogan" name="social_profile_linkedin" value="{{ $general->social_profile_linkedin}}">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="slogan" class="control-label col-lg-2">Contact Title</label>
                        <div class="col-lg-10">
                            <input class=" form-control" type="text" id="slogan" name="contact_title" value="{{ $general->contact_title}}">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="slogan" class="control-label col-lg-2">Contact Number</label>
                        <div class="col-lg-10">
                            <input class=" form-control" type="number" id="slogan" name="contact_phone" value="{{ $general->contact_phone }}">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="slogan" class="control-label col-lg-2">Contact Number Alternative</label>
                        <div class="col-lg-10">
                            <input class=" form-control" type="number" id="slogan" name="contact_phone2" value="{{ $general->contact_phone2 }}">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="slogan" class="control-label col-lg-2">Contact Email</label>
                        <div class="col-lg-10">
                            <input class=" form-control" type="email" id="slogan" name="contact_email" value="{{ $general->contact_email }}">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="slogan" class="control-label col-lg-2">Contact Email 2</label>
                        <div class="col-lg-10">
                            <input class=" form-control" type="email" id="slogan" name="contact_email2" value="{{ $general->contact_email2 }}">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="slogan" class="control-label col-lg-2">Address Title</label>
                        <div class="col-lg-10">
                            <input class=" form-control" type="text" id="slogan" name="address_title" value="{{ $general->address_title }}">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="slogan" class="control-label col-lg-2">Address 1</label>
                        <div class="col-lg-10">
                            <input class=" form-control" type="text" id="slogan" name="address_1" value="{{ $general->address_1 }}">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="slogan" class="control-label col-lg-2">Address 2</label>
                        <div class="col-lg-10">
                            <input class=" form-control" type="text" id="slogan" name="address_2" value="{{ $general->address_2 }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <div class="pull-right">
                                <input class="btn btn-danger" type="submit" value="Submit">
                                <a href="{{ route('admin.settings') }}" class="btn btn-default" type="button">Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
       </section>
    </div>
</div>
    <script src="https://cdn.ckeditor.com/4.17.1/full/ckeditor.js"></script>

    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
    <script>
        CKEDITOR.replace( 'article-ckeditor-about' );
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
