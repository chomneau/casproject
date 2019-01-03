@extends('admin.admin-layout.main')
@section('content')

@if(Auth::guard('admin')->check())
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Student by Grade</h3>
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="x_content">
                            <div class="row">


                                <div class="clearfix"></div>

                                <div class="row">
                                    @foreach($viewByGrade as $viewByGrades)

                                    

                                        <div class="col-md-3 col-lg-3" style="padding-left: 3em; padding-right: 3em">
                                            <a href="{{ route('view.allStudent.byGrade', ['grade_profile_id'=>$viewByGrades->id]) }}" >
                                            <div class="panel panel-primary">
                                                <div class="panel-body">
                                                    <h3 class="text-center">{{ $viewByGrades->name }}</h3>
                                                </div>

                                                    <div class="panel-footer text-center">View this Grade</div>

                                            </div>
                                            </a>
                                        </div>

                                   


                                    @endforeach
                                </div>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->


@elseif(Auth::guard('teacher')->check())

   <!-- page content -->
   <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Student by Grade</h3>
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="x_content">
                            <div class="row">


                                <div class="clearfix"></div>

                                <div class="row">
                                    

                                    <div class="col-md-3 col-lg-3" style="padding-left: 3em; padding-right: 3em">
                                        <a href="{{ route('teacher.viewStudent.byGrade', [
                                        'grade_profile_id'=>$viewByGrade->id,
                                        'teacher_id'=>$teacher->id
                                        
                                        ]) }}" >
                                        <div class="panel panel-primary">
                                            <div class="panel-body">
                                                <h3 class="text-center">{{ $viewByGrade->name }}</h3>
                                            </div>

                                                <div class="panel-footer text-center">View this Grade</div>

                                        </div>
                                        </a>
                                    </div>


                                    
                                </div>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->

@endif





@endsection