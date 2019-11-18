@extends('admin.admin-layout.main') 
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h4>Student Name : {{ $students->last_name}}, {{ $students->first_name}}
                    <span class="btn btn-success btn-dm ">
                                ID : {{ $students->card_id}}
                    </span>


                </h4>
            </div>


        </div>
        <span class="pull-right" style="margin-right:30px">
                <a href="{{ route('show.absentRecord', ['id'=>$students->id]) }}" class="btn btn-primary btn-sm ">
                   <i class="fa fa-edit m-right-xs"></i>
                    Absent
                </a>
            </span>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">




                    <div class="x_title">
                        <h3>Record student absent by Grade</h3>
                        <div class="clearfix"></div>
    @include('admin.Absent.absent_record.absent_grade_menu')

                    </div>
                </div>
            </div>


            <div class="col-md-8 col-sm-6 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Absent Record's {{ $students->first_name }} {{ $students->last_name}} in : {{ $grade_id->grade_name}}
                        </h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Student's name</th>
                                    <th>Grade</th>
                                    <th>Absent Type</th>
                                    <th>Quarter</th>
                                    <th>Day Present</th>
                                    <th>Reason</th>
                                    <th>Absent date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!count($hightSchoolAbsent))                               

                                <tr class="text-center">
                                    <td colspan="6"><h4>No record found !</h4> </td> 

                                </tr>

                                @else
                                @foreach($hightSchoolAbsent as $hightSchoolAbsents)
                                <tr>
                                    <th scope="row">#</th>
                                    <td>{{ $hightSchoolAbsents->studentProfile->first_name }}</td>
                                    <td>{{ $hightSchoolAbsents->Grade->grade_name }}</td>
                                    <td>{{ $hightSchoolAbsents->absent_type }}</td>
                                    <td>{{ $hightSchoolAbsents->quarter_name }}</td>
                                    <td class="text-center">{{ $hightSchoolAbsents->quarter_day_present }}</td>
                                    <td>{{ substr($hightSchoolAbsents->reason, 0, 25)}}
                                        <?php
                                            $reason = $hightSchoolAbsents->reason;
                                            if(strlen($reason) > 25 )
                                                echo "..."                                           
                                        ?>

                                    </td>
                                    <td>{{ Carbon\Carbon::parse($hightSchoolAbsents->absent_date)->format('M d, Y') }}</td>
                                    <td>
                                        <a href="{{ route('edit.highSchool.absentRecord', ['grade_id'=>$grade_id->id,'student_id'=>$students->id, 'absentRecord_id'=>$hightSchoolAbsents->id]) }}">
                                            <span class="btn btn-sm btn-primary"> Edit </span>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach


                                @endif
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>






            {{-- Edit form --}}
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Edit Record Absent</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <form action="{{ route('update.highSchool.absentRecord',['grade_id'=>$grade_id->id,'student_id'=>$students->id, 'absentRecord_id'=>$absentRecord->id]) }}" method="post">

                            {{ csrf_field() }}

                            <div class="modal-body">
                                <label for="exampleInputEmail1">Select absent type</label>
                                <select name="absent_type" id="" class="form-control" required>
                                                
                                    <option value="{{ $absentRecord->absent_type }}">{{ $absentRecord->absent_type }} </option>
                                    <option value="Unexcused">Unexcused</option>
                                    <option value="Excused">Excused</option>
                                    <option value="Tardy">Tardy</option>

                                                
                            </select>
                            </div>

                            <div class="modal-body">
                                <label for="exampleInputEmail1">Select Quarter</label>
                                <select name="quarter_id" id="" class="form-control" required>
                                        

                                    @if(count($daypresent))
                                    @foreach($daypresent as $daypresents)
                                        <option value="{{ $daypresents->id }}" 
                                            @if($absentRecord->quarter_name  == $daypresents->quarter_name) selected @endif
                                         >
                                            {{ $daypresents->quarter_name }}
                                            - {{$daypresents->quarter_day_present}} days
                                        </option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>

                            <div class="modal-body">
                                <label for="exampleInputEmail1">Absent date</label>
                                <input type="text" name="absent_date" class="form-control" min="2000-01-01" max="2050-12-01" value="{{ $absentRecord->absent_date }}">
                            </div>
                            <div class="modal-body">
                                <label for="exampleInputEmail1">Reason</label>
                                <textarea rows="4" cols="50" wrap="hard" name="reason" class="form-control" placeholder="Reason"  autofocus>
                                    {!! $absentRecord->reason !!}
                                </textarea>
                            </div>



                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">update</button>
                                <a href="{{ route('delete.highSchool.absentRecord', ['grade_id'=>$grade_id->id,'student_id'=>$students->id, 'absentRecord_id'=>$absentRecord->id] ) }}" type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>

                            </div>
                        </form>

                    </div>
                </div>
            </div>




        </div>

        <!-- /page content -->
@endsection