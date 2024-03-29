@extends('admin.layouts.app')

@section('content')

@include('admin.common.flash_message')
<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                Users
            </header>
            <div class="panel-body">
                <div class="btn-group">
                    <a href="{{ route('admin.register.create') }}" class="btn btn-success btn-xs"><i class="fa fa-plus"> Add User</i></a>
                </div>
                <table class="display table table-bordered table-striped dataTable" id="dynamic-table" aria-describedby="dynamic-table_info">
                    <thead>
                        <tr role="row">
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @foreach($users as $user)
                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                        <tr class="gradeX odd" id="28">
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->created_at}}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('admin.register.edit',$user->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
                                    <!-- <a href="{{ route('admin.register.delete',$user->id) }}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash-o"></i></a> -->
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