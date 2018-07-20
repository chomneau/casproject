@extends('admin.admin-layout.main')

@section('content')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>All Job Posted <small>job by employer</small></h3>
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
                            <h2></h2>
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


                            <table class="data table table-striped no-margin">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Job Title</th>
                                    <th>Job category</th>

                                    <th>Posted date</th>
                                    <th class="hidden-phone">views</th>
                                    <th>action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @if(count($jobPost))
                                    @foreach($jobPost->sortByDesc('created_at') as $job)
                                        <tr>
                                            <td>#{{ $job->id }}</td>
                                            <td>{{ $job->jobTitle }}</td>
                                            <td>
                                            @if(count($category))
                                                @foreach($category as $categories)
                                                    @if($categories->id == $job->category_id)
                                                        {{ $categories->name }}
                                                    @endif
                                                @endforeach
                                            @endif
                                            </td>
                                            <td>{{ $job->created_at->format('l F j, Y') }}</td>
                                            <td class="hidden-phone">18</td>
                                            <td class="vertical-align-mid">
                                                <a href="" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                                                <a href="" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> edit </a>
                                                <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-delete"></i> Delete </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->


@endsection