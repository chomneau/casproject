

@extends('admin.admin-layout.main')

@section('content')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Day Present Setting</h3>
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
                            <a href="#" id="addCategory" class="btn btn-success" data-toggle="modal" data-target="#add-category">
                                Add New
                                <i class="glyphicon glyphicon-plus-sign"></i>
                            </a>
                            @include('admin.Absent.day_present.daypresent-form')
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                            <!-- start project list -->
                            <table class="table table-striped projects">
                                <thead>
                                <tr>
                                    <th style="width: 1%">#</th>
                                    <th style="width: 20%">Quarter Name</th>
                                    <th style="width: 20%">Day Present Per Quarter</th>
                                    <th>Created_at</th>
                                    <th>Updated_at</th>
                                    <th style="width: 20%">#Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($daypresent))
                                    @foreach($daypresent as $daypresents)
                                        <tr>
                                            <td>#</td>
                                            <td id="dataItem" data-toggle="modal" data-target="#editCategory">
                                                
                                                {{ $daypresents->quarter_name }}
                                                

                                            </td>
                                            <td>{{ $daypresents->quarter_day_present }}</td>

                                            <td>
                                                {{ $daypresents->created_at }}

                                            </td>
                                            <td>
                                                {{ $daypresents->updated_at }}
                                            </td>

                                            <td>
                                                <a href="{{ route('daypresent.edit', ['id'=>$daypresents->id] ) }}" class="btn btn-primary btn-xs">
                                                    <i class="fa fa-pencil" aria-hidden="true"></i> Edit
                                                </a>


                                                <a href="{{ route('daypresent.delete', ['id'=>$daypresents->id]) }}" class="btn btn-danger btn-xs"
                                                   id="confirmation">
                                                    <i class="fa fa-trash"></i>
                                                    Delete
                                                </a>

                                                <script type="text/javascript">
                                                    $('#confirmation').on('click', function () {
                                                        return confirm('Are you sure? You want to delete grade!');
                                                    });
                                                </script>

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