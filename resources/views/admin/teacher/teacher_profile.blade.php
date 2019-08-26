@extends('admin.admin-layout.main') 
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Teacher Profile
                    


                </h3>
            </div>


        </div>
        

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                    <div class="row">
                        {{--start col-container--}}
                        <div class="col-md-12 " style="margin-top: 2em">
                            <div class="col-md-2">
                                <img src="{{ asset($teacher->photo) }}" alt="user profile" width="150" height="150">


                                <div class="help-block col-md-8 offset-md-2">
                                    @if(Session::has('error'))
                                        <strong style="color: red;" >{{Session::get('error')}}</strong>
                                    @endif

                                </div>                              

                            </div>

                            <div class="col-md-6">

                                <div class="x_content" style="margin-top: -10px">
                                    <div class="dashboard-widget-content">

                                        <ul style="margin-top: 15px; list-style: none; font-size: 14px">
                                            <li style="margin-bottom: 8px"><i class="glyphicon glyphicon-user"></i>
                                                <a href="#">Name :  {{ $teacher->last_name }}, {{ $teacher->first_name }}</a>
                                            </li>
                                            <li style="margin-bottom: 8px"><i class="fa fa-transgender"></i>
                                                <a href="#">Gender : {{ $teacher->gender }} </a>
                                            </li>

                                            <li style="margin-bottom: 8px"><i class="fa fa-calendar"></i>
                                                <a href="#">Date of Birth : {{ $teacher->date_of_birth }} </a>
                                            </li>

                                            <li style="margin-bottom: 8px"><i class="fa fa-home"></i>
                                                <a href="#">Homeroom/Subject :  </a>
                                                <button type="button" class="btn btn-success btn-xs">

                                                            @if(count($gradeProfile))
                                                                @foreach($gradeProfile as $grades)
                                                                    @if($teacher->grade_profile_id  == $grades->id)
                                                                        {{ $grades->name }}
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                            </button>

                                            </li>

                                            <li style="margin-bottom: 8px"><i class="fa fa-mobile"></i>
                                                <a href="#">Phone : {{ $teacher->phone }} </a>
                                            </li>

                                            <li style="margin-bottom: 8px"><i class="fa fa-sitemap"></i>
                                                <a href="#">Position : {{ $teacher->position }} </a>
                                            </li>

                                            <li style="margin-bottom: 8px"><i class="fa fa-graduation-cap"></i>
                                                <a href="#">Degree : {{ $teacher->degree }} </a>
                                            </li>

                                            <li style="margin-bottom: 8px">
                                                <i class="fa fa-envelope"></i>
                                                <a href="#">Email : {{ $teacher->email }} </a>
                                            </li>
                                            

                                            


                                        </ul>


                                    </div>
                                </div>
                            </div>

                            





                            <br />
                        </div>
                        {{--end of col-container container--}}
                    </div>




                

                </div>

            </div>
        </div>
    </div>

    <!-- /page content -->
@endsection