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
                Messages
            </header>
            <div class="panel-body">
                <!-- <div class="btn-group">
                    <a href="{{ route('admin.banner.create') }}" class="btn btn-success btn-xs"><i class="fa fa-plus"> Create Slider</i></a>
                </div> -->
                <table class="table table-bordered table-striped" id="sliderTable">
                    <thead>
                        <tr role="row">
                            <th >#</th>
                            <th >Name</th>
                            <th >Email</th>
                            <th >Phone</th>
                            <th >Message</th>
                            <th >Status</th>
                            <th >Action</th>
                            </tr>
                    </thead>
                    @foreach($contact as $con)
                        <tbody >
                            <tr class="gradeX odd" id="28">
                                <td>{{$con->id}}</td>
                                <td>{{$con->name}}</td>
                                <td>{{$con->email}}</td>
                                <td>{{$con->phone}}</td>
                                <td>{!! str_limit($con->message, 100) !!}</td>
                                <td width="25px" class="hidden-phone ">
                                    @if($con->status == "1")
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
                                        <a href="{{ route('admin.contact.edit',$con->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
                                        <a href="{{ route('admin.contact.delete',$con->id) }}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash-o"></i></a>
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