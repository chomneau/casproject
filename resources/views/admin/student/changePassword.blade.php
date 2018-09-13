@extends('admin.admin-layout.main')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">

            <div class="clearfix"></div>

            <div class="row">
                <form role="form" class="form-group" action="{{ route('student.changePassword', ['student_id'=>$students->id]) }}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="panel col-md-6 col-md-offset-3" style="margin-top: 2em">

                    

                        <div class="page-title" style="margin-top: 10px">
                            <div class="text-center" style="margin-bottom: 5em ">
                                <h3>Change Student Password</h3>
                            </div>
                        </div>

                        


                        <div class="col-md-12 {{ $errors->has('password') ? ' has-error' : '' }}" style="margin-bottom: 20px; padding: 0 50px 0 50px">
                            <label for="exampleInputEmail1">New Password</label>
                            <input type="password" name="password" class="form-control" value="{{ old('password') }}" required autofocus placeholder="New password">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif

                        </div>

                        <div class="col-md-12 {{ $errors->has('address') ? ' has-error' : '' }}" style="margin-bottom: 20px; padding: 0 50px 0 50px">
                            <label for="exampleInputEmail1">Confirm new password</label>
                            <input type="password" name="password_confirmation" class="form-control" value="" required autofocus placeholder="Confirm new password">
                        </div>

                        <div class="col-md-12 {{ $errors->has('address') ? ' has-error' : '' }}" style="margin-bottom: 5em; padding: 0 50px 0 50px">
                            <button class="btn btn-success">
                                <i class="fa fa-edit m-right-xs"></i>
                                Change Password
                            </button>
                        </div>

                    
                    </div>

                </form>
                

            </div>
        </div>
    </div>
    <!-- /page content -->

@endsection