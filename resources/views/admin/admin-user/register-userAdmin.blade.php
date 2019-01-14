

@extends('admin.admin-layout.main')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">

            <div class="clearfix"></div>

            <div class="row">
                <form role="form" class="form-group" action="{{ route('admin.storeUser', ['id'=>Auth()->user()->id]) }}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="panel col-md-8 col-md-offset-2">
                        <div class="page-title">
                            <div class="text-center">
                                <h3>Create New Staff</h3>
                            </div>
                        </div>

                        <div class="container" style="margin-top: 1em">

                                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}" >
                                            <label for="name" class="col-md-6 col-md-offset-2 control-label">Name</label>
                                            <div class="col-md-8 col-md-offset-2" style="margin-bottom: 20px">
                                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Name" required autofocus>

                                                @if ($errors->has('name'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        {{--Email--}}
                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}" >
                                            <label for="email" class="col-md-8 col-md-offset-2 control-label">E-Mail Address</label>

                                            <div class="col-md-8 col-md-8 col-md-offset-2" style="margin-bottom: 15px">
                                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email address" required>

                                                @if ($errors->has('email'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>




                                        <div class="form-group{{ $errors->has('position') ? ' has-error' : '' }}" >
                                            <label for="position" class="col-md-8 col-md-offset-2 control-label">Position</label>

                                            <div class="col-md-8 col-md-8 col-md-offset-2" style="margin-bottom: 15px">
                                                <input id="position" type="text" class="form-control" name="position" value="{{ old('position') }}" placeholder="Position" required>

                                                @if ($errors->has('position'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('position') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>




                                        <div class="form-group{{ $errors->has('degree') ? ' has-error' : '' }}" >
                                            <label for="degree" class="col-md-8 col-md-offset-2 control-label">Degree</label>

                                            <div class="col-md-8 col-md-8 col-md-offset-2" style="margin-bottom: 15px">
                                                <input id="degree" type="text" class="form-control" name="degree" value="{{ old('degree') }}" placeholder="Degree" required>

                                                @if ($errors->has('degree'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('degree') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('date_of_birth') ? ' has-error' : '' }}" >
                                            <label for="date_of_birth" class="col-md-8 col-md-offset-2 control-label">Date of Birth</label>

                                            <div class="col-md-8 col-md-8 col-md-offset-2" style="margin-bottom: 15px">
                                                 <input type="date" id="start" name="date_of_birth"
                                                       value="2019-01-01"
                                                       min="1950-01-01" max="2050-12-31" class="form-control"

                                                 value="{{ old('date_of birth') }}" >

                                               

                                                @if ($errors->has('degree'))
                                                    <span class="help-block">
                                                        <strong> 
                                                            {{ $errors->first('degree') }}
                                                        </strong>
                                                    </span>
                                                @endif

                                            </div>
                                        </div>







                                        <div class="col-md-8 col-md-offset-2 {{ $errors->has('password') ? ' has-error' : '' }}" style="margin-bottom: 15px">
                                            <label for="exampleInputEmail1">
                                            New Password
                                            </label>
                                            <input type="password" name="password" class="form-control" value="{{ old('password') }}" required autofocus placeholder="New password">
                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="col-md-8 col-md-offset-2 {{ $errors->has('address') ? ' has-error' : '' }}" style="margin-bottom: 15px">
                                            <label for="exampleInputEmail1">Confirm new password</label>
                                            <input type="password" name="password_confirmation" class="form-control" value="" required autofocus placeholder="Confirm new password">
                                        </div>

                                        <div class="col-md-8 col-lg-offset-2 {{ $errors->has('address') ? ' has-error' : '' }}" style="margin-bottom: 50px">
                                            <button class="btn btn-success">
                                                <strong><i class="fa fa-user-plus" aria-hidden="true"></i></strong>
                                                Create Now
                                            </button>
                                        </div>

                                    </div>
                            </div>
                </form>
            </div>
            </div>
        </div>

    <!-- /page content -->

@endsection