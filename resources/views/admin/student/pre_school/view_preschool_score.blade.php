{{--This tap--}}

@if(Auth::guard('admin')->check())
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
                                        {{--<th>StudentID</th>--}}
                                        <th>Subject</th>
                                        <th>Grade</th>
                                        <th>Quarter 1</th>
                                        <th>Quarter 2</th>
                                        <th>Semester 1</th>
                                        <th>Quarter 3</th>
                                        <th>Quarter 4</th>
                                        <th>Semester 2</th>
                                        <th>Yearly</th>

                                        <th>Action</th>

                                    </tr>
                                </thead>


                                <tbody>
                                    @if(count($prekScores)) @foreach($prekScores as $score)
                                    <tr>
                                        {{--<td>{{ $score->studentProfile->card_id }}</td>--}}



                                        <td>{{ $score->KSubject->name}}</td>




                                        <td>{{$score->KLevel->name}}</td>

                                        <td>{{ $score->quarter_1 }}</td>
                                        <td>{{ $score->quarter_2 }}</td>
                                        <td>{{ $score->semester_1 }}</td>
                                        <td>{{ $score->quarter_3 }}</td>
                                        <td>{{ $score->quarter_4 }}</td>
                                        <td>{{ $score->semester_2 }}</td>
                                        <td>{{ $score->yearly }}</td>

                                        {{--Semester 1--}}

                                        <td>
                                            <span>
                                                    <a href="{{ route('prek.score.edit',['score_id'=>$score->id, 'grade_id'=>$grade_id->id,'student_id'=>$students->id]) }}" class="btn btn-default btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                                </span>
                                            <span>
                                                    <a href="{{ route('prek.score.delete', ['score_id'=>$score->id]) }}" class="btn btn-default btn-sm"><i class="far fa-trash-alt"></i></a>
                                                </span>
                                        </td>
                                    </tr>

                                    @endforeach
                                    @endif
                                </tbody>
                            </table>


                            

                            <div>
                                
                                <span>
                                     
                                    <a href="{{ route('prek.addSubject', ['grade_id'=>$grade_id->id,'student_id'=>$students->id]) }}" class="btn btn-success">
                                        
                                        Add a subjects
                                    </a>
                                </span>
                                <span>

                                    <a href="{{ route('show.prek.allsubject', ['grade_id'=>$grade_id->id,'student_id'=>$students->id]) }}" class="btn btn-primary">

                                        Add all subjects
                                    </a>
                                </span>

                                

                                



                                
                            </div>

                        </div>
                    </div>

                </div>


                <div class="clearfix"></div>

            </div>
        </div>
    </div>
</div>

@elseif(Auth::guard('teacher')->check())

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
                                        {{--<th>StudentID</th>--}}
                                        <th>Subject</th>
                                        <th>Grade</th>
                                        <th>Quarter 1</th>
                                        <th>Quarter 2</th>
                                        <th>Semester 1</th>
                                        <th>Quarter 3</th>
                                        <th>Quarter 4</th>
                                        <th>Semester 2</th>
                                        <th>Yearly</th>

                                        <th>Action</th>

                                    </tr>
                                </thead>


                                <tbody>
                                    @if(count($prekScores)) @foreach($prekScores as $score)
                                    <tr>
                                        {{--<td>{{ $score->studentProfile->card_id }}</td>--}}



                                        <td>{{ $score->KSubject->name}}</td>




                                        <td>{{$score->KLevel->name}}</td>

                                        <td>{{ $score->quarter_1 }}</td>
                                        <td>{{ $score->quarter_2 }}</td>
                                        <td>{{ $score->semester_1 }}</td>
                                        <td>{{ $score->quarter_3 }}</td>
                                        <td>{{ $score->quarter_4 }}</td>
                                        <td>{{ $score->semester_2 }}</td>
                                        <td>{{ $score->yearly }}</td>

                                        {{--Semester 1--}}

                                        <td>
                                            <span>
                                                    <a href="{{ route('teacher.prek.editSubject',[
                                                    'teacher_id'=>$teacher->id,
                                                    'score_id'=>$score->id, 'grade_id'=>$grade_id->id,'student_id'=>$students->id]) }}" class="btn btn-default btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                                </span>
                                            <span>
                                                    <a href="{{ route('teacher.prek.Subject.delete', ['score_id'=>$score->id]) }}" class="btn btn-default btn-sm"><i class="far fa-trash-alt"></i></a>
                                                </span>
                                        </td>
                                    </tr>

                                    @endforeach
                                    @endif
                                </tbody>
                            </table>


                            

                            <div>
                                
                                
                                

                                <span>
                                     
                                    <a href="{{ route('teacher.prek.addSubject', 
                                        [ 
                                        'teacher_id'=>$teacher->id,
                                        'grade_id'=>$grade_id->id,
                                        'student_id'=>$students->id
                                        ]) 
                                    }}" class="btn btn-success">
                                        
                                        Add a subject
                                    </a>
                                </span>



                                
                            </div>

                        </div>
                    </div>

                </div>


                <div class="clearfix"></div>

            </div>
        </div>
    </div>
</div>


@endif