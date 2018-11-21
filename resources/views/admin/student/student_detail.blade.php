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
                                                <a href="#">Father s'name : {{ $students->father_name }}</a>
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
                                                <a href="#">Mother s'name : {{ $students->mother_name }}</a>
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
                        <h2>{{ $students->first_name }}'s Score Record </h2>

                        <div class="clearfix"></div>
                    </div>


            @include('admin.student.grade_menu')
                

                </div>

            </div>
        </div>
    </div>

    <!-- /page content -->
@endsection