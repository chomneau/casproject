

@extends('admin.admin-layout.main')

@section('content')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>ALL LESSON PLAN <small></small></h3>
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
                                    <th style="width: 20%">Title</th>
                                    <th>Description</th>
                                    <th>Grade</th>
                                    <th>Post Date</th>

                                    <th style="width: 20%">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($lesson))
                                    @foreach($lesson as $lessons)
                                        <tr>
                                            <td>#</td>
                                            <td>
                                                <a>{{ $lessons->title }}</a>
                                                <br />
                                                <small>uploaded {{ $lessons->created_at->diffForHumans() }}</small>
                                            </td>
                                            <td width="30%">
                                                <?php
                                                    $string = $lessons->description;
                                                    if(strlen($string)>90){
                                                        echo substr($lessons->description, 0,90)."...";
                                                    }else{
                                                        echo substr($lessons->description, 0,90);
                                                    }
                                                ?>

                                                {{--{{ substr($assignments->description, 0,150) }}...--}}
                                            </td>
                                            <td>{{ $lessons->gradeProfile->name }}</td>
                                            <td class="project_progress">
                                                {{ $lessons->created_at }}
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

                                                    <a href="{{ route('teacher.lessonPlan.detail', ['teacher_id'=>$teacher->id, 'lessonplan_id'=>$lessons->id]) }}" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View  </a>
                                                    <a href="{{ route('teacher.lessonPlan.edit', ['teacher_id'=>$teacher->id, 'lessonplan_id'=>$lessons->id]) }}" class="btn btn-warning btn-xs"><i class="fa fa-folder"></i> Edit  </a>
                                                    <a href="{{ route('teacher.lessonPlan.delete', ['lessonplan_id'=>$lessons->id]) }}" class="btn btn-danger btn-xs" Onclick="return ConfirmDelete()" ><i class="fa fa-folder"></i> Delete  </a>

                                                    <script>
                                                        function ConfirmDelete() 
                                                            {
                                                            return confirm("Are you sure you want to delete?");
                                                            }
                                                    </script>

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
                            {!! $lesson->links() !!}
                        </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->


@endsection

