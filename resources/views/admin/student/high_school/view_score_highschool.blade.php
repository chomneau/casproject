{{--This tap--}}
@if(Auth::guard('admin')->check())

<form role="form" class="form-group" action="{{ route('highschool.score.update', ['grade_id'=>$grade_id->id,'student_id'=>$students->id]) }}"
    method="post">
    {{csrf_field()}}
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
                                            

                                            @if($score->quarter_1 !== null && $score->approve_score_q1==1)
                                                <i class="fa fa-check-circle-o text-success" aria-hidden="true"></i>
                                                <a href="" class="update" data-name="quarter_1"  data-type="number" data-pk="{{ $score->id }}" data-title="Quarter 1">{{ $score->quarter_1 }}
                                            @elseif($score->quarter_1 !== null && $score->approve_score_q1==0)
                                                <i class="fa fa-times-circle-o text-danger" aria-hidden="true"></i> 
                                                <a href="" class="update" data-name="quarter_1"  data-type="number" data-pk="{{ $score->id }}" data-title="Quarter 1">{{ $score->quarter_1 }}   
                                            @else                                             
                                                <a href="" class="update" data-name="quarter_1"  data-type="number" data-pk="{{ $score->id }}" data-title="Quarter 1">{{ $score->quarter_1 }}
                                            @endif 
                                        </td>
                                        <td class="text-center" >
                                            @if($score->quarter_2 !== null && $score->approve_score_q2==1)
                                                <i class="fa fa-check-circle-o text-success" aria-hidden="true"></i>
                                                <a href="" class="update" data-name="quarter_2"  data-type="number" data-pk="{{ $score->id }}" data-title="Quarter 2">{{ $score->quarter_2 }}
                                            @elseif($score->quarter_1 !== null && $score->approve_score_q1==0)
                                                <i class="fa fa-times-circle-o text-danger" aria-hidden="true"></i> 
                                                <a href="" class="update" data-name="quarter_2"  data-type="number" data-pk="{{ $score->id }}" data-title="Quarter 2">{{ $score->quarter_2 }}   
                                            @else                                             
                                                <a href="" class="update" data-name="quarter_2"  data-type="number" data-pk="{{ $score->id }}" data-title="Quarter 2">{{ $score->quarter_2 }}
                                            @endif 
  
                                        </td>
                                        {{--Semester 1--}}
                                        <td class="text-center" style="font-weight: bold">{{ $score->gpa_quarter_1 }}</td>

                                        <td class="text-center" >
                                            
                                            @if($score->quarter_3 !== null && $score->approve_score_q3==1)
                                                <i class="fa fa-check-circle-o text-success" aria-hidden="true"></i>
                                                <a href="" class="update" data-name="quarter_3"  data-type="number" data-pk="{{ $score->id }}" data-title="Quarter 3">{{ $score->quarter_3 }}
                                            @elseif($score->quarter_3 !== null && $score->approve_score_q3==0)
                                                <i class="fa fa-times-circle-o text-danger" aria-hidden="true"></i> 
                                                <a href="" class="update" data-name="quarter_3"  data-type="number" data-pk="{{ $score->id }}" data-title="Quarter 3">{{ $score->quarter_3 }}   
                                            @else                                             
                                                <a href="" class="update" data-name="quarter_3"  data-type="number" data-pk="{{ $score->id }}" data-title="Quarter 3">{{ $score->quarter_3 }}
                                            @endif 
                                            
                                        </td>
                                        <td class="text-center" >
                                            
                                            @if($score->quarter_4 !== null && $score->approve_score_q4==1)
                                                <i class="fa fa-check-circle-o text-success" aria-hidden="true"></i>
                                                <a href="" class="update" data-name="quarter_4"  data-type="number" data-pk="{{ $score->id }}" data-title="Quarter 4">{{ $score->quarter_4 }}
                                            @elseif($score->quarter_4 !== null && $score->approve_score_q4==0)
                                                <i class="fa fa-times-circle-o text-danger" aria-hidden="true"></i> 
                                                <a href="" class="update" data-name="quarter_4"  data-type="number" data-pk="{{ $score->id }}" data-title="Quarter 4">{{ $score->quarter_4 }}   
                                            @else                                             
                                                <a href="" class="update" data-name="quarter_4"  data-type="number" data-pk="{{ $score->id }}" data-title="Quarter 4">{{ $score->quarter_4 }}
                                            @endif 
                                            
                                        </td>


                                        {{--Semester 2--}}
                                        <td class="text-center" style="font-weight: bold">{{ $score->gpa_quarter_2 }}</td>

                                        
                                        <td class="text-center">
                                    
                                        @if(Auth::guard('admin')->check())
                                            
                                            <span >
                                                <a href="{{ route('student.score.delete', ['score_id'=>$score->id]) }}" Onclick="return ConfirmDelete()" style="color: red;"><i class="fa fa-trash center" aria-hidden="true"></i> </a>
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
                                      
                                        @endif  


                                        </td>
                                    </tr>
                                    

                                    
                                    @endforeach 
                                    @endif
                                </tbody>
                            </table>

                            <div>
                                
                                
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

                                <span class="pull-right">
                                    

                                    <button class="btn btn-primary pull-right">
                                        Save Change
                                    </button>
                                    <span class="pull-right" style="padding-top:10px; margin-right:10px">Note: 
                                        <span style="margin-left: 10px"><i class="fa fa-check-circle-o text-success" aria-hidden="true"></i> Approved</span> 
                                        <span style="margin-left: 10px"></span> 
                                        <span><i class="fa fa-times-circle-o text-danger" aria-hidden="true"></i> Not approved </span>  
                                    </span>
                                </span> 
                            </div>

                        </div>
                    </div>

                </div>
                <div class="clearfix"></div>
            </div>

        </div>
    </form>

@elseif(Auth::guard('teacher')->check())

    <form role="form" class="form-group" action="{{ route('highschool.score.update', ['grade_id'=>$grade_id->id,'student_id'=>$students->id]) }}"
        method="post">
        {{csrf_field()}}
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
                                                

                                                @if($score->quarter_1 !== null && $score->approve_score_q1==1)
                                                    <i class="fa fa-check-circle-o text-success" aria-hidden="true"></i>
                                                    {{ $score->quarter_1 }}
                                                    {{--  <a href="" class="saveChange" data-name="quarter_1"  data-type="number" data-pk="{{ $score->id }}" data-title="Quarter 1">{{ $score->quarter_1 }}  --}}
                                                @elseif($score->quarter_1 !== null && $score->approve_score_q1==0)
                                                    <i class="fa fa-times-circle-o text-danger" aria-hidden="true"></i> 
                                                    <a href="" class="saveChange" data-name="quarter_1"  data-type="number" data-pk="{{ $score->id }}" data-title="Quarter 1">{{ $score->quarter_1 }}   
                                                @else                                             
                                                    <a href="" class="saveChange" data-name="quarter_1"  data-type="number" data-pk="{{ $score->id }}" data-title="Quarter 1">{{ $score->quarter_1 }}
                                                @endif 
                                            </td>
                                            <td class="text-center" >
                                                @if($score->quarter_2 !== null && $score->approve_score_q2==1)
                                                    <i class="fa fa-check-circle-o text-success" aria-hidden="true"></i>
                                                    {{ $score->quarter_2 }}
                                                    {{--  <a href="" class="saveChange" data-name="quarter_2"  data-type="number" data-pk="{{ $score->id }}" data-title="Quarter 2">{{ $score->quarter_2 }}  --}}
                                                @elseif($score->quarter_2 !== null && $score->approve_score_q2==0)
                                                    <i class="fa fa-times-circle-o text-danger" aria-hidden="true"></i> 
                                                    <a href="" class="saveChange" data-name="quarter_2"  data-type="number" data-pk="{{ $score->id }}" data-title="Quarter 2">{{ $score->quarter_2 }}   
                                                @else                                             
                                                    <a href="" class="saveChange" data-name="quarter_2"  data-type="number" data-pk="{{ $score->id }}" data-title="Quarter 2">{{ $score->quarter_2 }}
                                                @endif 
    
                                            </td>
                                            {{--Semester 1--}}
                                            <td class="text-center" style="font-weight: bold">{{ $score->gpa_quarter_1 }}</td>

                                            <td class="text-center" >
                                                
                                                @if($score->quarter_3 !== null && $score->approve_score_q3==1)
                                                    <i class="fa fa-check-circle-o text-success" aria-hidden="true"></i>
                                                    {{ $score->quarter_3 }}
                                                    {{--  <a href="" class="saveChange" data-name="quarter_3"  data-type="number" data-pk="{{ $score->id }}" data-title="Quarter 3">{{ $score->quarter_3 }}  --}}
                                                @elseif($score->quarter_3 !== null && $score->approve_score_q3==0)
                                                    <i class="fa fa-times-circle-o text-danger" aria-hidden="true"></i> 
                                                    <a href="" class="saveChange" data-name="quarter_3"  data-type="number" data-pk="{{ $score->id }}" data-title="Quarter 3">{{ $score->quarter_3 }}   
                                                @else                                             
                                                    <a href="" class="saveChange" data-name="quarter_3"  data-type="number" data-pk="{{ $score->id }}" data-title="Quarter 3">{{ $score->quarter_3 }}
                                                @endif 
                                                
                                            </td>
                                            <td class="text-center" >
                                                
                                                @if($score->quarter_4 !== null && $score->approve_score_q4==1)
                                                    <i class="fa fa-check-circle-o text-success" aria-hidden="true"></i>
                                                    {{ $score->quarter_4 }}
                                                    {{--  <a href="" class="saveChange" data-name="quarter_4"  data-type="number" data-pk="{{ $score->id }}" data-title="Quarter 4">{{ $score->quarter_4 }}  --}}
                                                @elseif($score->quarter_4 !== null && $score->approve_score_q4==0)
                                                    <i class="fa fa-times-circle-o text-danger" aria-hidden="true"></i> 
                                                    <a href="" class="saveChange" data-name="quarter_4"  data-type="number" data-pk="{{ $score->id }}" data-title="Quarter 4">{{ $score->quarter_4 }}   
                                                @else                                             
                                                    <a href="" class="saveChange" data-name="quarter_4"  data-type="number" data-pk="{{ $score->id }}" data-title="Quarter 4">{{ $score->quarter_4 }}
                                                @endif 
                                                
                                            </td>
                                            {{--Semester 2--}}
                                            <td class="text-center" style="font-weight: bold">{{ $score->gpa_quarter_2 }}</td>                                         
                                            <td class="text-center">                                            

                                            </td>
                                        </tr>
                                        

                                        
                                        @endforeach 
                                        @endif
                                    </tbody>
                                </table>

                                <div >
                                    <span class="pull-left">Note: 
                                        <span style="margin-left: 10px"><i class="fa fa-check-circle-o text-success" aria-hidden="true"></i> Approved</span> 
                                        <span style="margin-left: 10px"></span> 
                                        <span><i class="fa fa-times-circle-o text-danger" aria-hidden="true"></i> Not approved </span>  
                                    </span>
                                    <span class="pull-right">
                                        <input type="submit" value="Save Change" class="btn btn-primary">                                           
                                    </span>
                                </div>

                            </div>
                        </div>

                    </div>


                    <div class="clearfix"></div>

                </div>

        </div>
    </form>

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

           url: '/admin/score/update',

           type: 'text',

           pk: 1,

           name: 'name',

           title: 'Enter name'
           
    }); 


    $('.saveChange').editable({

        url: '/teacher/score/update',

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
