@extends('admin.admin-layout.main')
@section('content')

@if(Auth::guard('admin')->check()) 
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      

    </div>
    
    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Teacher Profile <small>Admin Panel</small></h2>
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
            <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
              <div class="profile_img display-flex">
                <div id="crop-avatar">
                  <!-- Current avatar -->
                  {{-- <img class="img-responsive avatar-view" src="{{ asset($teacher->photo) }}" alt="Avatar" title="Change the avatar"> --}}
                  <img src="{{ asset($teacher->photo) }}" alt="" class="img-circle" width="200" height="200" style="border: solid #2ab5fa 1px; padding: 10px; 
                  display: block;
                  margin-left: auto;
                  margin-right: auto;
                  ">
                  
                </div>
              </div>
            <h3 class="text-center">{{$teacher->last_name}}, {{$teacher->first_name}}</h3>

              <ul class="list-unstyled user_data">
                <li class="text-center">
                  <h2>
                    {{ $teacher->position}}
                  </h2>
                </li>
                <li class="text-center">
                  <a href="{{ route('teacher.edit',['admin_id'=>Auth()->user()->id, 'teacher_id'=>$teacher->id])}}" class="btn btn-success">
                      <i class="fa fa-user" aria-hidden="true"></i> Edit Profile</a>
                </li>               
              </ul>

              <br />

              <!-- start skills -->
              
              <!-- end of skills -->

            </div>
            <div class="col-md-9 col-sm-9 col-xs-12">

                
                  <table class="table borderless" style="margin-top:2em" >
                      
                          <h4>{{ $teacher->last_name}}, {{ $teacher->first_name}}</h4>
                        
                      <tr>
                        <td>Date of Birth</td>
                        <td> :</td>
                        <td>{{ $teacher->date_of_birth }}</td>
    
                      </tr>
                      <tr>
                        <td>Gender</td>
                        <td> :</td>
                        <td>{{ $teacher->gender}}</td>
    
                      </tr>
                      <tr>
                        <td>Position</td>
                        <td> :</td>
                        <td>{{ $teacher->position}}</td>
    
                      </tr>
                      <tr>
                        <td>Degree</td>
                        <td> :</td>
                        <td>{{ $teacher->degree}}</td>
    
                      </tr>
    
                      <tr>
                        <td>Homeroom Teacher</td>
                        <td> :</td>
                        <td>
                            @foreach($gradeProfile as $gradeProfiles)
    
                              @if($teacher->grade_profile_id == $gradeProfiles->id)
    
                                {{ $gradeProfiles->name }}
    
                              @endif
    
                            @endforeach 
    
                          </td>
    
                      </tr>
    
                      <tr>
                        <td style="border-bottom: 0 ">Phone</td>
                        <td> :</td>
                        <td>{{ $teacher->phone}}</td>
    
                      </tr>
    
                      <tr>
                        <td >Email</td>
                        <td> :</td>
                        <td>{{ $teacher->email}}</td>
    
                      </tr>
    
                    </table>
                </div>  

              {{-- start tap  --}}
                <div class="col-md-12">
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                          <li role="presentation" class="active">
                            <a href="#tab_content1" role="tab" id="profile-tab2"data-toggle="tab" aria-expanded="false">
                              <b>Absent</b>
                            </a>
                          </li>
                          <li role="presentation" >
                            <a href="#tab_content2" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">
                              <b>Assignment Files</b> 
                            </a>
                          </li>
                          <li role="presentation" class="">
                            <a href="#tab_content3" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">
                              <b>Lesson Plan</b>
                            </a>
                          </li>
                          <li role="presentation" class="">
                            <a href="#tab_content4" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">
                              <b>Grade File</b>
                            </a>
                          </li>                          
                        </ul>

                        <div id="myTabContent" class="tab-content">

                            <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">                           
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addNewAbsent" data-whatever="@mdo"><i class="fa fa-plus-square" aria-hidden="true"></i> Add New Absent</button>
    
                                @include('admin.teacher.add_new_absent_form')
    
            
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
                                    @foreach ($absentTeacher as $absentTeachers)
                                                                       
                                    <tr>
                                      <td>{{ $absentTeachers->id }}</td>
                                      <td>{{ $absentTeachers->absent_type }}</td>
                                      <td>{{ $absentTeachers->reason }}</td>
                                      <td>{{ $absentTeachers->number_day }}</td>
                                      <td>{{ date('d-M-Y', strtotime($absentTeachers->from)) }}</td>
                                      <td>{{ date('d-M-Y', strtotime($absentTeachers->to)) }}</td>
                                      <td class="text-primary">{{ date('d-M-Y', strtotime($absentTeachers->created_at)) }}</td>
                                      
                                      
                                      <td class="pull-right">

                                      <a href="{{ route('absentTeacher.edit', ['id'=>$absentTeachers->id, 'admin_id'=>$admin->id, 'teacher_id'=>$teacher->id]) }}" class="btn btn-info btn-sm">Edit</a>
                                        
                                      

                                      {{-- <button id="edit-absent" 
                                        data-id="{{ $absentTeachers->id }}" 
                                        data-absenttype="{{ $absentTeachers->absent_type}}"
                                        data-numberday="{{$absentTeachers->number_day}}"
                                        data-from="{{$absentTeachers->from}}"
                                        data-to="{{$absentTeachers->to}}"
                                        data-reason="{{ $absentTeachers->reason }}"
                                        
                                        
                                        class="btn btn-info btn-sm" >Edit</button> --}}

                                          <a href="{{ route('absentTeacher.delete', ['absent_id'=>$absentTeachers->id])}}" class="btn btn-danger btn-sm" Onclick="return ConfirmDelete()">Delete</a>
                                                                                
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

                              @include('admin.teacher.modal_edit')

                          <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="assignment-tab" >
        
                            <!-- start recent activity -->
                            <ul class="messages">
                            
                            @foreach ($assignments as $assignment)
                              <li>
                                <img src="{{ asset($teacher->photo) }}" class="avatar"  alt="Avatar">
                                
                                <div class="message_date">
                                    <h3 class="date text-error">{{ date_format($assignment->updated_at, "d") }}</h3>
                                  <p class="month">{{ date_format($assignment->updated_at, "M, Y") }}</p>
                                  </div>
                                <div class="message_wrapper">
                                  <h4 class="heading">{{ $assignment->title }}</h4>
                                  <blockquote class="message">
                                      {{$assignment->description}}
                                  </blockquote>
                                  <br />
                                  <p class="url">
                                    <span class="fs1" aria-hidden="true" data-icon=""></span>
                                    <a href="{{ $assignment->file_name }}" data-original-title="">
                                    <span class="btn btn-success btn-sm"><i class="fa fa-download" aria-hidden="true"></i>
                                       Download</span>  
                                    </a>
                                  </p>
                                </div>
                              </li>
                            @endforeach  
        
                            </ul>
                            <!-- end recent activity -->
        
                          </div>

                          

                          <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                              <ul class="messages">  
                              
                                @foreach ($lesson as $lessons)
                              <li>

                              <img src="{{ asset($teacher->photo) }}" class="avatar"  alt="Avatar">
                                <div class="message_date">
                                  <h3 class="date text-error">{{ date_format($lessons->updated_at, "d") }}</h3>
                                <p class="month">{{ date_format($lessons->updated_at, "M, Y") }}</p>
                                </div>

                              <div class="message_wrapper">
                                
                                  <h4 class="heading">{{$lessons->title}}</h4>
                                  <blockquote class="message">
                                    {!! $lessons->description !!}
                                  </blockquote>
                                  <br />
                                  <p class="url">
                                    <span class="fs1" aria-hidden="true" data-icon=""></span>
                                  <a href="{{ asset('uploads/lesson_plan/'.$lessons->file_name) }}" data-original-title="">
                                        <span class="btn btn-success btn-sm"><i class="fa fa-download" aria-hidden="true"></i>
                                          Download</span> 
                                    </a>
                                  </p>
                                </li>
                                @endforeach
                              </ul>  
                            </div>
                          

                          {{-- Tab file --}}
                          <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">
                            <ul class="messages">  
                            
                              @foreach ($gradefile as $gradefiles)
                            <li>

                            <img src="{{ asset($teacher->photo) }}" class="avatar"  alt="Avatar">
                              <div class="message_date">
                                <h3 class="date text-error">{{ date_format($gradefiles->updated_at, "d") }}</h3>
                              <p class="month">{{ date_format($gradefiles->updated_at, "M, Y") }}</p>
                              </div>

                            <div class="message_wrapper">
                              
                                <h4 class="heading">{{$gradefiles->title}}</h4>
                                <blockquote class="message">
                                  {!! $gradefiles->description !!}
                                </blockquote>
                                <br />
                                <p class="url">
                                  <span class="fs1" aria-hidden="true" data-icon=""></span>
                                  <span>{{$gradefiles->file_name}}</span>
                                <a href="{{ asset('uploads/gradefile/'.$gradefiles->file_name) }}" data-original-title="" target="_blank">
                                
                                      <span class="btn btn-success btn-sm"><i class="fa fa-download" aria-hidden="true"></i>
                                        Download</span> 
                                  </a>
                                </p>
                              </li>
                              @endforeach

                              
                            </ul>  
                              </div>
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
  </div>
</div>
<!-- /page content -->

@elseif(Auth::guard('teacher')->check()) 

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        
  
      </div>
      
      <div class="clearfix"></div>
  
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Teacher Profile <small>Admin Panel</small></h2>
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
              <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                <div class="profile_img display-flex">
                  <div id="crop-avatar">
                    <!-- Current avatar -->
                    
                    <img src="{{ asset($teacher->photo) }}" alt="" class="img-circle" width="200" height="200" style="border: solid #2ab5fa 1px; padding: 10px; 
                    display: block;
                    margin-left: auto;
                    margin-right: auto;
                    ">
                    
                  </div>
                </div>
              <h3 class="text-center">{{$teacher->last_name}}, {{$teacher->first_name}}</h3>
  
                <ul class="list-unstyled user_data">
                  <li class="text-center">
                    <h2>
                      {{ $teacher->position}}
                    </h2>
                  </li>
                  <li class="text-center">
                    {{-- <a href="{{ route('teacher.edit',['admin_id'=>Auth()->user()->id, 'teacher_id'=>$teacher->id])}}" class="btn btn-success">
                        <i class="fa fa-user" aria-hidden="true"></i> Edit Profile</a> --}}
                  </li>               
                </ul>
  
                <br />
  
                <!-- start skills -->
                
                <!-- end of skills -->
  
              </div>
              <div class="col-md-9 col-sm-9 col-xs-12">
  
                  
                    <table class="table borderless" style="margin-top:2em" >
                        
                            <h4>{{ $teacher->last_name}}, {{ $teacher->first_name}}</h4>
                          
                        <tr>
                          <td>Date of Birth</td>
                          <td> :</td>
                          <td>{{ $teacher->date_of_birth }}</td>
      
                        </tr>
                        <tr>
                          <td>Gender</td>
                          <td> :</td>
                          <td>{{ $teacher->gender}}</td>
      
                        </tr>
                        <tr>
                          <td>Position</td>
                          <td> :</td>
                          <td>{{ $teacher->position}}</td>
      
                        </tr>
                        <tr>
                          <td>Degree</td>
                          <td> :</td>
                          <td>{{ $teacher->degree}}</td>
      
                        </tr>
      
                        <tr>
                          <td>Homeroom Teacher</td>
                          <td> :</td>
                          <td>
                              @foreach($gradeProfile as $gradeProfiles)
      
                                @if($teacher->grade_profile_id == $gradeProfiles->id)
      
                                  {{ $gradeProfiles->name }}
      
                                @endif
      
                              @endforeach 
      
                            </td>
      
                        </tr>
      
                        <tr>
                          <td style="border-bottom: 0 ">Phone</td>
                          <td> :</td>
                          <td>{{ $teacher->phone}}</td>
      
                        </tr>
      
                        <tr>
                          <td >Email</td>
                          <td> :</td>
                          <td>{{ $teacher->email}}</td>
      
                        </tr>
      
                      </table>
                  </div>  
  
                
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /page content -->

@endif
  

@endsection