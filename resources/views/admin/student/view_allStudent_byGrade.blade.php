
@extends('admin.admin-layout.main')

@section('content')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    {{--  <h3>{{ strtoupper($gradeID->GradeProfile->name) }} <small></small></h3>  --}}
                </div>
            </div>

            <div class="clearfix"></div>

    @if(Auth::guard('admin')->check())
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Total : {{ $countStudentByGrade }} <span style="margin-left: 2em"> Male:</span> <span class="badge badge-warning" style="color: seashell"> {{ $countMaleStudentByGrade }}</span> <span style="margin-left: 2em"> Female: </span> <span class="badge" style="color: seashell">{{ $countFemaleStudentByGrade }}</span></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                
                                
                                <li>
                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                        <a href="{{ route('approve.grade', $gradeID ) }}" class="btn btn-primary hidden-sm hidden-xs">Approve Score</a>
                                        <a href="{{ route('approve.grade', $gradeID ) }}" class="btn btn-primary hidden-md hidden-lg">Ap Sc</a>
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
                                    <th style="width: 25%">Name</th>
                                    <th  class="hidden-sm hidden-xs">Gender</th>
                                    <th  class="hidden-sm hidden-xs">StudentID</th>
                                    <th  >Grade</th>
                                    <th class="hidden-sm hidden-xs" style="width: 20%">Parents Contact</th>
                                    <th class="hidden-sm hidden-xs">Status</th>

                                    <th class="hidden-sm hidden-xs">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($viewStudentByGrade))
                                    @foreach($viewStudentByGrade as $key => $viewStudentByGrades)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>
                                                <a> 
                                                    {{ $viewStudentByGrades->last_name }}, 
                                                    {{ $viewStudentByGrades->first_name }} </a>
                                                <br />
                                                <small class="hidden-sm hidden-xs ">Created {{ $viewStudentByGrades->created_at->diffForHumans() }}</small>
                                            </td>
                                            <td class="hidden-sm hidden-xs">{{ substr($viewStudentByGrades->gender, 0, 1) }}</td>
                                            <td class="hidden-sm hidden-xs">
                                                {{ $viewStudentByGrades->card_id }}
                                            </td>
                                            <td >{{ $viewStudentByGrades->gradeProfile->name }}</td>
                                            <td class="project_progress hidden-sm hidden-xs "">
                                                <i class="fa fa-phone-square"></i>
                                                {{ $viewStudentByGrades->father_phone }} : {{ $viewStudentByGrades->mother_phone }}
                                            </td>
                                            <td ><span class="btn-sm btn-warning hidden-sm hidden-xs">{{ $viewStudentByGrades->status }}</span></td>

                                            <td>
                                                @if(Auth::guard('admin')->check())
                                                    <a href="{{ route('student.detail', ['id'=>$viewStudentByGrades->id] ) }}" class="btn btn-primary btn-xs text-sx-center"><i class="fa fa-folder"></i> View </a>

                                                    {{--  <a href="{{ route('student.detail.edit', ['id'=>$viewStudentByGrades->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>  --}}


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
                            <h2>Total: {{ $countStudentByGrade }} <span style="margin-left: 2em"> Male:</span> <span class="badge badge-warning" style="color: seashell"> {{ $countMaleStudentByGrade }}</span> <span style="margin-left: 2em"> Female: </span> <span class="badge" style="color: seashell">{{ $countFemaleStudentByGrade }}</span></h2>
                            
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                            <!-- start project list -->
                            <table class="table table-striped projects">
                                <thead>
                                    <tr>
                                        <th style="width: 1%">#</th>
                                        <th>Name</th>
                                        <th class="hidden-sm hidden-xs">Gender</th>
                                        <th class="hidden-sm hidden-xs">StudentID</th>
                                        <th >Grade</th>
                                        <th class="hidden-sm hidden-xs" style="width: 20%">Parents Contact</th>
                                        <th class="hidden-sm hidden-xs">Status</th>
    
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if(count($viewStudentByGrade))
                                    @foreach($viewStudentByGrade as $key=> $viewStudentByGrades)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>
                                                <a>{{ $viewStudentByGrades->last_name }}, {{ $viewStudentByGrades->first_name }}</a>
                                                <br />
                                                <small class="hidden-sm hidden-xs ">Created {{ $viewStudentByGrades->created_at->diffForHumans() }}</small>
                                            </td>
                                            <td class="hidden-sm hidden-xs">{{ substr($viewStudentByGrades->gender, 0, 1) }}</td>
                                            <td class="hidden-sm hidden-xs">
                                                {{ $viewStudentByGrades->card_id }}
                                            </td>
                                            <td>{{ $viewStudentByGrades->gradeProfile->name }}</td>
                                            <td class="project_progress hidden-sm hidden-xs ">
                                                {{ $viewStudentByGrades->father_phone }} | {{ $viewStudentByGrades->mother_phone }}
                                            </td>
                                            <td class="hidden-sm hidden-xs">
                                                <span class="btn-sm btn-warning ">{{ $viewStudentByGrades->status }}</span></td>
                                            <td>

                                            
                                            
                                             <a href="{{ route('teacher.student.detail', ['teacher_id'=>$teacher->id, 'student_id'=>$viewStudentByGrades->id] ) }}" 
                                             
                                             class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View</a>

                                             <a href="{{ route('teacher.show.absentRecord', ['id'=>$viewStudentByGrades->id]) }}" class="btn btn-info btn-xs hidden-sm hidden-xs">
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