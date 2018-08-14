

<script
src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
integrity="sha256-k2WSCIexGzOj3Euiig+TlR8gA0EmPjuc79OEeY5L45g="
crossorigin="anonymous">

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


    <!-- page content -->



            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="x_title">

                            <h2> <i class="fa fa-sliders" aria-hidden="true"></i>  Add Subject to student</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Settings 1</a>
                                        </li>
                                        <li><a href="#">Settings 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            {{--@include('admin.grade.highschool.grade-form')--}}
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">


                            <div class="row">
                                <form action="{{ route('secondary.insertSubject', ['grade_id'=>$grade_id->id, 'student_id'=>$students->id]) }}" method="post">
                                    {{ csrf_field() }}
                                    <div class="col-md-10">
                                        <label for="exampleInputEmail1">Subject by ({{$grade_id->name}})</label>
                                        <select name="subject_id" class="col-md-12 form-control" required>
                                            <option value="">please select subject</option>
                                            @if(count($subjects))
                                                @foreach($subjects as $subject)
                                                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>

                                    <div class="col-md-2" style="margin-top: 20px">

                                        <button type="submit"  class="btn btn-success"><i class="glyphicon glyphicon-plus-sign"></i> Add now</button>
                                    </div>
                                </form>
                            </div>

                        <!-- start project list -->
                         <!-- end project list -->

                        </div>
                    </div>
                </div>
            </div>


    <!-- /page content -->


