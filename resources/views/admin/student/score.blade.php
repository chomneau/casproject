
        {{--This tap--}}
        <div class="col-md-12 col-sm-6 col-xs-12">
            <div class="x_panel">

                <div class="x_content">
                    <div class="col-xs-2">
                        <!-- required for floating -->
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs tabs-left">
                            @if(count($grade))
                                @foreach($grade as $grades)
                                    {{--@if($students->grade_id == $grades->id )--}}
                                        <li>
                                            <a href="{{ route('subject.score', ['grade_id'=>$grades->id,'student_id'=>$students->id]) }}">
                                                {{ $grades->grade_name }}
                                            </a>
                                        </li>
                                    {{--@endif--}}
                                @endforeach
                            @endif
                        </ul>
                    </div>

                    {{--<div class="col-xs-10">--}}
                        {{--<!-- Tab panes -->--}}
                        {{--<div class="tab-content">--}}
                            {{--<div class="tab-pane active" id="home">--}}
                                {{--<div class="tab-pane" id="table">--}}
                                    {{--<table id="datatable-fixed-header" class="table table-striped table-bordered">--}}
                                        {{--<thead>--}}
                                        {{--<tr>--}}
                                            {{--<th>Student ID</th>--}}
                                            {{--<th>Subject</th>--}}
                                            {{--<th>Grade</th>--}}
                                            {{--<th>Quarter 1</th>--}}
                                            {{--<th>Quarter 2</th>--}}
                                            {{--<th>Quarter 3</th>--}}
                                            {{--<th>Quarter 4</th>--}}
                                            {{--<th>Semester 1</th>--}}
                                            {{--<th>Semester 2</th>--}}
                                        {{--</tr>--}}
                                        {{--</thead>--}}


                                        {{--<tbody>--}}
                                        {{--@if(count($scores))--}}
                                        {{--@foreach($scores as $score)--}}
                                        {{--<tr>--}}
                                            {{--<td>{{ $score->student_id }}</td>--}}

                                            {{-- display subject name --}}
                                            {{--@if(count($subject))--}}
                                                {{--@foreach ($subject as $subjects)--}}
                                                    {{--@if($score->subject_id == $subjects->id)--}}
                                                        {{--<td>{{ $subjects->name }}</td>--}}
                                                    {{--@endif--}}
                                                {{--@endforeach--}}
                                            {{--@endif--}}
                                            {{--display grade name--}}
                                            {{--@if(count($grade))--}}
                                                {{--@foreach ($grade as $grades)--}}
                                                    {{--@if($score->grade_id == $grades->id)--}}
                                                        {{--<td>{{ $grades->grade_name }}</td>--}}
                                                    {{--@endif--}}
                                                {{--@endforeach--}}
                                            {{--@endif--}}

                                            {{--<td>{{ $score->quater_1 }}</td>--}}
                                            {{--<td>{{ $score->quater_2 }}</td>--}}
                                            {{--<td>{{ $score->quater_3 }}</td>--}}
                                            {{--<td>{{ $score->quater_4 }}</td>--}}
                                            {{--Semeter 1--}}
                                            {{--<td>{{ $score->quater_1 += $score->quater_2 }}</td>--}}
                                            {{--Semeter 2--}}
                                            {{--<td>{{ $score->quater_3 += $score->quater_4 }}</td>--}}

                                        {{--</tr>--}}
                                        {{--@endforeach--}}
                                        {{--@endif--}}
                                        {{--</tbody>--}}
                                    {{--</table>--}}

                                {{--</div>--}}
                            {{--</div>--}}

                        {{--</div>--}}
                    {{--</div><div class="col-xs-10">--}}
                        {{--<!-- Tab panes -->--}}
                        {{--<div class="tab-content">--}}
                            {{--<div class="tab-pane active" id="home">--}}
                                {{--<div class="tab-pane" id="table">--}}
                                    {{--<table id="datatable-fixed-header" class="table table-striped table-bordered">--}}
                                        {{--<thead>--}}
                                        {{--<tr>--}}
                                            {{--<th>Student ID</th>--}}
                                            {{--<th>Subject</th>--}}
                                            {{--<th>Grade</th>--}}
                                            {{--<th>Quarter 1</th>--}}
                                            {{--<th>Quarter 2</th>--}}
                                            {{--<th>Quarter 3</th>--}}
                                            {{--<th>Quarter 4</th>--}}
                                            {{--<th>Semester 1</th>--}}
                                            {{--<th>Semester 2</th>--}}
                                        {{--</tr>--}}
                                        {{--</thead>--}}


                                        {{--<tbody>--}}
                                        {{--@if(count($scores))--}}
                                        {{--@foreach($scores as $score)--}}
                                        {{--<tr>--}}
                                            {{--<td>{{ $score->student_id }}</td>--}}

                                            {{-- display subject name --}}
                                            {{--@if(count($subject))--}}
                                                {{--@foreach ($subject as $subjects)--}}
                                                    {{--@if($score->subject_id == $subjects->id)--}}
                                                        {{--<td>{{ $subjects->name }}</td>--}}
                                                    {{--@endif--}}
                                                {{--@endforeach--}}
                                            {{--@endif--}}
                                            {{--display grade name--}}
                                            {{--@if(count($grade))--}}
                                                {{--@foreach ($grade as $grades)--}}
                                                    {{--@if($score->grade_id == $grades->id)--}}
                                                        {{--<td>{{ $grades->grade_name }}</td>--}}
                                                    {{--@endif--}}
                                                {{--@endforeach--}}
                                            {{--@endif--}}

                                            {{--<td>{{ $score->quater_1 }}</td>--}}
                                            {{--<td>{{ $score->quater_2 }}</td>--}}
                                            {{--<td>{{ $score->quater_3 }}</td>--}}
                                            {{--<td>{{ $score->quater_4 }}</td>--}}
                                            {{--Semeter 1--}}
                                            {{--<td>{{ $score->quater_1 += $score->quater_2 }}</td>--}}
                                            {{--Semeter 2--}}
                                            {{--<td>{{ $score->quater_3 += $score->quater_4 }}</td>--}}

                                        {{--</tr>--}}
                                        {{--@endforeach--}}
                                        {{--@endif--}}
                                        {{--</tbody>--}}
                                    {{--</table>--}}

                                {{--</div>--}}
                            {{--</div>--}}

                        {{--</div>--}}
                    {{--</div>--}}

                    <div class="clearfix"></div>

                </div>
            </div>
        </div>
        {{--end tap--}}