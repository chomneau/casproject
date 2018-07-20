@extends('admin.admin-layout.main')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Company Profile</h3>
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
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Company Detail <small>Activity and report</small></h2>
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
                        <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                            <div class="profile_img">
                                <div id="crop-avatar">
                                    <!-- Current avatar -->
                                    <img class="img-responsive avatar-view" src="{{ asset($company->logo) }}" width="170" height="170" alt="Avatar" title="Change the avatar">
                                </div>
                            </div>
                            <h2>{{ $company->companyName }}</h2>

                            <ul class="list-unstyled user_data">
                                <li>
                                    <h5>
                                        <i class="fa fa-map-marker user-profile-icon"></i>
                                        @foreach($location as $locations)
                                            @if($locations->id == $company->location_id)
                                                {{ $locations->name }}
                                            @endif
                                        @endforeach
                                        , Cambodia
                                    </h5>
                                </li>

                                <li>
                                    <i class="fa fa-briefcase user-profile-icon"></i>
                                    @foreach($companyType as $companyTypes)
                                        @if($companyTypes->id == $company->companyType_id)
                                            {{ $companyTypes->name }}
                                        @endif
                                    @endforeach
                                </li>

                                <li class="m-top-xs">
                                    <i class="fa fa-external-link user-profile-icon"></i>
                                    <a href="{{ $company->website }}" target="_blank">{{ $company->website }}</a>
                                </li>
                            </ul>



                            <!-- start skills -->
                            <h4>Company Info</h4>
                            <ul class="list-unstyled user_data">
                                <li>
                                    <strong>Contact Person :</strong> {{ $company->contactPerson }}
                                </li>
                                <li>
                                    <strong>Phone :</strong>(+855) {{ $company->phone }}
                                    {{--<p>Web Applications</p>--}}
                                    {{--<div class="progress progress_sm">--}}
                                        {{--<div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>--}}
                                    {{--</div>--}}
                                </li>
                                <li>
                                    <strong>Email :</strong> {{ $company->email }}
                                    {{--<p>Website Design</p>--}}
                                    {{--<div class="progress progress_sm">--}}
                                        {{--<div class="progress-bar bg-green" role="progressbar" data-transitiongoal="70"></div>--}}
                                    {{--</div>--}}
                                </li>
                                <li>
                                    <strong>Industry Type :</strong>
                                    @foreach($industryType as $indus)
                                        @if($indus->id == $company->industryType_id)
                                              {{ $indus->name }}
                                        @endif
                                    @endforeach
                                    {{--@if($industryType->id == $company->industryType_id)--}}
                                        {{--12--}}
                                    {{--@endif--}}
                                    {{--<p>Automation & Testing</p>--}}
                                    {{--<div class="progress progress_sm">--}}
                                        {{--<div class="progress-bar bg-green" role="progressbar" data-transitiongoal="30"></div>--}}
                                    {{--</div>--}}
                                </li>
                                <li>
                                    <strong>Employees :</strong>
                                    @foreach($employeeSize as $employee)
                                        @if($employee->id == $company->employeeSize_id)
                                            {{ $employee->name }}
                                        @endif
                                    @endforeach

                                    {{--<p>UI / UX</p>--}}
                                    {{--<div class="progress progress_sm">--}}
                                        {{--<div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>--}}
                                    {{--</div>--}}
                                </li>

                            </ul>
                            <!-- end of skills -->

                            <a href="{{ route('company.edit', ['id'=>$company->id]) }}" class="btn btn-success">
                                <i class="fa fa-edit m-right-xs"></i> Edit Profile</a>
                            <br />

                            {{--@include('admin.job.topup-form-create')--}}

                        </div>



                        <div class="col-md-9 col-sm-9 col-xs-12">

                                <ul class="stats-overview">
                                    <li>
                                        <span class="name"> Total of Job Posted </span>
                                        <span class="value text-success">

                                                    {{ $jobPost->count() }}

                                        </span>
                                    </li>
                                    <li>
                                        <span class="name"> Active job posting </span>
                                        <span class="value text-success"> 2000 </span>
                                    </li>
                                    <li class="hidden-phone">
                                        <span class="name"> Total Views </span>
                                        <span class="value text-success"> 20 </span>
                                    </li>
                                </ul>
                                <br />

                        {{--@include('admin.company.form.echart')--}}

                            <!-- start of user-activity-graph -->
                            {{--<div id="graph_bar" style="width:100%; height:280px;"></div>--}}
                        {{--echart report--}}
                        {{----}}
                            <!-- end of user-activity-graph -->

                            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                    <li role="presentation" class="active">
                                        <a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Posted Jobs</a>
                                    </li>
                                    <li role="presentation" class="">
                                        <a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Recent Activity Note</a>
                                    </li>
                                    <li role="presentation" class="">
                                        <a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">About Company</a>
                                    </li>
                                </ul>
                                <div id="myTabContent" class="tab-content">

                                    <div role="tabpanel" class="tab-pane fade active in" id="tab_content2" aria-labelledby="home-tab">
                                        <a href="{{ route('createjob.create', ['id'=>$company->id]) }}" class="btn btn-success" >
                                            {{--data-toggle="modal" data-target="#post-smallModal"--}}
                                            Post a new job
                                            <i class="glyphicon glyphicon-plus-sign"></i>
                                        </a>
                                        <!-- start user projects -->
                                        <table class="data table table-striped no-margin">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Job Title</th>
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
                                                        <td>{{ $job->created_at->format('l F j, Y') }}</td>
                                                        <td class="hidden-phone">18</td>
                                                        <td class="vertical-align-mid">
                                                            <a href="{{ route('singleJob',['id'=>$job->id, 'company_id'=>$job->company->id]) }}" target="_blank" class="btn btn-primary btn-xs">
                                                                <i class="fa fa-folder"></i> View </a>
                                                            <a href="{{ route('createjob.edit', ['id'=>$job->id, 'company_id'=>$company->id]) }}" class="btn btn-warning btn-xs">
                                                                <i class="fa fa-edit"></i> edit </a>
                                                            <a href="{{ route('deletejob',['id'=>$job->id, 'company_id'=>$job->company->id]) }}" class="btn btn-danger btn-xs"><i class="fa fa-delete"></i> Delete </a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                        <!-- end user projects -->

                                    </div>

                                    <div role="tabpanel" class="tab-pane fade" id="tab_content1" aria-labelledby="profile-tab">

                                        <!-- start recent activity -->

                                        <ul class="messages">
                                            @if(count($note))
                                                @foreach( $note as $noted)
                                                    <li class="ourItem">
                                                        <img src="{{ asset($company->logo) }}" class="avatar" alt="Avatar">
                                                        <div class="message_date">
                                                            <h3 class="date text-info">{{ $noted->created_at->format(' j ') }}</h3>
                                                            <p class="month">{{ substr($noted->created_at->format(' F Y '), 0, 4) }}, {{ substr($noted->created_at->format(' Y '), 3, 3) }}</p>
                                                        </div>
                                                        <div class="message_wrapper">
                                                            <h4 class="heading" id="title">
                                                                {{ $noted->title }}

                                                            </h4>
                                                            <blockquote class="message" id="body" style="margin-right: 2em">
                                                                {{ $noted->body }}
                                                            </blockquote>
                                                            <br />

                                                        </div>
                                                    </li>
                                                @endforeach
                                            @endif
                                            <p class="url" style="margin-top: 15px">
                                                <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                                                <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#smallModal">
                                                    <i class="fa fa-flag-o" aria-hidden="true"></i> add note</a>
                                                @include('admin.company.form.form-add-note')
                                            </p>

                                        </ul>

                                        <!-- end recent activity -->

                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                                        <blockquote class="message">{!! $company->about !!}</blockquote>
                                    </div>
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

    @endsection