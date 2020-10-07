@extends('admin.admin-layout.main')

@section('content')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>USERS <small></small></h3>
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
                                    <th style="width: 20%">User Name</th>
                                    <th style="width: 20%">Email</th>
                                    <th class="hidden-sm hidden-xs visible-sm-block ">Created_at</th>
                                    <th class="hidden-sm hidden-xs ">Role</th>
                                    <th style="width: 20%" class="hidden-sm hidden-xs ">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($adminUser))
                                    @foreach($adminUser as $adminUsers)
                                        <tr >
                                            <td>#</td>
                                            <td>
                                                <a>{{ $adminUsers->name }}</a>
                                                <br />
                                                <small class="visible-sm-block">Created {{ $adminUsers->created_at->diffForHumans() }}</small>
                                            </td>
                                            <td>
                                                {{ $adminUsers->email }}
                                            </td>
                                            <td class="project_progress visible-sm-block">
                                                {{ $adminUsers->created_at }}
                                            </td>
                                            <td class="hidden-sm hidden-xs">

                                                    @if($adminUsers->admin)
                                                        <button type="button" class="btn btn-success btn-xs">
                                                            Admin
                                                        </button>
                                                    @else
                                                        <span>
                                                            <button type="button" class="btn btn-warning btn-xs">
                                                            User
                                                            </button>
                                                        </span>
                                                    @endif


                                            </td>
                                            <td class="hidden-sm hidden-xs">
                                                <a href="{{ route('admin.adminProfile', ['id'=>$adminUsers->id] ) }}" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View profile </a>
                                                <a href="{{ route('admin.adminProfile.edit', ['id'=>$adminUsers->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                                {{--  <a href="{{ route('admin.adminProfile.delete', ['id'=>$adminUsers->id]) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>  --}}
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