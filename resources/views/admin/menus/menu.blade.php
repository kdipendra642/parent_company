@extends('admin.layouts.app')
@section('content')

@include('admin.common.flash_message')
<div class="row">
    <div class="col-sm-12">
       <section class="panel">
            <header class="panel-heading">
                Menus
            </header>
            <div class="panel-body">
                {!! Menu::render() !!}
            </div>
        </section>
    </div>
</div>
@endsection

@push('scripts')
    {!! Menu::scripts() !!}
@endpush
