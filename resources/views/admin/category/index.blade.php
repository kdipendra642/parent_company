@extends('admin.layouts.app')

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
                <table class="display table table-bordered table-striped dataTable" id="dynamic-table" aria-describedby="dynamic-table_info">
                    <thead>
                        <tr role="row">
                            <th>Title</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @foreach($category as $cat)
                    <tbody>
                        <tr>
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