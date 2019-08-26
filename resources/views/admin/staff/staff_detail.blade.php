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

                            {{-- start tap  --}}
                <div class="col-md-12">
                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                              <li role="presentation" class="active">
                                <a href="#tab_content1" role="tab" id="profile-tab2"data-toggle="tab" aria-expanded="false">
                                  <b>Absent</b>
                                </a>
                              </li>
                                                    
                            </ul>
    
                            <div id="myTabContent" class="tab-content">
    
                                <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">                           
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addNewAbsent" data-whatever="@mdo"><i class="fa fa-plus-square" aria-hidden="true"></i> Add New Absent</button>
        
                                    @include('admin.staff.add_new_absent_form')
        
                
                                    <!-- start user projects -->
                                    <table class="data table table-striped no-margin" id="AbsentTable">
                                      <thead>
                                        <tr>
                                          <th>#</th>
                                          <th>Absent Type</th>
                                          <th width="40%">Reason</th>
                                          <th width="10%">Days</th>
                                          <th>From</th>
                                          <th>To</th>
                                          <th width="10%">Record date</th>
                                          <th class="text-center">Action</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        @foreach ($staffAsent as $staffAsents) 
                                                                           
                                         <tr>
                                          <td>{{ $staffAsents->id }}</td>
                                          <td>{{ $staffAsents->absent_type }}</td>
                                          <td>{{ $staffAsents->reason }}</td>
                                          <td>{{ $staffAsents->number_day }}</td>
                                          <td>{{ date('d-M-Y', strtotime($staffAsents->from)) }}</td>
                                          <td>{{ date('d-M-Y', strtotime($staffAsents->to)) }}</td>
                                          <td class="text-primary">{{ date('d-M-Y', strtotime($staffAsents->created_at)) }}</td>
                                          
                                          
                                          <td class="pull-right">
    
                                          <a href="{{ route('admin.editStaff.absent', ['staffAbsent_id'=>$staffAsents->id, 'admin_id'=>$admin->id, 'staff_id'=>$staff->id]) }}" class="btn btn-info btn-sm">Edit</a>
                                                                                 
                                           <a href="{{ route('admin.deleteStaff.absent', ['id'=>$staffAsents->id])}}" class="btn btn-danger btn-sm" Onclick="return ConfirmDelete()">Delete</a>
                                                                                
                                          </td>
                                        </tr>                                         
    
                                        <script>
                                        function ConfirmDelete() 
                                            {
                                                return confirm("Are you sure you want to delete?");
                                            }
                                        </script>
                                        @endforeach
                                        
                                      </tbody>
                                    </table>
                                    
                                  </div>
    
                            
    
    
    
                            </div>
                          </div>
                    </div>
                    {{-- end of tap --}}



                        </div>

                    </div>

                </div>
            </div>
        </div>

    <!-- /page content -->

@endsection