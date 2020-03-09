
{{--This tap--}}

@if(Auth::guard('admin')->check())
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
                                        <th>Subject name</th>
                                        <th>Grade</th>
                                        <th>Quarter 1</th>
                                        <th>Quarter 2</th>
                                        
                                        <th>Quarter 3</th>
                                        <th>Quarter 4</th>

                                        
                                        
                                        <th>Action </th>

                                    </tr>
                                </thead>


                                <tbody>
                                    @if(count($prekScores)) 

                                    @foreach($prekScores as $score)
                                    <tr>
                                        {{--<td>{{ $score->studentProfile->card_id }}</td>--}}

                                        <td style="font-weight:bold; font-size:14px; padding-top:15px">
                                            {{ $loop->iteration }}                   
                                        </td>

                                            <td style="font-weight:bold; font-size:14px; padding-top:15px">{{ $score->KSubject->name }}</td>




                                            <td style="text-align:center">{{$score->KLevel->name}}</td>

                                        
                                            <td style="text-align:center; font-weight:bold" >

                                                @if($score->quarter_1 !== null && $score->approve_score_q1==1)

                                                    <i class="fa fa-check-circle-o text-success" aria-hidden="true"></i>
                                                    <a href="" class="update" data-name="quarter_1"  data-type="number" data-pk="{{ $score->id }}" data-title="Quarter 1">{{ $score->quarter_1 }}
                                                    </a>
                                                @elseif($score->quarter_1 !== null && $score->approve_score_q1==0)
                                                    <i class="fa fa-times-circle-o text-danger" aria-hidden="true"></i>  
                                                    <a href="" class="update" data-name="quarter_1"  data-type="number" data-pk="{{ $score->id }}" data-title="Quarter 1">{{ $score->quarter_1 }}
                                                    </a>
                                                @else 
                                                    <a href="" class="update" data-name="quarter_1"  data-type="number" data-pk="{{ $score->id }}" data-title="Quarter 1">{{ $score->quarter_1 }}
                                                    </a>
                                                @endif

                                            </td>
    
                                            <td style="text-align:center; font-weight:bold" >

                                                @if($score->quarter_2 !== null && $score->approve_score_q2==1)
                                                    
                                                        <i class="fa fa-check-circle-o text-success" aria-hidden="true"></i>
                                                    
                                                    <a href="" class="update" data-name="quarter_2"  data-type="number" data-pk="{{ $score->id }}" data-title="Quarter 2">{{ $score->quarter_2 }}
                                                    </a>

                                                @elseif($score->quarter_2 !== null && $score->approve_score_q2==0)
                                                    <i class="fa fa-times-circle-o text-danger" aria-hidden="true"></i>  
                                                    <a href="" class="update" data-name="quarter_2"  data-type="number" data-pk="{{ $score->id }}" data-title="Quarter 2">{{ $score->quarter_2 }}
                                                    </a>
                                                @else 
                                                    <a href="" class="update" data-name="quarter_2"  data-type="number" data-pk="{{ $score->id }}" data-title="Quarter 2">{{ $score->quarter_2 }}
                                                    </a>
                                                @endif
                                            </td>
                                            <td style="text-align:center; font-weight:bold" >
                                                
                                                @if($score->quarter_3 !== null && $score->approve_score_q3==1)

                                                    <i class="fa fa-check-circle-o text-success" aria-hidden="true"></i>
                                                    <a href="" class="update" data-name="quarter_3"  data-type="number" data-pk="{{ $score->id }}" data-title="Quarter 3">{{ $score->quarter_3 }}
                                                    </a>
                                                @elseif($score->quarter_3 !== null && $score->approve_score_q3==0)
                                                    <i class="fa fa-times-circle-o text-danger" aria-hidden="true"></i>  
                                                    <a href="" class="update" data-name="quarter_3"  data-type="number" data-pk="{{ $score->id }}" data-title="Quarter 3">{{ $score->quarter_3 }}
                                                    </a>
                                                @else 
                                                    <a href="" class="update" data-name="quarter_3"  data-type="number" data-pk="{{ $score->id }}" data-title="Quarter 3">{{ $score->quarter_3 }}
                                                    </a>
                                                @endif
                                                
                                            </td>
                                            <td style="text-align:center; font-weight:bold" >
                                                @if($score->quarter_4 !== null && $score->approve_score_q4==1)
                                                    
                                                        <i class="fa fa-check-circle-o text-success" aria-hidden="true"></i>
                                                    
                                                    <a href="" class="update" data-name="quarter_4"  data-type="number" data-pk="{{ $score->id }}" data-title="Quarter 4">{{ $score->quarter_4 }}
                                                    </a>

                                                @elseif($score->quarter_4 !== null && $score->approve_score_q4==0)
                                                    <i class="fa fa-times-circle-o text-danger" aria-hidden="true"></i>  
                                                    <a href="" class="update" data-name="quarter_4"  data-type="number" data-pk="{{ $score->id }}" data-title="Quarter 4">{{ $score->quarter_4 }}
                                                    </a>
                                                @else 
                                                    <a href="" class="update" data-name="quarter_4"  data-type="number" data-pk="{{ $score->id }}" data-title="Quarter 4">{{ $score->quarter_4 }}
                                                    </a>
                                                @endif

                                                   
                                                
                                            </td>

                                            
                                       
                                       

                                        {{--Semester 1--}}

                                        <td>
                                            {{-- <span>
                                                    <a href="{{ route('prek.score.edit',['score_id'=>$score->id, 'grade_id'=>$grade_id->id,'student_id'=>$students->id]) }}" class="btn btn-default btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                                </span> --}}
                                            <span>
                                                    <a href="{{ route('prek.score.delete', ['score_id'=>$score->id]) }}" class="btn btn-default btn-sm" Onclick="return ConfirmDelete()" >
                                                        <i class="far fa-trash-alt"></i>
                                                    </a>
                                                </span>

                                                <script>
                                                    function ConfirmDelete() 
                                                        {
                                                            return confirm("Are you sure you want to delete?");
                                                        }
                                                </script>
                                        </td>
                                    </tr>

                                        @endforeach
                                    @endif
                                </tbody>
                            </table>


                            

                            <div>
                                
                                <span>
                                     
                                    <a href="{{ route('prek.addSubject', ['grade_id'=>$grade_id->id,'student_id'=>$students->id]) }}" class="btn btn-success">
                                        
                                        Add a subject
                                    </a>
                                </span>
                                <span>

                                    <a href="{{ route('show.prek.allsubject', ['grade_id'=>$grade_id->id,'student_id'=>$students->id]) }}" class="btn btn-primary">

                                        Add all subjects
                                    </a>
                                </span>

                                <span class='btn btn-success pull-right' id="refresh"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</span>

                                

                                
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


            <div class="col-xs-12">
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="home">
                        <div class="tab-pane" id="table">
                            <table id="datatable-fixed-header" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        {{--<th>StudentID</th>--}}
                                        <th style="text-align:center">Subject name</th>
                                        <th>Grade</th>
                                        <th>Quarter 1</th>
                                        <th>Quarter 2</th>
                                        
                                        <th>Quarter 3</th>
                                        <th>Quarter 4</th>
                                        

                                        {{-- <th>Action</th> --}}

                                    </tr>
                                </thead>


                                <tbody>
                                    @if(count($prekScores)) 
                                    @foreach($prekScores as $score)
                                    <tr>
                                        {{--<td>{{ $score->studentProfile->card_id }}</td>--}}



                                        <td>{{ $score->KSubject->name}}</td>




                                        <td style="text-align:center">{{$score->KLevel->name}}</td>
                                        <td style="text-align:center">
                                            <a href="" class="saveChange" data-name="quarter_1"  data-type="number" data-pk="{{ $score->id }}" data-title="Quarter 1">{{ $score->quarter_1 }}
                                            </a>
                                        </td>

                                        <td style="text-align:center">
                                            <a href="" class="saveChange" data-name="quarter_2"  data-type="number" data-pk="{{ $score->id }}" data-title="Quarter 2">{{ $score->quarter_2 }}
                                            </a>
                                        </td>
                                        <td style="text-align:center">
                                            <a href="" class="saveChange" data-name="quarter_3"  data-type="number" data-pk="{{ $score->id }}" data-title="Quarter 3">{{ $score->quarter_3 }}
                                            </a>
                                        </td>
                                        <td style="text-align:center">
                                            <a href="" class="saveChange" data-name="quarter_4"  data-type="number" data-pk="{{ $score->id }}" data-title="Quarter 4">{{ $score->quarter_4 }}
                                            </a>
                                        </td>
                                        
                                        
                                        

                                        {{--Semester 1--}}

                                        {{-- <td> --}}
                                                {{-- <span>
                                                    <a href="{{ route('teacher.prek.editSubject',[
                                                    'teacher_id'=>$teacher->id,
                                                    'score_id'=>$score->id, 'grade_id'=>$grade_id->id,'student_id'=>$students->id]) }}" class="btn btn-default btn-sm"> Edit</a>
                                                </span> --}}
<!--                                                 
                                                <span>
                                                    <a href="{{ route('teacher.prek.Subject.delete', ['score_id'=>$score->id]) }}" class="btn btn-default btn-sm"><i class="far fa-trash-alt"></i></a>
                                                </span> -->

                                        {{-- </td> --}}
                                    </tr>

                                    @endforeach
                                    @endif
                                </tbody>
                            </table>


                            

                            <div>
                                
                                
                                

                                
                                     
                                     {{-- <a href="{{ route('teacher.prek.addSubject', 
                                        [ 
                                        'teacher_id'=>$teacher->id,
                                        'grade_id'=>$grade_id->id,
                                        'student_id'=>$students->id
                                        ]) 
                                    }}" class="btn btn-success"> --}}
                                {{-- </a>  --}}
                                <span class='btn btn-success' id="refresh"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</span>



                                
                            </div>

                        </div>
                    </div>




                <div class="clearfix"></div>


</div>


@endif

<script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</script>




<script type="text/javascript">


    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });



    $('.update').editable({

           url: '/admin/prekscore/update',

           type: 'text',

           pk: 1,

           name: 'name',

           title: 'Enter name'
           
    }); 


    $('.saveChange').editable({

        url: '/teacher/prekscore/EditSubject',

        type: 'text',

        pk: 1,

        name: 'name',

        title: 'Enter name'


    });

    $(document).ready(function () {
        $('#refresh').click(function(){
            location.reload(true);
        });
    });



</script>