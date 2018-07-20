@extends('admin.admin-layout.main')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>User Profile
                        <span>
                            <a href="{{ route('admin.adminProfile.edit', ['id'=>$adminProfile->id]) }}" class="btn btn-success btn-sm ">
                               <i class="fa fa-edit m-right-xs"></i>
                                Edit Profile
                            </a>
                        </span>
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
                                    <img src="{{ asset($adminProfile->AdminProfile->avatar) }}" alt="user profile" width="150" height="150">

                                </div>

                                <div class="col-md-9">


                                            <div class="x_content" style="margin-top: -10px">
                                                <div class="dashboard-widget-content">

                                                    <ul class="quick-list">
                                                        <li><i class="glyphicon glyphicon-user"></i>
                                                            <a href="#">Username : {{ $adminProfile->name }}</a>
                                                        </li>
                                                        <li><i class="fa fa-envelope"></i>
                                                            <a href="#">E-mail : {{ $adminProfile->email }} </a>
                                                        </li>
                                                        <li><i class="fa fa-tachometer"></i>
                                                            <a href="#">Role :

                                                                    @if($adminProfile->admin)
                                                                        <span>
                                                                            <button type="button" class="btn btn-success btn-xs">
                                                                                Admin
                                                                            </button>
                                                                        </span>
                                                                        <span>
                                                                            <button type="button" class="btn btn-warning btn-xs">
                                                                                <a href="{{ route('admin.removeAdmin',['id'=>$adminProfile->id]) }}">
                                                                                    Remove permission
                                                                                </a>
                                                                            </button>
                                                                        </span>

                                                                    @else
                                                                    <span>
                                                                        <button type="button" class="btn btn-success btn-xs">
                                                                            User
                                                                        </button>
                                                                    </span>
                                                                    <span>
                                                                        <button type="button" class="btn btn-warning btn-xs">
                                                                           <a href="{{ route('admin.makeAdmin',['id'=>$adminProfile->id]) }}">
                                                                               Make admin
                                                                           </a>

                                                                        </button>
                                                                    </span>

                                                                    @endif

                                                            </a>
                                                        </li>
                                                        <li><i class="fa fa-phone-square"></i>
                                                            <a href="#">Phone : {{ $adminProfile->Adminprofile->phone }}</a> </li>
                                                        <li><i class="glyphicon glyphicon-home"></i>
                                                            <a href="#">Address : {{ $adminProfile->Adminprofile->address }}</a>
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
                        
                        
                        <div class="x_title">
                            <h2>About {{ $adminProfile->name }} </h2>
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
                            <div class="clearfix"></div>
                        </div>

                        <div class="x_content">
                            <blockquote class="message" id="body" style="margin-right: 2em">
                                {!!  $adminProfile->adminprofile->about !!}
                                {{--<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>--}}
                            </blockquote>
                        </div>



                    </div>

                </div>
            </div>
        </div>

    <!-- /page content -->

@endsection