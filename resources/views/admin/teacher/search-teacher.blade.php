@extends('admin.admin-layout.main')

@section('content')

 @if(Auth::guard('admin')->check())

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>ALL TEACHERS <small></small></h3>
                </div>

                <div class="title_right">
                    <div class="col-md-8 col-sm-8 col-xs-12 form-group pull-right top_search">
                        <form action="{{ route('teacher.search')  }}" method='get'>
                            {{csrf_field()}}
                            <div class="input-group">
                                <input type="text" class="form-control" name="query" placeholder="Enter first name,last name, Phone, or email to seach" required >
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit">Search</button>
                                </span>                       
                            </div>
                        </form>

                    </div>
                </div>

            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="x_title">
                            
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



                            <!-- start project list -->
                            <table class="table table-striped projects">
                                <thead>
                                <tr>
                                    <th style="width: 1%">#</th>
                                    <th style="width: 20%">Teacher Name</th>
                                    <th>Gender</th>
                                    
                                    <th style="width: 15%">Homeroom Teacher</th>
                                    <th>Position</th>
                                    <th>Phone</th>
                                    
                                    
                                    <th style="width: 20%">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($teacher))
                                    @foreach($teacher as $teachers)
                                        <tr>
                                           
                                            <td>
                                              <img src="{{ asset($teachers->photo) }}" class="avatar"  alt="Avatar">
                                            </td>
                                            
                                            <td>
                                                <a> {{ $teachers->last_name }}, {{ $teachers->first_name }}</a>
                                                <br />
                                                <small>Created {{ $teachers->created_at->diffForHumans() }}</small>
                                            </td>

                                          <td>{{ $teachers->gender }}</td>
                                            
                                            <td>
                                                {{ $teachers->GradeProfile->name }}
                                            </td>
                                            <td>
                                                {{ $teachers->position }}
                                            </td>
                                            <td>
                                                {{ $teachers->phone }}
                                            </td>
                                            
                                            
                                            <td>
                                                 
                                                <a href="{{ route('admin.teacher.profile',['admin_id'=>Auth()->user()->id, 'teacher_id'=>$teachers->id])}}" class="btn btn-primary btn-sm"><i class="fa fa-folder"></i> View profile </a>
                                                                                       
                                                
                                                {{-- <a href="{{ route('admin.staff.delete', ['id'=>$teachers->id]) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a> --}}

                                                
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif

                                </tbody>
                            </table>
                            <!-- end project list -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->




    {{-- teacher side --}}

  @elseif(Auth::guard('teacher')->check()) 
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>ALL TEACHERS <small></small></h3>
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="x_title">
                          
                          
                            <h2 >
                                <span class="text-primary" style="margin-right:20px">TOTAL TEACHERS : 
                                  <b style="color:cadetblue"> {{ $teacherCount }} </b>
                                </span>
                                <span style="margin-right:20px">MALE : 
                                  <b style="color:cadetblue"> {{$teacherCountMale }} </b>
                                </span>
                                <span>FEMALE : 
                                  <b style="color:cadetblue"> {{$teacherCountFemale }}</b>
                                </span>
                              
                              </h2>
                          {{-- </div> --}}
                        
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



                            <!-- start project list -->
                            <table class="table table-striped projects">
                                <thead>
                                <tr>
                                    <th style="width: 1%">#</th>
                                    <th style="width: 20%">Teacher Name</th>
                                    <th style="width: 10%">Gender</th>
                                    
                                    <th style="width: 15%">Homeroom Teacher</th>
                                    <th>Position</th>
                                    <th>Phone</th>
                                    
                                    
                                    <th style="width: 20%">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($teacherAll))
                                    @foreach($teacherAll as $teachers)
                                        <tr>
                                            <?php $no = 1 ?>
                                            
                                            <td><img src="{{ asset($teachers->photo) }}" class="avatar"  alt="Avatar"></td>
                                            <td>
                                                <a> {{ $teachers->last_name }}, {{ $teachers->first_name }}</a>
                                                <br />
                                                <small>Created {{ $teachers->created_at->diffForHumans() }}</small>
                                            </td>
                                            <td>
                                                {{ $teachers->gender }}
                                            </td>
                                            
                                            <td>
                                                {{ $teachers->GradeProfile->name }}
                                            </td>
                                            <td>
                                                {{ $teachers->position }}
                                            </td>
                                            <td>
                                                {{ $teachers->phone }}
                                            </td>
                                            
                                            
                                            <td>
                                                 
                                                <a href="{{ route('teacher.detail',[ 'teacher_id'=>$teachers->id])}}" class="btn btn-primary btn-sm"><i class="fa fa-folder"></i> View profile </a>
                                                
                                                
                                                
                                                
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif

                                </tbody>
                            </table>
                            <!-- end project list -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  


@endif


@endsection