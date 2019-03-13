
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
                                    
                                    <th>Subject</th>
                                    <th>Grade</th>
                                    <th>1<sup>st</sup> Quarter(%)</th>
                                    <th>2<sup>nd</sup> Quarter(%)</th>
                                    <th>1<sup>st</sup> Semester(%)</th>
                                    <th>3<sup>rd</sup> Quarter(%)</th>
                                    <th>4<sup>th</sup> Quarter(%)</th>
                                    <th>2<sup>nd</sup> Semester(%)</th>
                                    <th>Yearly(%)</th> 

                                    <th>Action</th>

                                </tr>
                                </thead>


                                <tbody>
                                <!-- @if(count($secondaryScores)) -->
                                    @foreach($secondaryScores as $score)
                                        <tr>
                                            

                                        
                                        
                                            <td>{{ $score->PrimarySubject->name}}</td>

                                        
                                          

                                            <td>{{$score->SecondaryLevel->name}}</td>

                                            <td>{{ $score->quarter_1 }}</td>
                                            <td>{{ $score->quarter_2 }}</td>
                                            <td>{{ $score->semester_1 }}</td>
                                            <td>{{ $score->quarter_3 }}</td>
                                            <td>{{ $score->quarter_4 }}</td>
                                            <td>{{ $score->semester_2 }}</td>
                                            <td>{{ $score->yearly }}</td>

                                            {{--Semester 1--}}
                                            
                                            <td>
                                                @if(Auth::guard('admin')->check())
                                                    <span>
                                                        <a href="{{ route('secondary.score.edit',['score_id'=>$score->id, 'grade_id'=>$grade_id->id,'student_id'=>$students->id]) }}" class="btn btn-default btn-sm">Edit</a>
                                                    </span>
                                                    <span>
                                                        <a href="{{ route('secondary.score.delete', ['score_id'=>$score->id]) }}" class="btn btn-danger btn-sm">Delete</a>
                                                </span>

                                                @elseif(Auth::guard('teacher')->check())
                                                
                                                    <span>
                                                        <a href="{{ route('teacher.secondary.score.edit',['teacher_id'=>$teacher->id,'score_id'=>$score->id, 'grade_id'=>$grade_id->id,'student_id'=>$students->id]) }}" class="btn btn-default btn-sm">Edit</a>
                                                    </span>
                                                    <!-- <span>
                                                        <a href="{{ route('teacher.secondary.score.delete', ['score_id'=>$score->id]) }}" class="btn btn-danger btn-sm">Delete</a>
                                                    </span> -->

                                                @endif
                                            </td>
                                        </tr>
                                        
                                    @endforeach
                                <!-- @endif -->
                                </tbody>
                            </table>

                            <div >

                                @if(Auth::guard('admin')->check())
                                <span>
                                     
                                    <a href="{{ route('secondary.addSubject', ['grade_id'=>$grade_id->id,'student_id'=>$students->id]) }}" class="btn btn-success">
                                        
                                        Add a subject
                                    </a>
                                </span>
                                    <span>

                                    <a href="{{ route('secondary.addAllSubject', ['grade_id'=>$grade_id->id,'student_id'=>$students->id]) }}" class="btn btn-primary">

                                        Add all subjects
                                    </a>
                                </span>

                                @elseif(Auth::guard('teacher')->check())

                                <!-- <span>
                                     
                                    <a href="{{ route('teacher.secondary.addSubject', 
                                        [ 
                                        'teacher_id'=>$teacher->id,
                                        'grade_id'=>$grade_id->id,
                                        'student_id'=>$students->id
                                        ]) 
                                    }}" class="btn btn-success">
                                        
                                        Add a subject
                                    </a>
                                </span>  -->

                                @endif
                                
                            </div>

                        </div>
                    </div>

                </div>
                

                <div class="clearfix"></div>

            </div>
        </div>
    </div>
</div>