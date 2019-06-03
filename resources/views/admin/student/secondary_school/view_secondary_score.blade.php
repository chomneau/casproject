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
                                            <a href="" class="update" data-name="quarter_1"  data-type="number" data-pk="{{ $score->id }}" data-title="Quarter 1">{{ $score->quarter_1 }}
                                            </a>

                                            <td style="text-align:center">
                                                    <a href="" class="update" data-name="quarter_2"  data-type="number" data-pk="{{ $score->id }}" data-title="Quarter 2">{{ $score->quarter_2 }}
                                                    </a>
                                                </td>
                                                <td style="font-weight: bold; text-align:center">
                                                {{ number_format(ceil(($score->quarter_1+$score->quarter_2)/2), 2, '.', ',') }}
                                                <td style="text-align:center">
                                                    <a href="" class="update" data-name="quarter_3"  data-type="number" data-pk="{{ $score->id }}" data-title="Quarter 3">{{ $score->quarter_3 }}
                                                    </a>
                                                </td>
                                                <td style="text-align:center">
                                                    <a href="" class="update" data-name="quarter_4"  data-type="number" data-pk="{{ $score->id }}" data-title="Quarter 4">{{ $score->quarter_4 }}
                                                    </a>
                                                </td>
      
                                            <td style="font-weight: bold; text-align:center">
                                                {{ number_format(ceil(($score->quarter_3+$score->quarter_4)/2), 2, '.', ',') }}
                                            </td>
                                            <td style="font-weight: bold; text-align:center">
                                                    <?php $semester_1= number_format(ceil(($score->quarter_1+$score->quarter_2)/2), 2, '.', ',');
                                                    $semester_2= number_format(ceil(($score->quarter_3+$score->quarter_4)/2), 2, '.', ','); 
            echo number_format(ceil(($semester_1+$semester_2)/2), 2, '.', ',')
                                                    ?>
                                            </td>

                                            {{--Semester 1--}}
                                            
                                            <td>
                                                
                                                    {{-- <span>
                                                        <a href="{{ route('secondary.score.edit',['score_id'=>$score->id, 'grade_id'=>$grade_id->id,'student_id'=>$students->id]) }}" class="btn btn-default btn-sm">Edit</a>
                                                    </span> --}}
                                                    <span>
                                                        <a href="{{ route('secondary.score.delete', ['score_id'=>$score->id]) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i> </a>
                                                </span>

                                            </td>
                                        </tr>
                                        
                                    @endforeach

                                </tbody>
                            </table>

                            <div >

                                
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

                                <span class='btn btn-success pull-right' id="refresh"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</span>

                                
                                
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
                                        <a href="" class="saveChange" data-name="quarter_1"  data-type="number" data-pk="{{ $score->id }}" data-title="Quarter 1">{{ $score->quarter_1 }}
                                        </a>

                                        <td style="text-align:center">
                                                <a href="" class="saveChange" data-name="quarter_2"  data-type="number" data-pk="{{ $score->id }}" data-title="Quarter 2">{{ $score->quarter_2 }}
                                                </a>
                                            </td>
                                            <td style="font-weight:bold; text-align:center" >
                                            {{ number_format(ceil(($score->quarter_1+$score->quarter_2)/2), 2, '.', ',') }}
                                            <td style="text-align:center">
                                                <a href="" class="saveChange" data-name="quarter_3"  data-type="number" data-pk="{{ $score->id }}" data-title="Quarter 3">{{ $score->quarter_3 }}
                                                </a>
                                            </td>
                                            <td style="text-align:center">
                                                <a href="" class="saveChange" data-name="quarter_4"  data-type="number" data-pk="{{ $score->id }}" data-title="Quarter 4">{{ $score->quarter_4 }}
                                                </a>
                                            </td>
  
                                        <td style="text-align:center; font-weight:bold;">
                                            {{ number_format(ceil(($score->quarter_3+$score->quarter_4)/2), 2, '.', ',') }}
                                        </td style="text-align:center">
                                        <td style="text-align:center; font-weight:bold;">
                                                {{ number_format(ceil(($score->quarter_1+$score->quarter_2+$score->quarter_3+$score->quarter_4)/4), 2, '.', ',') }}
                                        </td>

                                        {{--Semester 1--}}
                                        
                                        <td>
                                            
                                                {{-- <span>
                                                    <a href="{{ route('secondary.score.edit',['score_id'=>$score->id, 'grade_id'=>$grade_id->id,'student_id'=>$students->id]) }}" class="btn btn-default btn-sm">Edit</a>
                                                </span> --}}
                                                {{-- <span>
                                                    <a href="{{ route('secondary.score.delete', ['score_id'=>$score->id]) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i> </a>
                                                </span> --}}

                                        </td>
                                    </tr>
                                    
                                @endforeach

                            </tbody>
                        </table>

                        <div >



                            <span class='btn btn-success' id="refresh"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</span>

                            
                            
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



