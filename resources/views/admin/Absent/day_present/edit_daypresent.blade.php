

@extends('admin.admin-layout.main')

@section('content')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Edit Day Present <small>setting</small></h3>
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
                        <div class="x_title">

                            <h2> <i class="fa fa-sliders" aria-hidden="true"></i>  Day Present</h2>
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
                            


                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                        {{--for edit form--}}
                        <div class="row">
                            <form action="{{ route('daypresent.update', ['id'=>$daypresent->id]) }}" method="post">
                                {{ csrf_field() }}
                                <div class="col-md-6 col-md-offset-1">
                                    <label for="exampleInputEmail1">
                                        Quarter Name
                                    </label>
                                    <input type="text" name="quarter_name"  value="{{ $daypresent->quarter_name }}" class="form-control" autofocus required>
                                </div>

                                <div class="col-md-6 col-md-offset-1" style="margin-top:1em;">
                                    <label for="exampleInputEmail1">
                                        Day Present
                                    </label>
                                    <input type="number" name="quarter_day_present" value="{{ $daypresent->quarter_day_present }}" class="form-control" autofocus required>
                                </div>

                                
                                <div class="col-md-6 col-md-offset-1" style="margin-top:2em;">
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