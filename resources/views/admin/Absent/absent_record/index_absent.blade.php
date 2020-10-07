@extends('admin.admin-layout.main') 
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h4>Student Name : {{ $students->last_name}} {{ $students->first_name}}
                    <span class="btn btn-success btn-dm ">
                            ID : {{ $students->card_id}}
                    </span>
                </h4>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">




                    <div class="x_title">
                        <h3>Student absent by Grade</h3>
                        <div class="clearfix"></div>
    @include('admin.Absent.absent_record.absent_grade_menu')

                    </div>


                </div>

            </div>
    {{--@include( 'admin.Absent.absent_record.absent_chart')--}}
        </div>

        <!-- /page content -->
@endsection