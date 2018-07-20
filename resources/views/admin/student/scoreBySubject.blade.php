<script
src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
integrity="sha256-k2WSCIexGzOj3Euiig+TlR8gA0EmPjuc79OEeY5L45g="
crossorigin="anonymous">
</script>

        {{--This tap--}}
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">

                <div class="x_content">
                    <form role="form" class="form-group" action="{{ route('student.score.insert', ['student_id'=>$students->id]) }}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                    <div class="col-xs-12">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="home">
                                <div class="tab-pane" id="table">
                                    <table id="datatable-fixed-header" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            {{--<th width="10%">N</th>--}}
                                            {{--<th>Grade</th>--}}
                                            <th width="80%">Subject</th>
                                            {{--<th>Quarter 1</th>--}}
                                            {{--<th>Quarter 2</th>--}}
                                            {{--<th>Quarter 3</th>--}}
                                            {{--<th>Quarter 4</th>--}}
                                            <th style="text-align: center" width="10%"><a href="#" class="btn btn-success btn-xs addRow"><i class="glyphicon glyphicon-plus"></i></a></th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <tr>
                                            {{--<td><input type="hidden" name="student_profile_id[]" value="{{ $students->id }}" size="20">{{ $students->card_id }}</td>--}}
                                            {{--<td ><input type="hidden" name="grade_id[]" value=" {{ $subjects->grade_id }}">--}}
                                                {{--@if(count($grade))--}}
                                                    {{--@foreach($grade as $grades)--}}
                                                        {{--@if($subjects->grade_id  == $grades->id)--}}
                                                            {{--{{ $grades->grade_name }}--}}
                                                        {{--@endif--}}
                                                    {{--@endforeach--}}
                                                {{--@endif</td>--}}

                                            <td>
                                                <select name="subject[]" class="col-md-12 form-control">
                                                    @if(count($subject))
                                                        @foreach($subject as $subjects)
                                                            <option value="{{ $subjects->id }}">{{ $subjects->name }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </td>
                                            {{--<td><input type="number" name="quarter1[]" size="10" maxlength="6" style="font-weight: bold"></td>--}}
                                            {{--<td><input type="number" name="quarter2[]" maxlength="6" style="font-weight: bold"></td>--}}
                                            {{--<td><input type="number" name="quarter3[]" maxlength="6" style="font-weight: bold"></td>--}}
                                            {{--<td><input type="number" name="quarter4[]" maxlength="6" style="font-weight: bold"></td>--}}
                                            <td style="text-align: center"><a href="#" class="btn btn-danger btn-xs remove"><i class="glyphicon glyphicon-remove"></i> </a></td>
                                        </tr>


                                        </tbody>

                                    </table>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Save</button>
                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>
                </form>
                    <div class="clearfix"></div>

                </div>
            </div>
        </div>
        {{--end tap--}}
        <style type="text/css">
            input[type=number]{
                width:70px;
            }
        </style>
        <script type="text/javascript">
            $('.addRow').on('click', function(){
                addRow();
            });
            function addRow() {
               var html = '<tr>'+
                        '<td>'+
                        '<select name="subject[]" class="col-md-12 form-control">'+
                        '@if(count($subject))'+
                        '@foreach($subject as $subjects)'+
                        '<option value="{{ $subjects->id }}">{{ $subjects->name }}</option>'+
                        '@endforeach'+
                        '@endif'+
                        '</select>'+
                        '</td>'+
                        '<td style="text-align: center"><a href="#" class="btn btn-danger btn-xs remove"><i class="glyphicon glyphicon-remove"></i> </a></td>'+
                        '</tr>';
                $('tbody').append(html);
            };


            $(document).on('click','.remove', function(){
              // alert('this is testing');
                var l = $('tbody tr').length;
                if(l==1){
                    alert('You can not remove the last one');
                }else{
                    $(this).closest('tr').remove();
                }

            });

        </script>