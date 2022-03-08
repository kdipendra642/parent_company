@extends('admin.layouts.app')

@section('content')

<div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
            <section class="panel">
                <header class="panel-heading">
                    <h3>Messages</h3>
                </header>
                <div class="panel-body">
                    <div class="btn-group">
                    <a href="{{ route('admin.contact') }}" class="btn btn-info btn-xs"><i class="fa fa-arrow-left"> Back</i></a>
                </div>    
                <br>
                <br>     
                <div>
                        <span>Message from:</span>
                        <h3>
                            {{$contact->name}}
                        </h3>
                    </div>               
                <div class=" form">
                    <form class="form-horizontal" method="POST" action="{{route('admin.contact.update',$contact->id)}}">
                        @csrf
                        <div class="form-group ">
                            <label for="status" class="control-label col-lg-2">Mark as read</label>
                            <div class="col-lg-10 col-sm-10">
                                <input type="checkbox"{{ $contact->status == "1" ? 'checked' : '' }} style="width: 20px" class="checkbox form-control" id="status" name="status">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <div class="pull-right">
                                    <input class="btn btn-danger" type="submit" value="Submit">
                                    <a href="{{ route('admin.contact') }}" class="btn btn-default" type="button">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>

                    
                </div>
            </div>
        </section>
    </div>
</div>

@endsection