@extends('admin.admin-layout.main') 
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h4>Student Name : {{ $students->last_name}} {{ $students->first_name}}
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
                        <h2>Absent Record's {{ $students->first_name }} {{ $students->last_name}} in : {{ $grade_id->name}}
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
                                    <th>Reason</th>
                                    <th>Absent date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!count($prekAbsent))
                                    <tr class="text-center">
                                        <td colspan="6"><h4>No record found !</h4> </td>

                                    </tr>
                                @else
                                @foreach($prekAbsent as $prekAbsents)
                                <tr>
                                    <th scope="row">#</th>
                                    <td>{{ $prekAbsents->studentProfile->first_name }}</td>
                                    <td>{{ $prekAbsents->KLevel->name }}</td>
                                    <td>{{ $prekAbsents->absent_type }}</td>
                                    <td>{{ substr($prekAbsents->reason, 0, 25)}}
                                        <?php
                                            $reason = $prekAbsents->reason;
                                            if(strlen($reason) > 25 )
                                                echo "..."                                           
                                        ?>

                                    </td>
                                    <td>{{ Carbon\Carbon::parse($prekAbsents->absent_date)->format('M d, Y') }}</td>
                                    <td>
                                        <a href="{{ route('edit.prekSchool.absentRecord', ['grade_id'=>$grade_id->id,'id'=>$students->id, 'prekAbsent_id'=>$prekAbsents->id]) }}"><span class="btn btn-sm btn-primary"> Edit </span></a>
                                    </td>
                                </tr>
                                @endforeach @endif
                            </tbody>
                        </table>

                    </div>
                </div>
                {{--Total--}}

                <div class="x_panel">

                    <div class="row tile_count">

                        <div class="col-md-3 col-sm-3 col-xs-6 tile_stats_count text-center">
                            <span class="count_top"><i class="fa fa-user"></i> Unexcused</span>
                            <div class="count">
                                <!-- total here -->
                                {{ $unexcused }}
                            </div>
                            <span class="count_bottom"><i class="green"></i>
                                <!-- text here -->
                        </span>
                        </div>

                        <div class="col-md-3 col-sm-3 col-xs-6 tile_stats_count text-center">
                            <span class="count_top"><i class="fa fa-user"></i> Excused</span>
                            <div class="count">

                                <!-- total here -->
                                {{ $excused }}
                            </div>
                            <span class="count_bottom"><i class="green"></i>
                                <!-- text here -->
                        </span>
                        </div>

                        <div class="col-md-3 col-sm-3 col-xs-6 tile_stats_count text-center">
                            <span class="count_top"><i class="fa fa-user"></i> Tardy</span>
                            <div class="count">

                                <!-- total here -->
                                {{ $tardy }}
                            </div>
                            <span class="count_bottom"><i class="green"></i>
                                <!-- text here -->
                        </span>
                        </div>

                        <div class="col-md-3 col-sm-3 col-xs-6 tile_stats_count text-center">
                            <span class="count_top"><i class="fa fa-clock-o"></i> Total Absent</span>
                            <div class="count">
                                <!-- total here -->
                                {{ floor($totalAbsent) }}
                            </div>
                            <span class="count_bottom">
                        <!-- text here -->
                           </span>
                        </div>


                    </div>

                </div>

            </div>




            {{-- record form --}}
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Record absent</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <form action="{{ route('store.prekSchool.absentRecord',['grade_id'=>$grade_id->id,'id'=>$students->id]) }}" method="post">

                            {{ csrf_field() }}

                            <div class="modal-body">
                                <label for="exampleInputEmail1">Select absent type</label>
                                <select name="absent_type" id="" class="form-control" required>
                                        <option value="">--select absent type--</option>
                                            {{--@if(count($absent))--}}
                                                {{--@foreach($absent as $absents)--}}
                                                    {{--<option value="{{ $absents->id }} ">{{ $absents->absent_type }}</option>--}}
                                                {{--@endforeach--}}
                                            {{--@endif--}}

                                    <option value="Unexcused">Unexcused</option>
                                    <option value="Excused">Excused</option>
                                    <option value="Tardy">Tardy</option>
                                </select>
                            </div>

                            <div class="modal-body">
                                <label for="exampleInputEmail1">Absent date</label>
                                <input type="date" name="absent_date" class="form-control" min="2000-01-01" max="2050-12-01">
                            </div>
                            <div class="modal-body">
                                <label for="exampleInputEmail1">Reason</label>
                                <textarea rows="4" cols="50" wrap="hard" name="reason" class="form-control" placeholder="Reason" required autofocus>
                                    
                                </textarea>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Save</button>

                            </div>
                        </form>

                    </div>
                </div>
            </div>




        </div>

        <!-- /page content -->
@endsection