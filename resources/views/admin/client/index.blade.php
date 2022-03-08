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
                    <a href="{{ route($_base_route.'.create') }}" class="btn btn-success btn-xs"><i class="fa fa-plus"> Create Clients</i></a>
                </div>
                <table class="table table-bordered table-striped" id="staffTable">
                    <thead>
                        <tr role="row">
                            <th style="width: 20px">#</th>
                            <th style="width: 150px">Title</th>
                            <th style="width: 150px">URL</th>
                            <th style="width: 20px">Image</th>
                            <th style="width: 20px">Status</th>
                            <th style="width: 20px">Action</th>
                            </tr>
                    </thead>
                    @foreach($client as $clie)
                        <tbody role="alert" aria-live="polite" aria-relevant="all">
                            <tr>
                                <td>{{$clie->id}}</td>
                                <td>{{$clie->title}}</td>
                                <td>{{$clie->url}}</td>
                                <td>
                                    <img src="{{ asset('image/client/'.$clie->image) }}" alt="" height="100" width="100">
                                </td>
                                <td width="25px" class="hidden-phone ">
                                    @if($clie->status == "1")
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
                                    <a href="{{ route($_base_route.'.edit',$clie->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
                                    <a href="{{ route($_base_route.'.delete',$clie->id) }}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash-o"></i></a>
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
            $('#staffTable').DataTable();
        } );
    </script>
@endpush

<!-- contd.... -->