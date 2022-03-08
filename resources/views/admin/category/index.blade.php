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
                    <a href="{{ route($_base_route.'.create') }}" class="btn btn-success btn-xs"><i class="fa fa-plus"> Create Category</i></a>
                </div>
                <table class="table table-bordered table-striped" id="sliderTable">
                    <thead>
                        <tr role="row">
                            <th style="width:25px">#</th>
                            <th style="width:250px">Title</th>
                            <th >Description</th>
                            <th >Image</th>
                            <th >Status</th>
                            <th >Action</th>
                            </tr>
                    </thead>
                    @foreach($category as $cat)
                        <tbody>
                            <tr >
                                <td>{{$cat->id}}</td>
                                <td>{{$cat->title}}</td>
                                <td>{!! str_limit($cat->description, 150) !!}</td>
                                <td>
                                    <img src="{{ asset('image/category/'.$cat->image) }}" alt="" height="100" width="100">
                                </td>
                                <td width="25px" class="hidden-phone ">
                                    @if($cat->status == "1")
                                        <button class="btn btn-round btn-success btn-xs">
                                            <i class="fa fa-check"></i>
                                        </button>
                                        @else
                                        <button class="btn btn-round btn-danger btn-xs">
                                            <i class="fa fa-minus-circle"></i>
                                        </button>
                                    @endif
                                </td>
                                <td>
                                <div class="btn-group">
                                    <a href="{{ route($_base_route.'.edit',$cat->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
                                    <a href="{{ route($_base_route.'.delete',$cat->id) }}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash-o"></i></a>
                                </div>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>
          </div>
       </section>
    </div>
</div>

@endsection

@push('scripts')
    <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js" ></script>
    <script>
        $(document).ready( function () {
            $('#sliderTable').DataTable();
        } );
    </script>
@endpush