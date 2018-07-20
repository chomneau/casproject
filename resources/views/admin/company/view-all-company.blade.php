@extends('admin.admin-layout.main')

@section('content')

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>All Companies <small>Listing all Companies / NGO</small></h3>
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



                        <!-- start project list -->
                        <table class="table table-striped projects">
                            <thead>
                            <tr>
                                <th style="width: 1%">#</th>
                                <th style="width: 20%">Company Name</th>
                                <th>Industry Type</th>
                                <th>Job Posting Progress</th>
                                <th>Status</th>
                                <th style="width: 20%">#Edit</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($company))
                                @foreach($company as $com)
                                    <tr>
                                        <td>#</td>
                                        <td>
                                            <a>{{ $com->companyName }}</a>
                                            <br />
                                            <small>Created {{ $com->created_at->diffForHumans() }}</small>
                                        </td>
                                        <td>
                                            @if(count($industryType))
                                                @foreach($industryType as $industryTypes)
                                                    @if($industryTypes->id == $com->industry_type_id)
                                                        {{ $industryTypes->name }}
                                                    @endif
                                                @endforeach
                                            @endif
                                        </td>
                                        <td class="project_progress">
                                            <div class="progress progress_sm">
                                                <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="80"></div>
                                            </div>
                                            <small>80% Complete</small>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-success btn-xs">Success</button>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.company.profile', ['id'=>$com->id] ) }}" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                                            <a href="{{ route('company.edit', ['id'=>$com->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                            {{--<a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>--}}
                                        </td>
                                    </tr>
                                @endforeach
                            @endif

                            </tbody>
                        </table>
                        <!-- end project list -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->


@endsection