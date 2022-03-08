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
                <form class=" form-horizontal" method="POST" action="{{ route('admin.settings.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group ">
                        <label for="image" class="control-label col-lg-2">Favicon</label>
                        <div class="col-lg-10">
                            <input class=" form-control" type="file" id="image" name="favicon" accept="image/png, image/gif, image/jpeg" onchange="previewImage(this)">
                            <img id="previewImg" src="" alt="" style="max-width: 130px; margin-top: 20px;">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="image" class="control-label col-lg-2">Logo</label>
                        <div class="col-lg-10">
                            <input class=" form-control" type="file" id="image" name="logo" accept="image/png, image/gif, image/jpeg" onchange="previewImage(this)">
                            <img id="previewImg" src="" style="max-width: 130px; margin-top: 20px;">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="name" class="control-label col-lg-2">Site Name</label>
                        <div class="col-lg-10">
                            <input class=" form-control" type="text" id="name" name="site_name" value="">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="slogan" class="control-label col-lg-2">Site Title</label>
                        <div class="col-lg-10">
                            <input class=" form-control" type="text" id="slogan" name="site_title" value="">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="control-label col-lg-2">Site Description</label>
                        <div class="col-lg-10">
                            <textarea class=" form-control" name="site_description" id="article-ckeditor"></textarea>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="meta" class="control-label col-lg-2">Enter Meta Keyword</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="meta_title" id="tags"  data-role="tagsinput" value="">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="slogan" class="control-label col-lg-2">About Title</label>
                        <div class="col-lg-10">
                            <input class=" form-control" type="text" id="slogan" name="about_title" value="">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="slogan" class="control-label col-lg-2">About Sub-Title</label>
                        <div class="col-lg-10">
                            <input class=" form-control" type="text" id="slogan" name="about_sub_title" value="">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="image" class="control-label col-lg-2">About Image</label>
                        <div class="col-lg-10">
                            <input class=" form-control" type="file" id="image" name="about_image" accept="image/png, image/gif, image/jpeg" onchange="previewImage(this)">
                            <img id="previewImg" src="" style="max-width: 130px; margin-top: 20px;">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="control-label col-lg-2">About Description</label>
                        <div class="col-lg-10">
                            <textarea class=" form-control" name="about_description" id="article-ckeditor-about"></textarea>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="slogan" class="control-label col-lg-2">Facebook</label>
                        <div class="col-lg-10">
                            <input class=" form-control" type="text" id="slogan" name="social_profile_fb" value="">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="slogan" class="control-label col-lg-2">Instagram</label>
                        <div class="col-lg-10">
                            <input class=" form-control" type="text" id="slogan" name="social_profile_insta" value="">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="slogan" class="control-label col-lg-2">Youtube</label>
                        <div class="col-lg-10">
                            <input class=" form-control" type="text" id="slogan" name="social_profile_youtube" value="">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="slogan" class="control-label col-lg-2">Twitter</label>
                        <div class="col-lg-10">
                            <input class=" form-control" type="text" id="slogan" name="social_profile_twitter" value="">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="slogan" class="control-label col-lg-2">Linkedin</label>
                        <div class="col-lg-10">
                            <input class=" form-control" type="text" id="slogan" name="social_profile_linkedin" value="">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="slogan" class="control-label col-lg-2">Contact Title</label>
                        <div class="col-lg-10">
                            <input class=" form-control" type="text" id="slogan" name="contact_title" value="">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="slogan" class="control-label col-lg-2">Contact Number</label>
                        <div class="col-lg-10">
                            <input class=" form-control" type="number" id="slogan" name="contact_phone" value="">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="slogan" class="control-label col-lg-2">Contact Number Alternative</label>
                        <div class="col-lg-10">
                            <input class=" form-control" type="number" id="slogan" name="contact_phone2" value="">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="slogan" class="control-label col-lg-2">Contact Email</label>
                        <div class="col-lg-10">
                            <input class=" form-control" type="email" id="slogan" name="contact_email" value="">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="slogan" class="control-label col-lg-2">Contact Email 2</label>
                        <div class="col-lg-10">
                            <input class=" form-control" type="email" id="slogan" name="contact_email2" value="">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="slogan" class="control-label col-lg-2">Address Title</label>
                        <div class="col-lg-10">
                            <input class=" form-control" type="text" id="slogan" name="address_title" value="">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="slogan" class="control-label col-lg-2">Address 1</label>
                        <div class="col-lg-10">
                            <input class=" form-control" type="text" id="slogan" name="address_1" value="">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="slogan" class="control-label col-lg-2">Address 2</label>
                        <div class="col-lg-10">
                            <input class=" form-control" type="text" id="slogan" name="address_2" value="">
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

