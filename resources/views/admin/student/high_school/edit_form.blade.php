
{{--This tap--}}
<div class="col-md-12 col-sm-6 col-xs-12">
    <div class="x_panel">

        <div class="x_content">

            <div class="col-xs-12">
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="home">
                        <div class="tab-pane" id="table">
                            <table id="datatable-fixed-header" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Student ID</th>
                                    <th>Subject</th>
                                    <th>Grade</th>
                                    <th>Quarter 1</th>
                                    <th>Quarter 2</th>
                                    <th>Quarter 3</th>
                                    <th>Quarter 4</th>
                                    <th>Semester 1</th>
                                    <th>Semester 2</th>
                                    <th>Action</th>

                                </tr>
                                </thead>


                                <tbody>
                                @if(count($scores))
                                    @foreach($scores as $score)
                                        <tr>
                                            <td>{{ $score->student_profile_id }}</td>

                                            {{--display subject name--}}
                                            @if(count($subject))
                                                @foreach ($subject as $subjects)
                                                    @if($score->subject_id == $subjects->id)
                                                        <td>{{ $subjects->name }}</td>
                                                    @endif
                                                @endforeach
                                            @endif
                                            {{--display grade name--}}
                                            @if(count($grade))
                                                @foreach ($grade as $grades)
                                                    @if($score->grade_id == $grades->id)
                                                        <td>{{ $grades->grade_name }}</td>
                                                    @endif
                                                @endforeach
                                            @endif

                                            <td>{{ $score->quarter_1 }}</td>
                                            <td>{{ $score->quarter_2 }}</td>
                                            <td>{{ $score->quarter_3 }}</td>
                                            <td>{{ $score->quarter_4 }}</td>
                                            {{--Semester 1--}}
                                            <td>{{ $score->quarter_1 += $score->quarter_2 }}</td>
                                            {{--Semester 2--}}
                                            <td>{{ $score->quarter_3 += $score->quarter_4 }}</td>
                                            <td>
                                                <span>
                                                    <a href="#" class="btn btn-default btn-sm">Edit</a>
                                                </span>
                                                <span>
                                                    <a href="{{ route('student.score.delete', ['score_id'=>$score->id]) }}" class="btn btn-danger btn-sm">Delete</a>
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>

                            <div >
                                <span >
                                    {{--<a href="{{ route('subject.score', ['grade_id'=>$grade_id->id,'student_id'=>$students->id]) }}" data-toggle="modal" data-target="#add-subject-from" class="btn btn-success">--}}
                                    <a href="{{ route('subject.score', ['grade_id'=>$grade_id->id,'student_id'=>$students->id]) }}" class="btn btn-success">
                                        {{--{{ route('subject.score', ['grade_id'=>$grade_id->id,'student_id'=>$students->id]) }}--}}
                                        Add subjects
                                    </a>
                                </span>

                                {{-- <span >
                                    <a href="" class="btn btn-primary">
                                        Update score
                                    </a>
                                </span> --}}
                                {{--@include('admin.student.high_school.add_subject_form')--}}
                            </div>

                        </div>
                    </div>

                </div>
               
                {{--<table id="datatable-fixed-header" class="table table-striped table-bordered">--}}
               

                <div class="clearfix"></div>

            </div>
        </div>
    </div>
</div>