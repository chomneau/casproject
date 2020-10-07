@extends('admin.admin-layout.main')
@section('content')
    <div class="right_col" role="main">
        <div class="page-title">
            
        </div>
        <div class="clearfix"></div>


        <div class="container">
            <div class="row">

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Admin > Edit student Profile</h2> 
                            <span class="pull-right">
                                <a href="{{ route('student.changePassword', ['student_id'=>$student->id])}}" class="btn btn-primary btn-lg btn-sm hidden-sm hidden-xs" >
                                    <span><i class="fas fa-unlock"></i></span> 
                                    Change Password
                                </a>

                                <a href="{{ route('student.changePassword', ['student_id'=>$student->id])}}" class="btn btn-primary btn-lg btn-sm hidden-md hidden-lg " >
                                    <span><i class="fas fa-unlock"></i></span> 
                                    Change Pass...
                                </a>
                            </span>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <form role="form" class="form-group" action="{{ route('student.detail.update', ['id'=>$student->id]) }}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}

                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <section>
                                        <div class="wizard">

                                            <div class="tab-content">
                                                <div class="tab-pane active" role="tabpanel" id="step1">
                                                    @include('admin.student.form.edit_student_form')
                                                    
                                                    <ul class="list-inline pull-right">
                                                        <li><button type="submit" class="btn btn-primary" style=" margin-top: 10px;margin-right: -5px">Update Now</button></li>
                                                    </ul>
                                                </div>

                                                
                                                <div class="clearfix"></div>
                                            </div>
                                            {{--<input type="submit" name="submit">--}}

                                            @include('admin.inc.formError')
                                        </div>
                                    </section>
                                </div>
                                <div class="col-md-1"></div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection