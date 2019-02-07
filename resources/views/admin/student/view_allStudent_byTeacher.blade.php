{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>--}}
{{--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>--}}
{{--<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>--}}

@extends('admin.admin-layout.main')

@section('content')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>ALL STUDENT <small></small></h3>
                </div>

                <div class="title_right">
                    <div class="col-md-8 col-sm-8 col-xs-12 form-group pull-right top_search">
                        <form action="{{ route('student.search')  }}" method='get'>
                            {{csrf_field()}}
                            <!-- <div class="input-group">
                                <input type="text" class="form-control" name="query" placeholder="Enter Student ID or First name" required >
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit">Search</button>
                                </span>                       
                            </div> -->
                        </form>

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
                                    <th style="width: 20%">Student name</th>
                                    <th style="width: 10%">Gender</th>
                                    <th>Student id</th>
                                    <!-- grade name -->
                                    <th>Grade</th>
                                    <th>Parents Contact</th>
                                    <th>Status</th>

                                    <th style="width: 20%">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($student))
                                    @foreach($student as $students)
                                        <tr>
                                            <td>#</td>
                                            <td>
                                                <a> {{ $students->last_name }}, {{ $students->first_name }} </a>
                                                <br />
                                                <small>Created {{ $students->created_at->diffForHumans() }}</small>
                                            </td>
                                            <td>
                                                {{ $students->gender }}
                                            </td>
                                            <td>
                                                {{ $students->card_id }}
                                            </td>

                                            <td>
                                                @foreach($gradeProfile as $gradeProfiles)
                                                    @if($students->grade_profile_id == $gradeProfiles->id)
                                                {{ $gradeProfiles->name }}

                                                    @endif

                                                @endforeach
                                            </td>
                                            
                                            <!-- grade profile name -->
                                            <td> {{ $students->father_phone }} | {{ $students->mother_phone }} </td>
                                            <td class="project_progress">
                                                {{ $students->status }}
                                            </td>

                                            <td>
                                                @if(Auth::guard('admin')->check())
                                                <a href="{{ route('student.detail', ['id'=>$students->id] ) }}" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View profile </a>

                                                <a href="{{ route('student.detail.edit', ['id'=>$students->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                                
                                                <!-- <a href="{{ route('student.detail.delete', ['id'=>$students->id]) }}"  class="btn btn-danger btn-xs" id="confirmation">
                                                    <i class="fa fa-trash-o"></i>
                                                    Delete
                                                </a> -->

                                                @elseif(Auth::guard('teacher')->check())

                                                <a href="{{ route('teacher.studentProfile.detail', ['teacher_id'=>$teacher->id, 'student_id'=>$students->id] ) }}" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View profile </a>

                                                @endif

                                                <script type="text/javascript">
                                                    $('#confirmation').on('click', function () {
                                                        return confirm('Are you sure? You want to delete student!');
                                                    });
                                                </script>
                                            </td>



                                        </tr>
                                    @endforeach
                                @endif

                                </tbody>
                            </table>
                            <!-- end project list -->

                            <div class="text-right">
                            {!! $student->links() !!}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->


@endsection