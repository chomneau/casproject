@extends('admin.admin-layout.main')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Staff Profile
                    @if(Auth::guard('admin')->check())
                        <span>
                            <a href="{{ route('admin.staff.edit', ['id'=>$staff->id]) }}" class="btn btn-success btn-sm ">
                               <i class="fa fa-edit m-right-xs"></i>
                                Edit Profile
                            </a>
                        </span>
                        @endif   
                    </h3>
                </div>


            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        
                        <div class="row">
                            {{--start col-container--}}
                            <div class="col-md-10 " style="margin-top: 2em">
                                <div class="col-md-3">
                                    <img src="{{ asset($staff->photo) }}" alt="user profile" width="150" height="150">

                                </div>

                                <div class="col-md-9">


                                            <div class="x_content" style="margin-top: -10px">
                                                <div class="dashboard-widget-content">

                                                    <ul class="quick-list">
                                                        <li><i class="glyphicon glyphicon-user"></i>
                                                            <a href="#">Name :  {{ $staff->last_name }},
                                                            {{ $staff->first_name }}
                                                            </a>
                                                        </li>
                                                        <li><i class="fa fa-envelope"></i>
                                                            <a href="#">E-mail : {{ $staff->email }} </a>
                                                        </li>
                                                        
                                                        <li><i class="fa fa-phone-square"></i>
                                                            <a href="#">Phone : {{ $staff->phone }}</a> </li>
                                                        <li><i class="glyphicon glyphicon-user"></i>
                                                            <a href="#">Position : {{ $staff->position }}</a>
                                                        </li>

                                                        <li><i class="glyphicon glyphicon-user"></i>
                                                            <a href="#">Degree : {{ $staff->degree }}</a>
                                                        </li>

                                                        <li><i class="glyphicon glyphicon-time"></i>
                                                            <a href="#">Date of Birth : {{ $staff->date_of_birth }}</a>
                                                        </li>


                                                    </ul>


                                                </div>
                                            </div>
                                        </div>

                                    <br />
                                </div>
                            </div>
                            {{--end of col-container container--}}



                        </div>
                        
                        
                        

                        



                    </div>

                </div>
            </div>
        </div>

    <!-- /page content -->

@endsection