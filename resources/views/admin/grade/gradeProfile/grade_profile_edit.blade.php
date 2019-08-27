

@extends('admin.admin-layout.main')

@section('content')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Grade Profile <small>setting</small></h3>
                </div>

                
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="x_title">

                            <h2> <i class="fa fa-sliders" aria-hidden="true"></i>  Edit Grade Profile </h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Settings 1</a>
                                        </li>
                                        <li><a href="#">Settings 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            @include('admin.grade.highschool.grade-form')
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                        {{--for edit form--}}
                        <div class="row">
                            <form action="{{ route('gradeprofile.update', ['id'=>$gradeprofile->id]) }}" method="post">
                                {{ csrf_field() }}
                                <div class="col-md-8 col-md-offset-2">
                                    <input type="text" name="grade" value="{{ $gradeprofile->name }}" class="form-control" autofocus required>
                                </div>
                                <div class="col-md-8 col-md-offset-2" style="margin-top:20px">
                                        <input type="text" name="order" value="{{ $gradeprofile->order }}" class="form-control" autofocus required>
                                </div>
                                <div class="col-md-8 col-md-offset-2" style="margin-top:20px">
                                    <input type="submit"  class="btn btn-success" value="update now">
                                </div>
                            </form>
                        </div>
                            {{--end edit form--}}




                            <!-- start project list -->

                            <!-- end project list -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->


@endsection