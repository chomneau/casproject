
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
                                    <th>StudentID</th>
                                    <th>Subject</th>
                                    <th>Grade</th>
                                    <th>Quarter 1(%)</th>
                                    <th>Quarter 2(%)</th>
                                    <th>Semester 1(%)</th>
                                    <th>Quarter 3(%)</th>
                                    <th>Quarter 4(%)</th>
                                    <th>Semester 2(%)</th>
                                    <th>Yearly(%)</th>

                                    <th>Action</th>

                                </tr>
                                </thead>


                                <tbody>
                                <!-- @if(count($secondaryScores)) -->
                                    @foreach($secondaryScores as $score)
                                        <tr>
                                            <td>{{ $score->studentProfile->card_id }}</td>

                                        
                                        
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
                                                <span>
                                                    <a href="{{ route('secondary.score.edit',['score_id'=>$score->id, 'grade_id'=>$grade_id->id,'student_id'=>$students->id]) }}" class="btn btn-default btn-sm">Edit</a>
                                                </span>
                                                <span>
                                                    <a href="{{ route('secondary.score.delete', ['score_id'=>$score->id]) }}" class="btn btn-danger btn-sm">Delete</a>
                                                </span>
                                            </td>
                                        </tr>
                                        
                                    @endforeach
                                <!-- @endif -->
                                </tbody>
                            </table>

                            <div >
                                <span >
                                    

                                    <a href="{{ route('secondary.addSubject', ['grade_id'=>$grade_id->id,'student_id'=>$students->id]) }}" class="btn btn-success">
                                        
                                        Add subjects
                                    </a>
                                </span>

                                
                                {{--@include('admin.student.high_school.add_subject_form')--}}
                            </div>

                        </div>
                    </div>

                </div>
                

                <div class="clearfix"></div>

            </div>
        </div>
    </div>
</div>