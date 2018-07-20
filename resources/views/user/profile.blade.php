
@extends('layouts.app')
@include('layouts.sectionstyle')
@section('content')
    @include('user.headBlank')

    <div class="bootstrap-iso">
    <div class="container" style="margin-top: 1em">
        <div class="row">
            <div class="col-md-3 pull-left">
                @include('user.userSidebar')
            </div>

            <div class="col-md-9 pull-right">
                @include('user.editprofile')
            </div>

            {{-- @include('inc.logoSlider') --}}

        </div>
    </div>
</div>
@endsection

@section('scripts')
    {{--<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>--}}
    {{--<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>--}}
    {{--<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script>--}}

    {{--<script>--}}
        {{--$(document).ready(function() {--}}
            {{--$('#content').summernote();--}}
        {{--});--}}
    {{--</script>--}}



@endsection




{{--date picker--}}

{{--<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>--}}
{{--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>--}}
{{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.css">--}}
{{--<!-- Special version of Bootstrap that only affects content wrapped in .bootstrap-iso -->--}}
{{--<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />--}}

{{--<!--Font Awesome (added because you use icons in your prepend/append)-->--}}
{{--<link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />--}}

{{--<!-- Inline CSS based on choices in "Settings" tab -->--}}
{{--<style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;}</style>--}}
{{--<script>--}}
    {{--$(document).ready(function(){--}}
        {{--var date_input=$('input[name="date"]'); //our date input has the name "date"--}}
        {{--var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";--}}
        {{--var options={--}}
            {{--format: 'mm/dd/yyyy',--}}
            {{--container: container,--}}
            {{--todayHighlight: true,--}}
            {{--autoclose: true,--}}
        {{--};--}}
        {{--date_input.datepicker(options);--}}
    {{--})--}}
{{--</script>--}}


{{--<!-- HTML Form (wrapped in a .bootstrap-iso div) -->--}}
{{--<div class="bootstrap-iso">--}}
    {{--<div class="container-fluid">--}}
        {{--<div class="row">--}}
            {{--<div class="col-md-6 col-sm-6 col-xs-12">--}}
                {{--<form method="post">--}}
                    {{--<div class="form-group form-group-sm">--}}
                        {{--<label class="control-label requiredField" for="date">--}}
                            {{--Date--}}
                            {{--<span class="asteriskField">--}}
        {{--*--}}
       {{--</span>--}}
                        {{--</label>--}}
                        {{--<div class="input-group">--}}
                            {{--<input class="form-control" id="date" name="date" placeholder="MM/DD/YYYY" type="text"/>--}}
                            {{--<div class="input-group-addon">--}}
                                {{--<i class="fa fa-calendar">--}}
                                {{--</i>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                {{--</form>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}





