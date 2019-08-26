

@extends('admin.admin-layout.main')

@section('content')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>ALL GRADE FILE <small></small></h3>
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
                                @if(count($gradefiles))
                                    @foreach($gradefiles as $gradefile)
                                        <tr>
                                            <td>#</td>
                                            <td>
                                                <a>{{ $gradefile->title }}</a>
                                                <br />
                                                <small>uploaded {{ $gradefile->created_at->diffForHumans() }}</small>
                                            </td>
                                            <td width="30%">
                                                <?php
                                                    $string = $gradefile->description;
                                                    if(strlen($string)>40){
                                                        echo substr($gradefile->description, 0,40)."...";
                                                    }else{
                                                        echo substr($gradefile->description, 0,90);
                                                    }
                                                ?>

                                               
                                            </td>
                                            <td>{{ $gradefile->gradeProfile->name }}</td>
                                            <td class="project_progress">
                                                {{ date('d-M-Y', strtotime($gradefile->created_at)) }}
                                            </td>

                                            <td>
                                                

                                               

                                                    <a href="{{ route('teacher.gradefile.detail', ['teacher_id'=>$teacher->id, 'gradefile_id'=>$gradefile->id]) }}" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View  </a>
                                                    <a href="{{ route('teacher.gradefile.edit', ['teacher_id'=>$teacher->id, 'gradefile_id'=>$gradefile->id]) }}" class="btn btn-warning btn-xs"><i class="fa fa-folder"></i> Edit  </a>
                                                    <a href="{{ route('teacher.gradefile.delete', ['gradefile_id'=>$gradefile->id]) }}" class="btn btn-danger btn-xs" Onclick="return ConfirmDelete()">
                                                        <i class="fa fa-folder"></i> Delete  </a>

                                                

                                                    <script>
                                                        function ConfirmDelete() 
                                                            {
                                                                return confirm("Are you sureyou want todelete?");
                                                            }
                                                    </script>
                                            </td>



                                        </tr>
                                    @endforeach
                                @endif

                                </tbody>
                            </table>
                            <!-- end project list -->

                            <div class="text-right">
                            {{-- {!! $gradeProfiles->links() !!} --}}
                        </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->


@endsection

