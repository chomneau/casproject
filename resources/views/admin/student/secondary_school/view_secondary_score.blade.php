
@if(Auth::guard('admin')->check())
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
                                    <th >Subject</th>
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

                                    @foreach($secondaryScores as $score)
                                        <tr>
                                            <td style="font-weight:bold; font-size:14px; padding-top:15px">
                                                {{ $loop->iteration }}                   
                                            </td>
                                            <td style="font-weight:bold; font-size:14px; padding-top:15px">{{ $score->PrimarySubject->name}}</td>


                                            <td>{{$score->SecondaryLevel->name}}</td>
                                            <td style="text-align:center">

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

                                            <td style="text-align:center">
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

                                            <td style="font-weight: bold; text-align:center">
                                                
                                                @if($score->quarter_1 !== null && $score->quarter_2 !== null  && $score->approve_score_q1==1 && $score->approve_score_q2==1)
                                                <i class="fa fa-check-circle-o text-success" aria-hidden="true"></i>
                                                {{ number_format(ceil(($score->quarter_1+$score->quarter_2)/2), 2, '.', ',') }}
                                                @else
                                                    <i class="fa fa-times-circle-o text-danger" aria-hidden="true"></i>
                                                    {{ number_format(ceil(($score->quarter_1+$score->quarter_2)/2), 2, '.', ',') }}
                                                @endif
                                            </td>

                                            <td style="text-align:center">

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

                                            <td style="text-align:center">

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

                                                
      
                                            <td style="font-weight: bold; text-align:center">
                                                
                                                @if($score->quarter_3 !== null && $score->quarter_4 !== null  && $score->approve_score_q3==1 && $score->approve_score_q4==1)
                                                    <i class="fa fa-check-circle-o text-success" aria-hidden="true"></i>
                                                    {{ number_format(ceil(($score->quarter_3+$score->quarter_4)/2), 2, '.', ',') }}
                                                @else
                                                    <i class="fa fa-times-circle-o text-danger" aria-hidden="true"></i>
                                                    {{ number_format(ceil(($score->quarter_3+$score->quarter_4)/2), 2, '.', ',') }}
                                                @endif
                                            </td>
                                    
                                            

                                            <td style="font-weight: bold; text-align:center">
                                            <?php $semester_1= number_format(ceil(($score->quarter_1+$score->quarter_2)/2), 2, '.', ',');
                                                $semester_2= number_format(ceil(($score->quarter_3+$score->quarter_4)/2), 2, '.', ','); 
                                                echo number_format(ceil(($semester_1+$semester_2)/2), 2, '.', ',')
                                            ?>
                                            </td>
                                            <td>
                                                <span>
                                                    <a href="{{ route('secondary.score.delete', ['score_id'=>$score->id]) }}" class="btn btn-danger btn-sm" Onclick="return ConfirmDelete()" >
                                                        <i class="fa fa-trash-o" aria-hidden="true"></i> 
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

                                </tbody>
                            </table>

                            <div> 
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

                                <span class='btn btn-success pull-right' id="refresh">
                                    <i class="fa fa-floppy-o" aria-hidden="true"></i> 
                                    Save Change
                                </span>

                                
                                <span class="pull-right" style="padding-top: 10px;">Note: 
                                    <span style="margin-left: 10px"><i class="fa fa-check-circle-o text-success" aria-hidden="true"></i> Approved</span> 
                                    <span style="margin-left: 10px"></span> 
                                    <span><i class="fa fa-times-circle-o text-danger" aria-hidden="true"></i> Not approve</span>  
                                    <span style="margin-left: 20px"></span> 
                                </span>
      
                            </div>

                        </div>
                    </div>

                </div>
                
                <div class="clearfix"></div>

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

                                @foreach($secondaryScores as $score)
                                    <tr>
                                        
                                        <td>{{ $score->PrimarySubject->name}}</td>


                                        <td>{{$score->SecondaryLevel->name}}</td>
                                        <td style="text-align:center">
                                            @if($score->quarter_1 !== null && $score->approve_score_q1==1)
                                                <i class="fa fa-check-circle-o text-success" aria-hidden="true"></i>
                                                {{ $score->quarter_1 }}
                                            @elseif($score->quarter_1 !== null && $score->approve_score_q1==0)
                                                <i class="fa fa-times-circle-o text-danger" aria-hidden="true"></i> 
                                                <a href="" class="saveChange" data-name="quarter_1"  data-type="number" data-pk="{{ $score->id }}" data-title="Quarter 1">{{ $score->quarter_1 }}
                                                </a>
                                            @else
                                                <a href="" class="saveChange" data-name="quarter_1"  data-type="number" data-pk="{{ $score->id }}" data-title="Quarter 1">{{ $score->quarter_1 }}
                                                </a> 
                                            @endif    
                                        </td>

                                        <td style="text-align:center"> 
                                            @if($score->quarter_2 !== null && $score->approve_score_q2==1)
                                                <i class="fa fa-check-circle-o text-success" aria-hidden="true"></i>
                                                {{ $score->quarter_2 }}
                                                
                                            @elseif($score->quarter_2 !== null && $score->approve_score_q2==0)
                                                <i class="fa fa-times-circle-o text-danger" aria-hidden="true"></i>  
                                                <a href="" class="saveChange" data-name="quarter_2"  data-type="number" data-pk="{{ $score->id }}" data-title="Quarter 2">{{ $score->quarter_2 }}
                                                </a>
                                            @else
                                                <a href="" class="saveChange" data-name="quarter_2"  data-type="number" data-pk="{{ $score->id }}" data-title="Quarter 4">{{ $score->quarter_2 }}
                                                </a> 
                                            @endif

                                        </td>        
                                            
                                                
                                        <td style="font-weight:bold; text-align:center" >
                                            @if($score->quarter_1 !== null && $score->quarter_2 !== null  && $score->approve_score_q1==1 && $score->approve_score_q2==1)
                                                <i class="fa fa-check-circle-o text-success" aria-hidden="true"></i>
                                                {{ number_format(ceil(($score->quarter_1+$score->quarter_2)/2), 2, '.', ',') }}
                                            @else
                                                <i class="fa fa-times-circle-o text-danger" aria-hidden="true"></i>
                                                {{ number_format(ceil(($score->quarter_1+$score->quarter_2)/2), 2, '.', ',') }}
                                            @endif

                                        </td>
                                            
                                      
                                            
                                        <td style="text-align:center">
                                            @if($score->quarter_3 !== null && $score->approve_score_q3==1)
                                                <i class="fa fa-check-circle-o text-success" aria-hidden="true"></i>
                                                {{ $score->quarter_3 }}
                                            @elseif($score->quarter_3 !== null && $score->approve_score_q3==0)
                                                <i class="fa fa-times-circle-o text-danger" aria-hidden="true"></i> 
                                                <a href="" class="saveChange" data-name="quarter_3"  data-type="number" data-pk="{{ $score->id }}" data-title="Quarter 3">{{ $score->quarter_3 }} 
                                            @else
                                                <a href="" class="saveChange" data-name="quarter_3"  data-type="number" data-pk="{{ $score->id }}" data-title="Quarter 3">{{ $score->quarter_3 }}
                                                </a> 
                                            @endif
                                        </td>
                                        <td style="text-align:center">
                                            @if($score->quarter_4 !== null && $score->approve_score_q4==1)
                                                <i class="fa fa-check-circle-o text-success" aria-hidden="true"></i>
                                                {{ $score->quarter_4 }}
                                            @elseif($score->quarter_4 !== null && $score->approve_score_q4==0)
                                                <i class="fa fa-times-circle-o text-danger" aria-hidden="true"></i> 
                                                <a href="" class="saveChange" data-name="quarter_4"  data-type="number" data-pk="{{ $score->id }}" data-title="Quarter 4">{{ $score->quarter_4 }}  
                                            @else
                                                <a href="" class="saveChange" data-name="quarter_4"  data-type="number" data-pk="{{ $score->id }}" data-title="Quarter 4">{{ $score->quarter_4 }}
                                                </a> 
                                            @endif         
                                        </td>
  
                                        <td style="text-align:center; font-weight:bold;">
                                            @if($score->quarter_3 !== null && $score->quarter_4 !== null  && $score->approve_score_q3==1 && $score->approve_score_q4==1)
                                                <i class="fa fa-check-circle-o text-success" aria-hidden="true"></i>
                                                {{ number_format(ceil(($score->quarter_3+$score->quarter_4)/2), 2, '.', ',') }}
                                            @else
                                                {{ number_format(ceil(($score->quarter_3+$score->quarter_4)/2), 2, '.', ',') }}
                                                <i class="fa fa-times-circle-o text-danger" aria-hidden="true"></i>
                                            @endif
                                        </td>

                                        <td style="text-align:center; font-weight:bold;">
                                            {{ number_format(ceil(($score->quarter_1+$score->quarter_2+$score->quarter_3+$score->quarter_4)/4), 2, '.', ',') }}
                                        </td>
                                        
                                        <td>

                                        </td>
                                    </tr>
                                    
                                @endforeach

                            </tbody>
                        </table>

                        <div >
                            <span class="pull-left">Note: 
                                <span style="margin-left: 10px"><i class="fa fa-check-circle-o text-success" aria-hidden="true"></i> Approved</span> 
                                <span style="margin-left: 10px"></span> 
                                <span><i class="fa fa-times-circle-o text-danger" aria-hidden="true"></i> Not approved </span>  
                            </span>

                            <span class='btn btn-success pull-right' id="refresh">
                                <i class="fa fa-floppy-o" aria-hidden="true"></i> 
                                Save Change
                            </span>
                            
 
                        </div>

                    </div>
                </div>

            </div>
            

            <div class="clearfix"></div>

        </div>

</div>


@endif

<script type="text/javascript">


    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });



    $('.update').editable({

           url: '/admin/secondaryScore/update',

           type: 'text',

           pk: 1,

           name: 'name',

           title: 'Enter name'
           
           
    });

    $('.saveChange').editable({

        url: '/teacher/secondaryScore/update',

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



