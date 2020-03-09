
@extends('admin.admin-layout.main')

@section('content')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>ALL STUDENTS <small></small></h3>
                </div>

                <!-- <div class="title_right">
                    <div class="col-md-8 col-sm-8 col-xs-12 form-group pull-right top_search">
                        <form action="{{ route('student.search')  }}" method='get'>
                            {{csrf_field()}}
                            <div class="input-group">
                                <input type="text" class="form-control" name="query" placeholder="Enter Student ID or First name" required >
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit">Search</button>
                                </span>
                            </div>
                        </form>

                    </div>
                </div> -->

                


            </div>

            <div class="clearfix"></div>

    @if(Auth::guard('admin')->check())
            <div class="row">
                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Total student : {{ $countStudentByGrade }} <span style="margin-left: 2em"> Male:</span> <span class="badge badge-warning" style="color: seashell"> {{ $countMaleStudentByGrade }}</span> <span style="margin-left: 2em"> Female: </span> <span class="badge" style="color: seashell">{{ $countFemaleStudentByGrade }}</span></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                
                                
                                <li>
                                    <div class="col-md-8 col-sm-8 col-xs-12 form-group">
                                        <a href="{{ route('approve.grade', $gradeID ) }}" class="btn btn-primary">Approve Score</a>
                                    </div>
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
                                    <th>Grade</th>
                                    <th>Parents Contact</th>
                                    <th>Status</th>

                                    <th style="width: 20%">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($viewStudentByGrade))
                                    @foreach($viewStudentByGrade as $viewStudentByGrades)
                                        <tr>
                                            <td>#</td>
                                            <td>
                                                <a> 
                                                    {{ $viewStudentByGrades->last_name }}, 
                                                    {{ $viewStudentByGrades->first_name }} </a>
                                                <br />
                                                <small>Created {{ $viewStudentByGrades->created_at->diffForHumans() }}</small>
                                            </td>
                                            <td>{{ $viewStudentByGrades->gender }}</td>
                                            <td>
                                                {{ $viewStudentByGrades->card_id }}
                                            </td>
                                            <td>{{ $viewStudentByGrades->gradeProfile->name }}</td>
                                            <td class="project_progress">
                                                <i class="fa fa-phone-square"></i>
                                                {{ $viewStudentByGrades->father_phone }} : {{ $viewStudentByGrades->mother_phone }}
                                            </td>
                                            <td ><span class="btn-sm btn-warning ">{{ $viewStudentByGrades->status }}</span></td>

                                            <td>
                                                @if(Auth::guard('admin')->check())
                                                    <a href="{{ route('student.detail', ['id'=>$viewStudentByGrades->id] ) }}" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View profile </a>

                                                    <a href="{{ route('student.detail.edit', ['id'=>$viewStudentByGrades->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>


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
                                {{--{!! $student->links() !!}--}}
                            </div>

                        </div>
                    </div>
                </div>
            </div>

<!--------------------Teacher side-------------------------->
@elseif(Auth::guard('teacher')->check())

   <div class="row">
                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Total student : {{ $countStudentByGrade }} <span style="margin-left: 2em"> Male:</span> <span class="badge badge-warning" style="color: seashell"> {{ $countMaleStudentByGrade }}</span> <span style="margin-left: 2em"> Female: </span> <span class="badge" style="color: seashell">{{ $countFemaleStudentByGrade }}</span></h2>
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
                                    <th style="width: 20%">Student Name</th>
                                    <th style="width: 10%">Gender</th>
                                    <th>Student ID</th>
                                    <th>Grade</th>
                                    <th>Parents Contact</th>
                                    <th>status</th>

                                    <th style="width: 20%">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($viewStudentByGrade))
                                    @foreach($viewStudentByGrade as $viewStudentByGrades)
                                        <tr>
                                            <td>#</td>
                                            <td>
                                                <a>{{ $viewStudentByGrades->last_name }}, {{ $viewStudentByGrades->first_name }}</a>
                                                <br />
                                                <small>Created {{ $viewStudentByGrades->created_at->diffForHumans() }}</small>
                                            </td>
                                            <td>{{ $viewStudentByGrades->gender }}</td>
                                            <td>
                                                {{ $viewStudentByGrades->card_id }}
                                            </td>
                                            <td>{{ $viewStudentByGrades->gradeProfile->name }}</td>
                                            <td class="project_progress">
                                                {{ $viewStudentByGrades->father_phone }} | {{ $viewStudentByGrades->mother_phone }}
                                            </td>
                                            <td ><span class="btn-sm btn-warning ">{{ $viewStudentByGrades->status }}</span></td>

                                            <td>

                                            
                                            
                                             <a href="{{ route('teacher.student.detail', ['teacher_id'=>$teacher->id, 'student_id'=>$viewStudentByGrades->id] ) }}" 
                                             
                                             class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View profile </a>

                                             <a href="{{ route('teacher.show.absentRecord', ['id'=>$viewStudentByGrades->id]) }}" class="btn btn-info btn-xs ">
                                                    <i class="fa fa-edit m-right-xs"></i>
                                                        Absent
                                                    </a>
                                               
                                            </td>



                                        </tr>
                                    @endforeach

                                    @else
                                    <p>you are not Homeroom Teacher</p>
                                @endif

                                </tbody>
                            </table>
                            <!-- end project list -->

                            <div class="text-right">
                                {{--{!! $student->links() !!}--}}
                            </div>

                        </div>
                    </div>
                </div>
            </div>                                                 

@endif
<!---------------------Teacher end side--------------------->

        </div>
    </div>
    <!-- /page content -->


@endsection