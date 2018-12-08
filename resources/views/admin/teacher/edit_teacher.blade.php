
@extends('admin.admin-layout.main')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">

            <div class="clearfix"></div>

            <div class="row">
                <form role="form" class="form-group" action="{{ route('teacher.update', ['admin_id'=>$admin->id, 'teacher_id'=>$teacher->id]) }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="panel col-md-8 col-md-offset-2">
                        <div class="page-title">
                            <div class="text-center">
                                <h3>Update Profile</h3>
                            </div>
                        </div>

                        <div class="container" style="margin-top: 1em">

                            

                                        <div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}" >
                                            <label for="name" class="col-md-6 col-md-offset-2 control-label">Upload Photo</label>
                                            <div class="col-md-8 col-md-offset-2" style="margin-bottom: 20px">
                                                <input type="file" name="photo" class="form-control" value="{{ old('photo') }}"  autofocus placeholder="teacher photo" >

                                                @if ($errors->has('photo'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('photo') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}" >
                                            <label for="name" class="col-md-6 col-md-offset-2 control-label">First Name</label>
                                            <div class="col-md-8 col-md-offset-2" style="margin-bottom: 20px">
                                                <input id="name" type="text" class="form-control" name="first_name" value="{{ $teacher->first_name }}" placeholder="First name" required autofocus>

                                                @if ($errors->has('first_name'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('first_name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}" >
                                            <label for="name" class="col-md-6 col-md-offset-2 control-label">Last Name</label>
                                            <div class="col-md-8 col-md-offset-2" style="margin-bottom: 20px">
                                                <input id="name" type="text" class="form-control" name="last_name" 
                                                value="{{ $teacher->last_name }}" placeholder="last name" required autofocus>

                                                @if ($errors->has('last_name'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('last_name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}" >
                                            <label for="name" class="col-md-6 col-md-offset-2 control-label">Gender</label>
                                            <div class="col-md-8 col-md-offset-2" style="margin-bottom: 20px">

                                                <select name="gender" id="" class="form-control">

                                                    <option value="{{ $teacher->gender }}">{{ $teacher->gender }}</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                    <option value="other">Other</option>

                                                </select>
                                                

                                                @if ($errors->has('gender'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('gender') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="form-group{{ $errors->has('date_of_birth') ? ' has-error' : '' }}" >
                                            <label for="name" class="col-md-6 col-md-offset-2 control-label">Date of Birth</label>
                                            <div class="col-md-8 col-md-offset-2" style="margin-bottom: 20px">
                                                <input id="name" type="date" class="form-control" name="date_of_birth" 
                                                value="{{ $teacher->date_of_birth }}" placeholder="date of birth" required autofocus>

                                                @if ($errors->has('date_of_birth'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('date_of_birth') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>



                                        <div class="form-group{{ $errors->has('skill') ? ' has-error' : '' }}" >
                                            <label for="name" class="col-md-6 col-md-offset-2 control-label">Skill</label>
                                            <div class="col-md-8 col-md-offset-2" style="margin-bottom: 20px">
                                                <input id="name" type="text" class="form-control" name="skill" 
                                                value="{{ $teacher->skill }}" placeholder="skill" required autofocus>

                                                @if ($errors->has('skill'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('skill') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}" >
                                            <label for="name" class="col-md-6 col-md-offset-2 control-label">Telephone</label>
                                            <div class="col-md-8 col-md-offset-2" style="margin-bottom: 20px">
                                                <input id="name" type="text" class="form-control" name="phone" 
                                                value="{{ $teacher->phone }}" placeholder="phone number" required autofocus>

                                                @if ($errors->has('phone'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('phone') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        {{--Email--}}
                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}" >
                                            <label for="email" class="col-md-8 col-md-offset-2 control-label">E-Mail Address</label>

                                            <div class="col-md-8 col-md-8 col-md-offset-2" style="margin-bottom: 15px">
                                                <input id="email" type="email" class="form-control" name="email" 
                                                value="{{ $teacher->email }}" placeholder="Email address" required>

                                                @if ($errors->has('email'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-8 col-md-offset-2 {{ $errors->has('password') ? ' has-error' : '' }}" style="margin-bottom: 15px">
                                            <label for="exampleInputEmail1">New Password</label>
                                            <input type="password" name="password" class="form-control" 
                                            value="{{ old('password') }}"  autofocus placeholder="New password">
                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        

                                        <div class="col-md-8 col-lg-offset-2 {{ $errors->has('address') ? ' has-error' : '' }}" style="margin-bottom: 50px">
                                            <button class="btn btn-success">
                                                <strong><i class="fa fa-user-plus" aria-hidden="true"></i></strong>
                                                Update Now
                                            </button>

                                            <a href="{{ route('teacher.delete', ['admin_id'=>$admin->id, 'teacher_id'=>$teacher->id]) }}" class="btn btn-danger">
                                                <strong><i class="fa fa-user-plus" aria-hidden="true"></i></strong>
                                                Delete
                                            </a>
                                        </div>

                                    </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>

    <!-- /page content -->

@endsection