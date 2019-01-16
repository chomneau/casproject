
@extends('admin.admin-layout.main') 
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Student Profile
                    <span>
                            <a href="{{ route('student.detail.edit', ['id'=>$students->id]) }}" class="btn btn-success btn-sm ">
                               <i class="fa fa-edit m-right-xs"></i>
                                Edit Profile
                            </a>
                        </span>


                </h3>
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

                    <div class="row">
                        {{--start col-container--}}
                        <div class="col-md-12 " style="margin-top: 2em">
                            <div class="col-md-2">
                                <img src="{{ asset($students->photo) }}" alt="user profile" width="150" height="150">


                                <a href="{{ route('student.changePassword', ['student_id'=>$students->id])}}" class="btn btn-primary btn-sm" style="margin-top: 10px; margin-left: 10px"  >
                                    <span><i class="fas fa-unlock"></i></span> Change Password
                                </a>


                                <div class="help-block col-md-8 offset-md-2">
                                    @if(Session::has('error'))
                                        <strong style="color: red;" >{{Session::get('error')}}</strong>
                                    @endif

                                </div>

                               

                            </div>

                            <div class="col-md-3">

                                <div class="x_content" style="margin-top: -10px">
                                    <div class="dashboard-widget-content">

                                        <ul style="margin-top: 15px; list-style: none; font-size: 14px">
                                            <li style="margin-bottom: 8px"><i class="glyphicon glyphicon-user"></i>
                                                <a href="#">Name : {{ $students->first_name }} {{ $students->last_name }}</a>
                                            </li>
                                            <li style="margin-bottom: 8px"><i class="fa fa-transgender"></i>
                                                <a href="#">Gender : {{ $students->gender }} </a>
                                            </li>

                                            <li style="margin-bottom: 8px"><i class="fa fa-calendar"></i>
                                                <a href="#">Date of birth : {{ $students->date_of_birth }} </a>
                                            </li>

                                            <li style="margin-bottom: 8px"><i class="fa fa-list-ul"></i>
                                                <a href="#">Grade :  </a>
                                                <button type="button" class="btn btn-success btn-xs">

                                                            @if(count($gradeProfile))
                                                                @foreach($gradeProfile as $grades)
                                                                    @if($students->grade_profile_id  == $grades->id)
                                                                        {{ $grades->name }}
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                            </button>

                                            </li>
                                            <li style="margin-bottom: 8px"><i class="fa fa-credit-card"></i>
                                                <a href="#">Student id : {{ $students->card_id }} </a>
                                            </li>
                                            <li style="margin-bottom: 8px"><i class="fa fa-flag"></i>
                                                <a href="#">Nationality : {{ $students->nationality }} </a>
                                            </li>

                                            <li style="margin-bottom: 8px"><i class="glyphicon glyphicon-home"></i>
                                                <a href="#">Start date : {{ $students->created_at->format('M d, Y') }}</a>
                                            </li>


                                        </ul>


                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">

                                <div class="studentDetail">
                                    <div class="dashboard-widget-content">

                                        <ul style="margin-top: 5px; list-style: none; font-size: 14px">
                                            <li>
                                                <h4>Father info</h4>
                                            </li>
                                            <li style="margin-bottom: 8px"><i class="glyphicon glyphicon-user"></i>
                                                <a href="#">Father's name : {{ $students->father_name }}</a>
                                            </li>
                                            <li style="margin-bottom: 8px"><i class="fa fa-briefcase"></i>
                                                <a href="#">Occupation : {{ $students->father_occupation }} </a>
                                            </li>

                                            <!-- <li style="margin-bottom: 8px"><i class="fa fa-calendar"></i>
                                                <a href="#">Age :
                                                            {{ floor((time() - strtotime( $students->parents_dob )) / 31556926) }} years old
                                                            </a>
                                            </li> -->

                                            <li style="margin-bottom: 8px"><i class="fa fa-phone"></i>
                                                <a href="#">Phone : {{ $students->father_phone }} </a>
                                            </li>

                                            <li style="margin-bottom: 8px"><i class="fa fa-envelope"></i>
                                                <a href="#">Email : {{ $students->father_email }} </a>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-3">

                                <div class="studentDetail">
                                    <div class="dashboard-widget-content">

                                        <ul style="margin-top: 5px; list-style: none; font-size: 14px">
                                            <li>
                                                <h4>Mother info</h4>
                                            </li>
                                            <li style="margin-bottom: 8px"><i class="glyphicon glyphicon-user"></i>
                                                <a href="#">Mother's name : {{ $students->mother_name }}</a>
                                            </li>
                                            <li style="margin-bottom: 8px"><i class="fa fa-briefcase"></i>
                                                <a href="#">Occupation : {{ $students->mother_occupation }} </a>
                                            </li>

                                            

                                            <li style="margin-bottom: 8px"><i class="fa fa-phone"></i>
                                                <a href="#">Phone : {{ $students->mother_phone }} </a>
                                            </li>

                                            <li style="margin-bottom: 8px"><i class="fa fa-envelope"></i>
                                                <a href="#">Email : {{ $students->mother_email }} </a>
                                            </li>

                                            <li style="margin-bottom: 8px"><i class="fa fa-home"></i>
                                                <a href="#">Address : {{ $students->address }} </a>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                </div>

                            </div>


                            <br />
                        </div>
                        {{--end of col-container container--}}
                    </div>





                        <div class="x_title">
                            <h3>Transcript </h3>

                            <div class="clearfix"></div>
                        </div>
                        

                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Transcript by Grade</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">CGPA G 9 - 10</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">CGPA G 9 - 11</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content4" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">CGPA G 9 - 12</a>
                        </li>

                        <li role="presentation" class=""><a href="#tab_content5" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">CGPA G 10 - 11</a>
                        </li>

                        <li role="presentation" class=""><a href="#tab_content7" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">CGPA G 10 - 12</a>
                        </li>

                        <li role="presentation" class=""><a href="#tab_content6" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">CGPA G 11 - 12</a>
                        </li>



                      </ul>
                      <div id="myTabContent" class="tab-content">

                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                          <!-- Transcript for high school -->

                            <div class="col-md-3 col-sm-6 col-xs-12" style="margin-left: 1.6em">
                                <div class="x_panel">
                                  <div class="x_title">
                                    <h2>GPA By Grade</h2>
                                    <div class="clearfix"></div>
                                  </div>
                                      <form action="{{ route('highschool.transcript', ['student_id'=>$students->id]) }}" method="GET">
                                          {{ csrf_field() }}
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="home">

                                                    @if(count($grade))
                                                        @foreach($grade as $grades)


                                                            <div class="checkbox">
                                                                <label>
                                                                  <input type="radio" name="grade" id ="radio" class="flat" value="{{$grades->id}}">

                                                                  {{ $grades->grade_name }}

                                                                </label>
                                                            </div>


                                                        @endforeach

                                                    @endif

                                                </div>

                                                <div class="pull-right" style="margin-top: -80px">
                                                    <input type="submit" value="print view" id="submit_yearly" class="btn btn-success btn-sm">
                                                </div>

                                            </div>
                                        <!-- end form -->

                                      </form>
                                </div>
                            </div>

                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                          {{--CGPA for Grade 9-10 Hight school--}}
                            <div class="col-md-3 col-sm-6 col-xs-12" style="margin-left: 13.5em">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>CGPA Grade 9-10</h2>
                                        <div class="clearfix"></div>

                                    </div>
                                    <form action="{{ route('transcript910', ['student_id'=>$students->id]) }}" method="GET">
                                        {{ csrf_field() }}
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="home">

                                            <label for="checkall">
                                                <input type="checkbox" id="checkall" > Check all
                                            </label>
                                            <hr>

                                                @if(count($grade))
                                                    @foreach($grade as $grades)

                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" class="checkItem" 
                                                                name="grade[]"  value="{{$grades->id}}"  >

                                                                {{ $grades->grade_name }}

                                                            </label>
                                                        </div>


                                                    @endforeach

                                                @endif

                                            </div>

                                            <div class="pull-right" style="margin-top: -80px">
                                                <input type="submit" value="print view" id="submit" class="btn btn-success ">
                                            </div>

                                        </div>
                                        <!-- end form -->

                                    </form>
                                </div>
                            </div>
                        {{--end CGPA grade 9-10--}}
                        </div>

                    <!-- CGPA for grade 9-11 -->

                        <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                          {{--CGPA for Grade 9-11 Hight school--}}
                            <div class="col-md-3 col-sm-6 col-xs-12 pull-right" style="margin-right: 39.5em">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>CGPA Grade 9-11</h2>
                                        <div class="clearfix"></div>

                                    </div>
                                    <form action="{{ route('transcript911', ['student_id'=>$students->id]) }}" method="GET">
                                        {{ csrf_field() }}
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="home">

                                            <label for="checkall">
                                                <input type="checkbox" id="checkall" > Check all
                                            </label>
                                            <hr>

                                                @if(count($grade))
                                                    @foreach($grade as $grades)

                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" class="checkItem" 
                                                                name="grade[]"  value="{{$grades->id}}"  >

                                                                {{ $grades->grade_name }}

                                                            </label>
                                                        </div>


                                                    @endforeach

                                                @endif

                                            </div>

                                            <div class="pull-right" style="margin-top: -80px">
                                                <input type="submit" value="print view" id="submit" class="btn btn-success ">
                                            </div>

                                        </div>
                                        <!-- end form -->

                                    </form>
                                </div>
                            </div>
                        {{--end CGPA grade 9-11--}}
                        </div>


                        <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">
                          

                        {{--CGPA for Hight school--}}
                            <div class="col-md-3 col-sm-6 col-xs-12 pull-right" style="margin-right: 27.5em">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>CGPA Grade 9 - 12</h2>
                                        <div class="clearfix"></div>

                                    </div>
                                    <form action="{{ route('cgpa.school', ['student_id'=>$students->id]) }}" method="GET">
                                        {{ csrf_field() }}
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="home">

                                            <label for="checkall">
                                                <input type="checkbox" id="checkall" > Check all
                                            </label>
                                            <hr>

                                                @if(count($grade))
                                                    @foreach($grade as $grades)

                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" class="checkItem" 
                                                                name="grade[]"  value="{{$grades->id}}"  >

                                                                {{ $grades->grade_name }}

                                                            </label>
                                                        </div>


                                                    @endforeach

                                                @endif

                                            </div>

                                            <div class="pull-right" style="margin-top: -80px">
                                                <input type="submit" value="print view" id="submit" class="btn btn-success ">
                                            </div>

                                        </div>
                                        <!-- end form -->

                                    </form>
                                </div>
                            </div>
                        {{--end CGPA--}}


                        </div>


                        {{--CGPA 10-11--}}

                        <div role="tabpanel" class="tab-pane fade" id="tab_content5" aria-labelledby="profile-tab">
                          

                        {{--CGPA for Hight school--}}
                            <div class="col-md-3 col-sm-6 col-xs-12 pull-right" style="margin-right: 15.5em">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>CGPA Grade 10 - 11</h2>
                                        <div class="clearfix"></div>

                                    </div>
                                    <form action="{{ route('transcript1011', ['student_id'=>$students->id]) }}" method="GET">
                                        {{ csrf_field() }}
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="home">

                                            <label for="checkall">
                                                <input type="checkbox" id="checkall" > Check all
                                            </label>
                                            <hr>

                                                @if(count($grade))
                                                    @foreach($grade as $grades)

                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" class="checkItem" 
                                                                name="grade[]"  value="{{$grades->id}}"  >

                                                                {{ $grades->grade_name }}

                                                            </label>
                                                        </div>


                                                    @endforeach

                                                @endif

                                            </div>

                                            <div class="pull-right" style="margin-top: -80px">
                                                <input type="submit" value="print view" id="submit" class="btn btn-success ">
                                            </div>

                                        </div>
                                        <!-- end form -->

                                    </form>
                                </div>
                            </div>
                        


                        </div>

                        {{--end CGPA 10-11 --}}


                        {{--CGPA 11-12--}}

                        <div role="tabpanel" class="tab-pane fade" id="tab_content6" aria-labelledby="profile-tab">
                          

                        {{--CGPA for Hight school--}}
                            <div class="col-md-3 col-sm-6 col-xs-12 pull-right" style="margin-right: 3.5em">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>CGPA Grade 11 - 12</h2>
                                        <div class="clearfix"></div>

                                    </div>
                                    <form action="{{ route('transcript1112', ['student_id'=>$students->id]) }}" method="GET">
                                        {{ csrf_field() }}
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="home">

                                            <label for="checkall">
                                                <input type="checkbox" id="checkall" > Check all
                                            </label>
                                            <hr>

                                                @if(count($grade))
                                                    @foreach($grade as $grades)

                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" class="checkItem" 
                                                                name="grade[]"  value="{{$grades->id}}"  >

                                                                {{ $grades->grade_name }}

                                                            </label>
                                                        </div>


                                                    @endforeach

                                                @endif

                                            </div>

                                            <div class="pull-right" style="margin-top: -80px">
                                                <input type="submit" value="print view" id="submit" class="btn btn-success ">
                                            </div>

                                        </div>
                                        <!-- end form -->

                                    </form>
                                </div>
                            </div>
                        {{--end CGPA--}}


                        </div>

                        {{--end CGPA 10-11 --}}


                        {{--CGPA 10-12--}}

                        <div role="tabpanel" class="tab-pane fade" id="tab_content7" aria-labelledby="profile-tab">
                          

                        {{--CGPA for Hight school--}}
                            <div class="col-md-3 col-sm-6 col-xs-12 pull-right" style="margin-right: 10.5em">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>CGPA Grade 10 - 12</h2>
                                        <div class="clearfix"></div>

                                    </div>
                                    <form action="{{ route('transcript1012', ['student_id'=>$students->id]) }}" method="GET">
                                        {{ csrf_field() }}
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="home">

                                            <label for="checkall">
                                                <input type="checkbox" id="checkall" > Check all
                                            </label>
                                            <hr>

                                                @if(count($grade))
                                                    @foreach($grade as $grades)

                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" class="checkItem" 
                                                                name="grade[]"  value="{{$grades->id}}"  >

                                                                {{ $grades->grade_name }}

                                                            </label>
                                                        </div>


                                                    @endforeach

                                                @endif

                                            </div>

                                            <div class="pull-right" style="margin-top: -80px">
                                                <input type="submit" value="print view" id="submit" class="btn btn-success ">
                                            </div>

                                        </div>
                                        <!-- end form -->

                                    </form>
                                </div>
                            </div>
                        


                        </div>

                        {{--end CGPA 10-12 --}}







                      </div>
                    </div>

                        

                        

                    </div>

                </div>
            </div>
        </div>
    </div>



  



<!-- Latest compiled and minified JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 

	<!-- <script type="text/javascript">
		$("#checkall").change(function(){
			$(".checkItem").prop("checked", $(this).prop("checked"))
		})
	</script> -->

<script>
    $(document).ready(function () {
    var ckbox = $('#checkall');
    var radio = $('#radio');
    $("#submit").hide();
   

    $('#checkall').on('click',function () {
        if (ckbox.is(':checked')) {
            $(".checkItem").prop("checked", true);
            $("#submit").show();
            $(".checkItem").disable();
        } else {
            $(".checkItem").prop("checked", false);
            $("#submit").hide();
        }
    });

});
    
    <!-- /page content -->

</script>

@endsection