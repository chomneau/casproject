@extends('admin.admin-layout.main')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Student Profile
                        <span>
                            <a href="{{ route('student.detail.edit', ['id'=>$students->id]) }}" class="btn btn-success btn-sm ">
                               <i class="fa fa-edit m-right-xs"></i>
                                Edit Profile
                            </a>
                        </span>
                    </h3>
                </div>


            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">

                        <div class="x_title">
                            <h2>Add all subjects to student's ID: {{ $students->card_id }} </h2>

                            <div class="clearfix"></div>
                        </div>
                        @include('admin.student.grade_menu')

                        {{--add subject form--}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="x_panel">
                                    <div class="x_title">

                                        <h2> <i class="fa fa-sliders" aria-hidden="true"></i> Add Subject to pre-k and k student</h2>
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
                                        {{--
                            @include('admin.grade.highschool.grade-form')--}}
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">


                                        <div class="row">
                                            <form action="{{ route('prek.insert.allSubject', ['grade_id'=>$grade_id->id, 'student_id'=>$students->id]) }}" method="post">
                                                {{ csrf_field() }}

                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Subject Name</th>
                                                        <th>subject_code</th>
                                                        <th scope="col">Grade name</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @if(count($subjects))

                                                        @foreach($subjects as $subject)
                                                                <tr>
                                                                    <td>{{ $subject->id }} <input type="hidden" name="subject_id[]" value="{{ $subject->id }}"></td>
                                                                    <td><input type="text" name="subject_name[]" value="{{ $subject->name }}" style="border:none; font-weight: bold"> </td>
                                                                    <td><input type="text" name="subject_code[]" value="{{ $subject->subject_code }}" style="border:none;"> </td>

                                                                    <td>{{$grade_id->name}}</td>

                                                                </tr>

                                                        @endforeach

                                                    @endif

                                                    </tbody>
                                                </table>
                                                <div style="margin-top: 20px">

                                                    <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-plus-sign"></i> Add now</button>
                                                </div>




                                            </form>
                                        </div>

                                        <!-- start project list -->
                                        <!-- end project list -->

                                    </div>
                                </div>
                            </div>
                        </div>

                        {{--end of add subject form--}}



                    </div>

                </div>
            </div>
        </div>

        <!-- /page content -->
@endsection