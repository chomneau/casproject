

@extends('admin.admin-layout.main')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">

            <div class="clearfix"></div>

            <div class="row">
                <form role="form" class="form-group" action="{{ route('admin.adminProfile.edit', ['id'=>$adminProfile->id]) }}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="panel col-md-8 col-md-offset-2">
                        <div class="page-title">
                            <div class="title_left">
                                <h3>Edit Profile</h3>
                            </div>
                        </div>
                        <div class="col-md-12 {{ $errors->has('logo') ? ' has-error' : '' }}">
                            <label for="logo">User Avatar ( photo )</label>
                            <input type="file" name="avatar" class="form-control" value="{{ $adminProfile->avatar }}" placeholder="avatar">
                        </div>

                        <div class="col-md-12 {{ $errors->has('password') ? ' has-error' : '' }}" style="margin-bottom: 20px">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $adminProfile->name }}" required autofocus placeholder="name" >
                            @if ($errors->has('name'))
                                <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>


                        <div class="col-md-12 {{ $errors->has('email') ? ' has-error' : '' }}" style="margin-bottom: 20px">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="text" name="email" class="form-control" value="{{ $adminProfile->email }}" required autofocus placeholder="email">
                            @if ($errors->has('email'))
                                <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif

                        </div>

                        <div class="col-md-12 {{ $errors->has('phone') ? ' has-error' : '' }}" style="margin-bottom: 20px">
                            <label for="exampleInputEmail1">Phone</label>
                            <input type="number" name="phone" class="form-control" value="{{ $adminProfile->AdminProfile->phone }}" required autofocus placeholder="Phone">
                            @if ($errors->has('phone'))
                                <span class="help-block">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="col-md-12 {{ $errors->has('address') ? ' has-error' : '' }}" style="margin-bottom: 20px">
                            <label for="exampleInputEmail1">Address</label>
                            <input type="text" name="address" class="form-control" value="{{ $adminProfile->adminprofile->address }}" required autofocus placeholder="address">
                            @if ($errors->has('address'))
                                <span class="help-block">
                                <strong>{{ $errors->first('address') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="col-md-12 {{ $errors->has('about') ? ' has-error' : '' }}" style="margin-bottom: 20px">
                            <label for="exampleInputEmail1">About</label>
                            <textarea type="text" name="about" class="form-control" placeholder="address">
                                {{ $adminProfile->adminprofile->about }}
                            </textarea>
                            @if ($errors->has('about'))
                                <span class="help-block">
                                <strong>{{ $errors->first('about') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="col-md-12 " style="margin-bottom: 50px">
                            <button class="btn btn-success">
                                <i class="fa fa-edit m-right-xs"></i>
                                Update
                            </button>
                        </div>

                    </div>

                </form>

            </div>
        </div>
    </div>
    <!-- /page content -->

@endsection