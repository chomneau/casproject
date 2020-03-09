{{--This tap--}}

<div class="col-md-12 col-sm-6 col-xs-12">


            <div class="col-xs-12">
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="home">
                        <div class="tab-pane" id="table">
                            <table id="datatable-fixed-header" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        
                                        <th>N</th>
                                        <th>Subject Name</th>
                                        <th>Grade</th>
                                        <th>1<sup>st</sup> Quarter</th>
                                        <th>2<sup>nd</sup> Quarter</th>
                                        <th> S1 GPA</th>
                                        <th>3<sup>rd</sup> Quarter </th>
                                        <th>4<sup>th</sup> Quarter </th>

                                        <th>S2 GPA</th>
                                        
                                        <th>Action</th>

                                    </tr>
                                </thead>


                                <tbody>
                                    @if(count($scores)) 
                                    @foreach($scores as $score)
                                    <tr>
                                        

                                        <td style="font-weight:bold; font-size:14px; padding-top:15px">
                                            {{ $loop->iteration }}                   
                                        </td>

                                        
                                            @if(count($subject))

                                            @foreach ($subject as $subjects) 

                                                @if($score->subject_id == $subjects->id)

                                                    <td style="font-weight:bold; font-size:14px; padding-top:15px">
                                                        {{ $subjects->name }}
                                                    </td>
                                                        
                                                    

                                                @endif 

                                            @endforeach

                                        @endif 

                                        
                                        

                                        
                                        {{--display grade name--}} 

                                        @if(count($grade)) 
                                            @foreach ($grade as $grades) 
                                                @if($score->grade_id
                                                == $grades->id)
                                                <td>{{ $grades->grade_name }}</td>
                                                @endif 
                                            @endforeach 
                                        @endif

                                        
                                        <td class="text-center" >
                                            

                                            @if($score->quarter_1 !== null)
                                                @if($score->approve_score_q1==1)
                                                    <i class="fa fa-check-circle-o text-success" aria-hidden="true"></i>
                                                @else
                                                    <i class="fa fa-times-circle-o text-danger" aria-hidden="true"></i>    
                                                @endif
                                                {{ $score->quarter_1 }}
                                            @endif 
                                        </td>
                                        <td class="text-center" >
                                            
                                            @if($score->quarter_2 !== null)
                                                @if($score->approve_score_q2==1)
                                                    <i class="fa fa-check-circle-o text-success" aria-hidden="true"></i>
                                                @else
                                                    <i class="fa fa-times-circle-o text-danger" aria-hidden="true"></i>    
                                                @endif
                                                {{ $score->quarter_2 }}
                                            @endif 
                                            
                                        </td>
                                        {{--Semester 1--}}
                                        <td class="text-center" style="font-weight: bold">{{ $score->gpa_quarter_1 }}</td>

                                        <td class="text-center" >
                                            
                                            @if($score->quarter_3 !== null)
                                                @if($score->approve_score_q3==1)
                                                    <i class="fa fa-check-circle-o text-success" aria-hidden="true"></i>
                                                @else
                                                    <i class="fa fa-times-circle-o text-danger" aria-hidden="true"></i>    
                                                @endif
                                                {{ $score->quarter_3 }}
                                            @endif 
                                            
                                        </td>
                                        <td class="text-center" >
                                            
                                            @if($score->quarter_4 !== null)
                                                @if($score->approve_score_q4==1)
                                                    <i class="fa fa-check-circle-o text-success" aria-hidden="true"></i>
                                                @else
                                                    <i class="fa fa-times-circle-o text-danger" aria-hidden="true"></i>    
                                                @endif
                                                {{ $score->quarter_4 }}
                                            @endif 
                                            
                                        </td>


                                        {{--Semester 2--}}
                                        <td class="text-center" style="font-weight: bold">{{ $score->gpa_quarter_2 }}</td>

                                        
                                        <td>
                                    
                                        @if(Auth::guard('admin')->check())
                                            

                                            <span>
                                                <a href="{{ route('student.score.edit',['score_id'=>$score->id, 'grade_id'=>$grade_id->id,'student_id'=>$students->id]) }}" class="btn btn-default btn-sm">Edit</a>
                                            </span>
                                            <span>
                                                <a href="{{ route('student.score.delete', ['score_id'=>$score->id]) }}" class="btn btn-danger btn-sm" Onclick="return ConfirmDelete()">Delete </a>
                                            </span>

                                            <script>
                                            function ConfirmDelete() 
                                                {
                                                    return confirm("Are you sure you want to delete?");
                                                }
                                            </script>


                                        @elseif(Auth::guard('teacher')->check())

                                            <span>
                                                <a href="{{ route('teacher.student.score.edit',['teacher_id'=>$teacher->id, 'score_id'=>$score->id, 'grade_id'=>$grade_id->id,'student_id'=>$students->id]) }}" class="btn btn-default btn-sm">Edit </a>
                                            </span>
                                            <!-- <span>
                                                <a href="{{ route('teacher.score.delete', ['score_id'=>$score->id]) }}" class="btn btn-danger btn-sm">Delete</a>
                                            </span> -->
                                        

                                        @endif


                                        </td>
                                    </tr>
                                    

                                    
                                    @endforeach 
                                    @endif
                                </tbody>
                            </table>

                            <div>
                                
                                @if(Auth::guard('admin')->check())
                                <span>
                                     
                                    <a href="{{ route('subject.score', ['grade_id'=>$grade_id->id,'student_id'=>$students->id]) }}" class="btn btn-success">
                                        
                                        Add a subject
                                    </a>
                                </span>

                                <span>

                                    <a href="{{ route('subject.highschool.showAllscore', ['grade_id'=>$grade_id->id,'student_id'=>$students->id]) }}" class="btn btn-primary">

                                        Add all subjects
                                    </a>
                                </span>

                                @elseif(Auth::guard('teacher')->check())

                                <span>
                                     
                                    <!-- <a href="{{ route('teacher.subject.score', 
                                        [ 
                                        'teacher_id'=>$teacher->id,
                                        'grade_id'=>$grade_id->id,
                                        'student_id'=>$students->id
                                        ]) 
                                    }}" class="btn btn-success">
                                        
                                        Add a subject
                                    </a> -->
                                    
                                </span> 

                                @endif

                                
                            </div>

                        </div>
                    </div>

                </div>


                <div class="clearfix"></div>

            </div>

</div>
