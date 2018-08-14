@extends('admin.admin-layout.main') 
@section('content')

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">

        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">

                        <h2> <i class="fa fa-sliders" aria-hidden="true"></i> Update score subject</h2>

                        {{--
    @include('admin.grade.highschool.grade-form') --}}
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <form role="form" class="form-group" action="{{ route('prek.update', ['score_id'=>$scores->id, 'grade_id'=>$grade_id->id,'student_id'=>$students->id]) }}"
                            method="post">
                            {{csrf_field()}}

                            <table id="datatable-fixed-header" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Student ID</th>
                                        <th>Subject</th>
                                        <th>Grade</th>
                                        <th>Quarter 1</th>
                                        <th>Quarter 2</th>
                                        <th>Quarter 3</th>
                                        <th>Quarter 4</th>

                                    </tr>
                                </thead>


                                <tbody>
                                    <td>{{ $scores->studentprofile->card_id }}</td>


                                    <td>{{ $scores->KSubject->name }}</td>
                                    <td>{{ $scores->KLevel->name }}</td>



                                    <td width="30px"><input type="text" name="quarter1" value="{{$scores->quarter_1}}" class="form-control-sm"></td>
                                    <td width="15%"><input type="text" name="quarter2" value="{{$scores->quarter_2}}" class="form-control-sm"></td>
                                    <td width="15%"><input type="text" name="quarter3" value="{{$scores->quarter_3}}" class="form-control-sm"></td>
                                    <td width="15%"><input type="text" name="quarter4" value="{{$scores->quarter_4}}" class="form-control-sm"></td>

                                </tbody>
                            </table>

                            <input type="submit" class="btn btn-success" value="Update now">

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
@endsection