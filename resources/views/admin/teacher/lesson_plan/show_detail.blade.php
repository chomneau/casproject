

@extends('admin.admin-layout.main')

@section('content')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">



            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>{{ $lesson->title }}</h2>
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

                            <p style="font-size: 15px">{!! $lesson->description !!}</p>

                            @if($lesson->file_name == '')
                                <table class="table table-striped projects">
                                    <thead>
                                    <tr>
                                        <th style="width: 1%">#</th>
                                        <th style="width: 20%">Attachment file</th>

                                        <th>uploaded by</th>

                                        <th style="width: 20%">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <tr>
                                        <td>#</td>

                                        <td>
                                            There is no file uploaded! Please go to edit and upload.
                                        </td>
                                    </tr>


                                    </tbody>
                                </table>
                            @else
                            <table class="table table-striped projects">
                                <thead>
                                <tr>
                                    <th style="width: 1%">#</th>
                                    <th style="width: 20%">Attachment file</th>

                                    <th>uploaded by</th>

                                    <th style="width: 20%">Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                        <tr>
                                            <td>#</td>

                                            <td>
                                                <a href="{{ asset('uploads/lesson_plan/'.$lesson->file_name) }}" target="_blank">
                                                    {{ substr($lesson->file_name,0, 50) }}

                                                <br />
                                                <small>uploaded at {{ $lesson->created_at->diffForHumans() }}</small>
                                            </td>

                                            <td class="project_progress">
                                                {{ $lesson->teacher->first_name }} {{ $lesson->teacher->last_name }}
                                            </td>

                                            <td>
                                                    <a href="{{ asset('uploads/lesson_plan/'.$lesson->file_name) }}" target="_blank" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> Download  </a>

                                                <script type="text/javascript">
                                                    $('#confirmation').on('click', function () {
                                                        return confirm('Are you sure? You want to delete student!');
                                                    });
                                                </script>
                                            </td>



                                        </tr>


                                </tbody>
                            </table>
                            <!-- end project list -->
                            @endif


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->


@endsection