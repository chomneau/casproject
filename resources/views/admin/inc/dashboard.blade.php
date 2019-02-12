
@if(Auth::guard('admin')->check())
<!-- page content -->
<div class="right_col" role="main">
    <!-- top tiles -->
    <div class="row tile_count">
        
        

        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> Total Students</span>
            <div class="count">{{ $countAllStudent }}</div>
            
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-clock-o"></i> Total Male Students </span>
            <div class="count">{{ $countMaleStudent }}</div>
            
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> Total Female Students</span>
            <div class="count green">{{ $countFemaleStudent }}</div>
            
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> Total Staff</span>
            <div class="count">{{ $totalTeacher+$allStaff }}</div>
          
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> Male Staff</span>
            <div class="count">{{ $countMaleTeacher + $countMaleStaff }}</div>
            
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> Female Staff</span>
            <div class="count">{{ $countFemaleTeacher+$countFemaleStaff }}</div>
            
        </div>
        
        
        

        
    </div>

    <div class="clearfix"></div>


    <!-- /top tiles -->



    <!-- /top tiles -->

        <div class="row top_tiles">

            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon" style="margin-right:10px "><i class="green fa fa-group"></i></div>
                  <div class="count">
                    {{ $countAllStudent-$countQuitStudent-$countGraduationStudent }}
                  </div>
                  
                  <div class="row">
                      <div class="col-md-6">
                        <h4 class="blue text-center" style="padding-left: 10px">
                          <i class="blue fa fa-male"></i>
                          M : {{ $countMaleStudent-$countGraduation_male-$countQuit_male }}
                        </h4>
                      </div>
                      <div class="col-md-6">
                        <h4 class="green" style="padding-left: 10px">
                          <i class="green fa fa-female"></i>
                          F : {{ $countFemaleStudent-$countGraduation_female-$countQuit_female}}
                        </h4>
                      </div>
                  </div>
                      
                      
                          
                     
                  <h4 class="green" style="padding-left: 10px">Total Present Students</h4>
                  <p>Students who currently studying in CAS</p>
                </div>
            </div>
              
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="green fa fa-sort-amount-desc"></i></div>
                  <div class="count green">{{ $countNewStudent }}</div>

                    <div class="row">
                      <div class="col-md-6">
                        <h4 class="blue text-center" style="padding-left: 10px">
                          <i class="blue fa fa-male"></i>
                          M : {{ $countNewStudent_male }}
                        </h4>
                      </div>
                      <div class="col-md-6">
                        <h4 class="green" style="padding-left: 10px">
                          <i class="green fa fa-female"></i>
                          F : {{$countNewStudent_female}}
                        </h4>
                      </div>
                    </div>

                  <h4 class="green" style="padding-left: 10px">Total New Students</h4>
                  <p>New register students</p>
                </div>
            </div>

            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon" style="margin-right:10px "><i class="blue fa fa-graduation-cap"></i></div>
                  <div class="count blue">{{ $countGraduationStudent }}</div>

                    
                    <div class="row">
                      <div class="col-md-6">
                        <h4 class="blue text-center" style="padding-left: 10px">
                          <i class="blue fa fa-male"></i>
                          M : {{ $countGraduation_male }}
                        </h4>
                      </div>
                      <div class="col-md-6">
                        <h4 class="green" style="padding-left: 10px">
                          <i class="green fa fa-female"></i>
                          F : {{$countGraduation_female}}
                        </h4>
                      </div>
                    </div>




                  <h4 class="green" style="padding-left: 10px">Total Graduation Students</h4>
                  <p>Students graduated from CAS</p>
                </div>
            </div>



            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon" style="margin-right:10px "><i class="red fa fa-sort-amount-asc"></i></div>
                  <div class="count red">{{ $countQuitStudent }}</div>
                  <div class="row">
                      <div class="col-md-6">
                        <h4 class="blue text-center" style="padding-left: 10px">
                          <i class="blue fa fa-male"></i>
                          M : {{ $countQuit_male }}
                        </h4>
                      </div>
                      <div class="col-md-6">
                        <h4 class="green" style="padding-left: 10px">
                          <i class="green fa fa-female"></i>
                          F : {{$countQuit_female}}
                        </h4>
                      </div>
                  </div>
                  <h4 class="green" style="padding-left: 10px">Total Quit Students</h4>
                  <p>Students terminated from CAS</p>
                </div>
            </div>
              
        </div>

    

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="dashboard_graph">

                <div class="row x_title">
                    <div class="col-md-6">
                        <h3>Student report by year <small>Query by year</small></h3>
                    </div>
                    <div class="col-md-6">
                        <form action="{{ route('student.reportByYear')}}" method="GET">
                            
                            {{csrf_field()}}
                        
                        <div class="row">
                            <div class="col-sm-4"> 
                                <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                    <label class="control-label" for="datepicker-start">Start Date</label>
                                    <input type="date" class="form-control" name="start_date">
                                </div>
                            </div>
                            <div class="col-sm-4"> 
                                <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                    <label class="control-label" for="datepicker-end">End Date</label>
                                    <input type="date" class="form-control" name="end_date">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group" style="margin-top: 1.9em">
                                    
                                   <button class="btn btn-primary" type="submit"> 
                                    Submit 
                                   </button> 
                                </div>
                            </div>

                        </form>    


                        </div>
                    </div>

                </div>

                <div class="clearfix"></div>
            </div>
        </div>

    </div>




    <br />

    <div class="row">


        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="x_panel ">
                <div class="x_title">
                    <h2>Total Students by year</h2>
                    
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table class="" style="width:100%">
                        
                        <tr>
                            <td>
                                <i style="font-size: 5em" class="green fa fa-group"></i>
                            </td>
                            <td>
                                <table class="tile_info">
                                    <tr>
                                        <td>
                                            <p><i class="fa fa-square blue"></i>All Students </p>
                                        </td>
                                        <td>30%</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p><i class="fa fa-square green"></i>Male Students </p>
                                        </td>
                                        <td>10%</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p><i class="fa fa-square purple"></i>Female Students </p>
                                        </td>
                                        <td>20%</td>
                                    </tr>
                                    
                                </table>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="x_panel ">
                <div class="x_title">
                    <h2>Graduated Students</h2>
                    
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table class="" style="width:100%">
                        
                        <tr>
                            <td>
                                <i style="font-size: 5em" class="green fa fa-group"></i>
                            </td>
                            <td>
                                <table class="tile_info">
                                    <tr>
                                        <td>
                                            <p><i class="fa fa-square blue"></i>All Students </p>
                                        </td>
                                        <td>30%</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p><i class="fa fa-square green"></i>Male Students </p>
                                        </td>
                                        <td>10%</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p><i class="fa fa-square purple"></i>Female Students </p>
                                        </td>
                                        <td>20%</td>
                                    </tr>
                                    
                                </table>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>


        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="x_panel ">
                <div class="x_title">
                    <h2>Quit Students</h2>
                    
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table class="" style="width:100%">
                        
                        <tr>
                            <td>
                                <i style="font-size: 5em" class="green fa fa-group"></i>
                            </td>
                            <td>
                                <table class="tile_info">
                                    <tr>
                                        <td>
                                            <p><i class="fa fa-square blue"></i>All Students </p>
                                        </td>
                                        <td>30%</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p><i class="fa fa-square green"></i>Male Students </p>
                                        </td>
                                        <td>10%</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p><i class="fa fa-square purple"></i>Female Students </p>
                                        </td>
                                        <td>20%</td>
                                    </tr>
                                    
                                </table>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

    </div>


    
</div>

<!-- /page content -->

@elseif(Auth::guard('teacher')->check())

<!-- page content -->
<div class="right_col" role="main">
    <!-- top tiles -->
    <div class="row tile_count">
        
        

        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> Total Students</span>
            <div class="count">{{ $countAllStudent }}</div>
            
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-clock-o"></i> Total Male Students </span>
            <div class="count">{{ $countMaleStudent }}</div>
            
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> Total Female Students</span>
            <div class="count green">{{ $countFemaleStudent }}</div>
            
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> Total Staff</span>
            <div class="count">{{ $totalTeacher+$allStaff }}</div>
          
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> Male Staff</span>
            <div class="count">{{ $countMaleTeacher + $countMaleStaff }}</div>
            
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> Female Staff</span>
            <div class="count">{{ $countFemaleTeacher+$countFemaleStaff }}</div>
            
        </div>
        
        
        

        
    </div>

    <div class="clearfix"></div>


    <!-- /top tiles -->



    <!-- /top tiles -->

        <div class="row top_tiles">

            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon" style="margin-right:10px "><i class="green fa fa-group"></i></div>
                  <div class="count">
                    {{ $countAllStudent-$countQuitStudent-$countGraduationStudent }}
                  </div>
                  
                  <div class="row">
                      <div class="col-md-6">
                        <h4 class="blue text-center" style="padding-left: 10px">
                          <i class="blue fa fa-male"></i>
                          M : {{ $countMaleStudent-$countGraduation_male-$countQuit_male }}
                        </h4>
                      </div>
                      <div class="col-md-6">
                        <h4 class="green" style="padding-left: 10px">
                          <i class="green fa fa-female"></i>
                          F : {{ $countFemaleStudent-$countGraduation_female-$countQuit_female}}
                        </h4>
                      </div>
                  </div>
                      
                      
                          
                     
                  <h4 class="green" style="padding-left: 10px">Total Present Students</h4>
                  <p>Students who currently studying in CAS</p>
                </div>
            </div>
              
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="green fa fa-sort-amount-desc"></i></div>
                  <div class="count green">{{ $countNewStudent }}</div>

                    <div class="row">
                      <div class="col-md-6">
                        <h4 class="blue text-center" style="padding-left: 10px">
                          <i class="blue fa fa-male"></i>
                          M : {{ $countNewStudent_male }}
                        </h4>
                      </div>
                      <div class="col-md-6">
                        <h4 class="green" style="padding-left: 10px">
                          <i class="green fa fa-female"></i>
                          F : {{$countNewStudent_female}}
                        </h4>
                      </div>
                    </div>

                  <h4 class="green" style="padding-left: 10px">Total New Students</h4>
                  <p>New register students</p>
                </div>
            </div>

            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon" style="margin-right:10px "><i class="blue fa fa-graduation-cap"></i></div>
                  <div class="count blue">{{ $countGraduationStudent }}</div>

                    
                    <table class="tile_info table-sm" style="margin-left: 1em" >
                        
                        <tr>
                            <td width="50%">
                                <p>
                                    <i class="fa fa-square green"></i>
                                    <span style="font-weight: bold">
                                        Male : {{ $countGraduation_male }} 
                                    </span> 
                                </p>
                            </td>
                            
                        </tr>
                        <tr>
                            <td >
                                <p>
                                    <i class="fa fa-square purple"></i>
                                    <span style="font-weight: bold">
                                        Female : {{ $countGraduation_male }}
                                    </span>
                                </p>
                           </td>
                            
                        </tr>
                                    
                    </table>




                  <h4 class="green" style="padding-left: 10px">Total Graduation Students</h4>
                  <p>Students graduated from CAS</p>
                </div>
            </div>



            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon" style="margin-right:10px "><i class="red fa fa-sort-amount-asc"></i></div>
                  <div class="count red">{{ $countQuitStudent }}</div>
                  <div class="row">
                      <div class="col-md-6">
                        <h4 class="blue text-center" style="padding-left: 10px">
                          <i class="blue fa fa-male"></i>
                          M : {{ $countQuit_male }}
                        </h4>
                      </div>
                      <div class="col-md-6">
                        <h4 class="green" style="padding-left: 10px">
                          <i class="green fa fa-female"></i>
                          F : {{$countQuit_female}}
                        </h4>
                      </div>
                  </div>
                  <h4 class="green" style="padding-left: 10px">Total Quit Students</h4>
                  <p>Students terminated from CAS</p>
                </div>
            </div>
              
        </div>

    




    
</div>

@endif






