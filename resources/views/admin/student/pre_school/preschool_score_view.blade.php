@extends('admin.admin-layout.main') 
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Student Profile
                    @if(Auth::guard('admin')->check())
                    <span>
                            <a href="{{ route('student.detail.edit', ['id'=>$students->id]) }}" class="btn btn-success btn-sm ">
                               <i class="fa fa-edit m-right-xs"></i>
                                Edit Profile
                            </a>
                    </span>
                    @endif

                </h3>
            </div>


        </div>
        <span class="pull-right" style="margin-right:30px">
                <a href="{{ route('show.absentRecord', ['id'=>$students->id]) }}" class="btn btn-primary btn-sm ">
                   <i class="fa fa-edit m-right-xs"></i>
                    Absent
                </a>
            </span>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                    @include('admin.student.profile.student_profile_info')


                    <div class="x_title">
                        <h2>{{ $students->first_name }}'s Score Record </h2>
                        <div class="clearfix"></div>
                    </div>

                    @include('admin.student.grade_menu')
                    
                    <div class="x_title">
                        <div class="clearfix"></div>
                    </div>

                    @include('admin.student.pre_school.view_preschool_score')
                    
                </div>{{--end x_panel--}}
            </div>
        </div>
    </div>
</div>

    <!-- /page content -->
@endsection