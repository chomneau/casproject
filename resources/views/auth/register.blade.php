
@extends('admin.admin-layout.main')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">

            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default" >
                        <div class="panel-heading text-center" style="background-color: #1CE1E8; font-size: 18px;" >Register Student</div>

                        <div class="panel-body" style="margin-top: 2em">
                            <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">First Name</label>

                                    <div class="col-md-6">
                                        <input id="firstName" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label">Last Name</label>

                                    <div class="col-md-6">
                                        <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-4 control-label">Student ID</label>

                                    <div class="col-md-6">
                                        <input id="password" type="text" class="form-control" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password-confirm" class="col-md-4 control-label">Confirm student ID</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="text" class="form-control" name="password_confirmation" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            <strong><i class="fa fa-user-plus" aria-hidden="true"></i></strong>  Register
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- /page content -->

@endsection

{{--@extends('admin.admin-layout.main')--}}
{{--@section('content')--}}
    {{--<!-- page content -->--}}
    {{--<div class="right_col" role="main">--}}
        {{--<div class="">--}}

            {{--<div class="clearfix"></div>--}}
            {{--<div class="row">--}}
                {{--<div class="col-md-10 col-md-offset-1">--}}
                    {{--<div class="panel panel-default" >--}}
                        {{--<div class="panel-heading" style="background-color: #1CE1E8" >Register</div>--}}

                        {{--<div class="panel-body" style="margin-top: 2em">--}}
                            {{--<form class="form-horizontal" method="POST" action="{{ route('register') }}">--}}
                                {{--{{ csrf_field() }}--}}

                                {{--<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">--}}
                                    {{--<label for="name" class="col-md-4 control-label">Name</label>--}}

                                    {{--<div class="col-md-6">--}}
                                        {{--<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>--}}

                                        {{--@if ($errors->has('name'))--}}
                                            {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('name') }}</strong>--}}
                                    {{--</span>--}}
                                        {{--@endif--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                                {{--<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">--}}
                                    {{--<label for="email" class="col-md-4 control-label">E-Mail Address</label>--}}

                                    {{--<div class="col-md-6">--}}
                                        {{--<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>--}}

                                        {{--@if ($errors->has('email'))--}}
                                            {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('email') }}</strong>--}}
                                    {{--</span>--}}
                                        {{--@endif--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                                {{--<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">--}}
                                    {{--<label for="password" class="col-md-4 control-label">Password</label>--}}

                                    {{--<div class="col-md-6">--}}
                                        {{--<input id="password" type="password" class="form-control" name="password" required>--}}

                                        {{--@if ($errors->has('password'))--}}
                                            {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('password') }}</strong>--}}
                                    {{--</span>--}}
                                        {{--@endif--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                                {{--<div class="form-group">--}}
                                    {{--<label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>--}}

                                    {{--<div class="col-md-6">--}}
                                        {{--<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                                {{--<div class="form-group">--}}
                                    {{--<div class="col-md-6 col-md-offset-4">--}}
                                        {{--<button type="submit" class="btnSubmit">--}}
                                            {{--<strong><i class="fa fa-user-plus" aria-hidden="true"></i></strong>  Register--}}
                                        {{--</button>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</form>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}

        {{--</div>--}}
    {{--</div>--}}

    {{--<!-- /page content -->--}}

{{--@endsection--}}
