@extends('admin.admin-layout.main') 
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">

        @if(Auth::guard('admin')->check())
            
        @elseif(Auth::guard('teacher')->check())
            <span class="pull-right" style="margin-right:30px">
                <a href="{{ route('teacher.show.absentRecord', ['id'=>$students->id]) }}" class="btn btn-primary btn-sm ">
                <i class="fa fa-edit m-right-xs"></i>
                Absent
                </a>
            </span>
        @endif

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                    @include('admin.student.profile.student_profile_info')

                    <div class="x_title">      
                        <div class="clearfix"></div>
                    </div>    

                    @include('admin.student.grade_menu')
                
                </div>

            </div>
        </div>
    </div>

    <!-- /page content -->
@endsection