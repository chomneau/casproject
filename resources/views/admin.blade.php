@extends('layouts.app') 
@section('content')
    @include('user.headBlank')
<div class="container" style="margin-top: 1em">
    <div class="row">
        {{--
        <div class="col-md-3 pull-left">--}} {{--
    @include('admin.adminSidebar')--}} {{--
        </div>--}}

        <div class="col-md-12">
    @include('admin.post-job-form')
        </div>
    @include('inc.logoSlider')


    </div>
</div>
@endsection