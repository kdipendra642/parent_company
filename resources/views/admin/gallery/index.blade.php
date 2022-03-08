@extends('admin.layouts.app')

@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
@endsection

@section('content')

@include('admin.common.flash_message')

<div class="row">
    <div class="col-sm-12">
       <section class="panel">
            <header class="panel-heading">
            {{ $_panel }}
            </header>
            <div class="panel-body">
                <div class="btn-group">
                    <a href="{{ route($_base_route.'.create') }}" class="btn btn-success btn-xs"><i class="fa fa-plus"> Create Gallery</i></a>
                </div>
                <ul class="grid cs-style-3">
                    @foreach($gallery as $img)
                        <li>
                            <figure>
                                <img class="" src="{{ asset('storage/image/gallery/'.$img->image) }}" alt="" width="300px" height="300px">
                                <a href="{{ route('admin.gallery.delete',$img->id) }}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash-o"></i> Delete Picture</a>
                            </figure>
                        </li>
                    @endforeach
                    </ul>
          </div>
       </section>
    </div>
</div>

@endsection