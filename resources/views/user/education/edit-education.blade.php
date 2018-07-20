@extends('layouts.app')

@section('content')
    @include('user.headBlank')
    <div class="container" style="margin-top: 1em">
        <div class="col-md-3 col-lg-3 pull-left">
            @include('user.userSidebar')
        </div>

        <div class="col-md-9 pull-right">
            {{--@include('inc.message')--}}
            @include('user.education.form-edit')
        </div>

    </div>
    </div>

@endsection
