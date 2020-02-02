


@if(Auth::guard('admin')->check())

<div class="col-md-12 col-sm-6 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2><i class="fa fa-bars"></i> MIDTERM <small>SCORE</small></h2>
      
      <div class="clearfix"></div>
    </div>
    <div class="x_content">

      <div class="col-xs-3">
        <!-- required for floating -->
        <!-- Nav tabs -->
        <ul class="nav nav-tabs tabs-left font-weight-bold">
          
          <li style="font-weight:bold">
            <a href="#tab1" data-toggle="tab">Grade Pre-K</a>
          </li>
          <li style="font-weight:bold">
            <a href="#tab2" data-toggle="tab">Grade K</a>
          </li>
          <li style="font-weight:bold">
            <a href="#tab3" data-toggle="tab">Grade 1-8</a>
          </li>
          <li style="font-weight:bold">
            <a href="#tab4" data-toggle="tab">Grade 9-12</a>
          </li>
        </ul>
      </div>

      <div class="col-xs-9">
        <!-- Tab panes -->
        <div class="tab-content">
          {{-- tab1 --}}
          <div class="tab-pane" id="tab1">
            <div class="col-md-12 col-sm-6 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Pre-K</h2>
                  <div class="clearfix"></div>
                </div>
                  
                  <form action="{{ route('midterm.prek.printview', ['student_id'=>$students->id]) }}">
                      <div class="x_content">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="tab-pane active" id="home">                              
                                          @if(count($kgrade))
                                              @foreach($kgrade->slice(3, 3) as $kgrades)
                                                  
                                                  <div class="checkbox">
                                                      <label>
                                                        <input type="radio" name="kgrade[]" class="flat" 
                                                        value="{{ $kgrades->id }}"> {{ $kgrades->name }}
                                                      </label>
                                                  </div>

                                              @endforeach                                              
                                          @endif
                                    </div>
                                </div>                              
                            </div>

                            {{-- day present --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h4>Please select Day present</h4>
                                    <div class="tab-pane active" id="home">              <select name="daypresent" id="" class="form-control">
                                        @foreach ($daypresent as $daypresents)
                                          <option value="{{$daypresents->id}}">
                                            {{$daypresents->quarter_name}} - 
                                            {{ $daypresents->quarter_day_present }}
                                          </option>
                                        @endforeach
                                              
                                        </select>
                                    </div>
                                </div>                              
                            </div>

                            <div class="col-md-4" style="margin-top: 20px">
                                <div class="pull-right">  
                                    <input type="submit" value="print view"  class="btn btn-success btn-sm">

                                </div>
                            </div>
                          </div> {{-- end row --}}
                            
                      </div>{{--end of x_content--}}
                  </form>    
                </div>    
              </div>
          </div>
          {{-- end of tab1 --}}

          {{-- tab2 --}}
          <div class="tab-pane" id="tab2">
            
            <div class="col-md-12 col-sm-6 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Grade-K</h2>
                  <div class="clearfix"></div>
                </div>
                  <form action="{{ route('midterm.gradeK.printview', ['student_id'=>$students->id]) }}">
                          <div class="x_content">
                              <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="tab-pane active" id="home">                              
                                              @if(count($kgrade))
                                                  @foreach($kgrade->slice(0,3) as $kgrades)
                                                      
                                                      <div class="checkbox">
                                                          <label>
                                                            <input type="radio" name="kgrade[]" class="flat" 
                                                            value="{{ $kgrades->id }}"> {{ $kgrades->name }}
                                                          </label>
                                                      </div>

                                                  @endforeach
                                                  
                                              @endif

                                            </div>
                                        </div> 
                                    </div>

                                    {{-- day present --}}
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h4>Please select Day present</h4>
                                            <div class="tab-pane active" id="home">              <select name="daypresent" id="" class="form-control">
                                                @foreach ($daypresent as $daypresents)
                                                <option value="{{$daypresents->id}}">
                                                    {{$daypresents->quarter_name}} - 
                                                    {{ $daypresents->quarter_day_present }}
                                                </option>
                                                @endforeach
                                                    
                                                </select>
                                            </div>
                                        </div>                              
                                    </div>
                                    <div class="col-md-4" style="margin-top: 20px">
                                        <div class="pull-right">
                                            <input type="submit" value="print view" class="btn btn-success btn-sm">
                                        </div>
                                    </div>
                              </div>
                          </div>
                      </form>  

              </div>
            </div>            
          </div>
          {{-- end tab2 --}}


          {{-- tab3 --}}
          <div class="tab-pane" id="tab3">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Primary and Secondary</h2>
                  <div class="clearfix"></div>
                </div>
                  <form action="{{ route('midterm.secondaryschool.printview', ['student_id'=>$students->id]) }}">
          
                      <div class="tab-content">
          
                          <div class="row">
                              <div class="col-md-6">
                                  
                                <div class="tab-pane active" id="home">
            
                                    @if(count($secondaryGrade))
                                        @foreach($secondaryGrade as $secondaryGrades)
            
                                            
                                            <div class="checkbox">
                                                <label>
                                                    <input type="radio" name="secondaryGrade[]" class="flat" 
                                                    value="{{$secondaryGrades->id}}"> {{$secondaryGrades->name}}
            
                                                </label>
                                            </div>
                                                    
                                        @endforeach
                                        
                                    @endif
            
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12 col-sm-6">
                                        <div class="form-group">
                                            <h4>Please select Day present</h4>
                                            <div class="tab-pane active" id="home">              <select name="daypresent" id="" class="form-control">
                                                @foreach ($daypresent as $daypresents)
                                                <option value="{{$daypresents->id}}">
                                                    {{$daypresents->quarter_name}} - 
                                                    {{ $daypresents->quarter_day_present }}
                                                </option>
                                                @endforeach
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12" style="margin-top: 10px">
                                        <div >
                                            <input type="submit" value="print view" class="btn btn-success">
                                        </div>
                                    </div> 
                                </div>
                                
                                

                            </div>

          
                            
                          </div>
                      </div>
                   <!-- end form -->
                  </form>
          
              </div>
            </div>
          </div>

          {{-- end tab3 --}}

          {{-- tab4 --}}
          <div class="tab-pane" id="tab4">
            <div class="col-md-12 col-sm-6 col-xs-12">
              <div class="x_panel">
                    <div class="x_title">
                      <h2>High School</h2>
                      <div class="clearfix"></div>
                    </div>
                           
              
                  <form action="{{ route('midterm.yearlyReport.highSchool', ['student_id'=>$students->id]) }}" method="get">
              
                      {{csrf_field()}}
                      <div class="tab-content">
              
                          <div class="row">
                                <div class="col-md-6">
                                    
                                    <div class="tab-pane active" id="home">
                
                                        @if(count($grade))
                                            @foreach($grade as $grades)
                
                                                
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="radio" name="grade[]" class="flat" value="{{$grades->id}}"> 
                
                                                        {{ $grades->grade_name }}
                
                                                    </label>
                                                </div>
                                                
                
                                            @endforeach
                                            
                                        @endif
                
                                    </div>
                
                                </div>
                                <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-6">
                                                <div class="form-group">
                                                    <h4>Please select Day present</h4>
                                                    <div class="tab-pane active" id="home">              <select name="daypresent" id="" class="form-control">
                                                        @foreach ($daypresent as $daypresents)
                                                        <option value="{{$daypresents->id}}">
                                                            {{$daypresents->quarter_name}} - 
                                                            {{ $daypresents->quarter_day_present }}
                                                        </option>
                                                        @endforeach
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12" style="margin-top: 10px">
                                                <div >
                                                    <input type="submit" value="print view" class="btn btn-success">
                                                </div>
                                            </div> 
                                        </div>
                                        
                                        
        
                                    </div>
                              
                          </div>
                          
              
                          
              
                      </div> 
                      
                  </from>
              
                  </div>
              </div>
              </div>
              </div>
          </div>

          {{-- end tap4 --}}
        </div>
      </div>

      <div class="clearfix"></div>

    </div>
  </div>
</div>

@elseif(Auth::guard('teacher')->check())

<div class="col-md-12 col-sm-6 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2><i class="fa fa-bars"></i> MIDTERM <small>SCORE</small></h2>
            
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
      
            <div class="col-xs-3">
              <!-- required for floating -->
              <!-- Nav tabs -->
              <ul class="nav nav-tabs tabs-left font-weight-bold">
                
                <li style="font-weight:bold">
                  <a href="#tab1" data-toggle="tab">Grade Pre-K</a>
                </li>
                <li style="font-weight:bold">
                  <a href="#tab2" data-toggle="tab">Grade K</a>
                </li>
                <li style="font-weight:bold">
                  <a href="#tab3" data-toggle="tab">Grade 1-8</a>
                </li>
                <li style="font-weight:bold">
                  <a href="#tab4" data-toggle="tab">Grade 9-12</a>
                </li>
              </ul>
            </div>
      
            <div class="col-xs-9">
              <!-- Tab panes -->
              <div class="tab-content">
                {{-- tab1 --}}
                <div class="tab-pane" id="tab1">
                  <div class="col-md-12 col-sm-6 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Pre-K</h2>
                        <div class="clearfix"></div>
                      </div>
                        
                        <form action="{{ route('teacher.midterm.prek.printview', ['student_id'=>$students->id]) }}">
                            <div class="x_content">
                              <div class="row">
                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <div class="tab-pane active" id="home">                              
                                                @if(count($kgrade))
                                                    @foreach($kgrade->slice(3, 3) as $kgrades)
                                                        
                                                        <div class="checkbox">
                                                            <label>
                                                              <input type="radio" name="kgrade[]" class="flat" 
                                                              value="{{ $kgrades->id }}"> {{ $kgrades->name }}
                                                            </label>
                                                        </div>
      
                                                    @endforeach                                              
                                                @endif
                                          </div>
                                      </div>                              
                                  </div>
      
                                  {{-- day present --}}
                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <h4>Please select Day present</h4>
                                          <div class="tab-pane active" id="home">              <select name="daypresent" id="" class="form-control">
                                              @foreach ($daypresent as $daypresents)
                                                <option value="{{$daypresents->id}}">
                                                  {{$daypresents->quarter_name}} - 
                                                  {{ $daypresents->quarter_day_present }}
                                                </option>
                                              @endforeach
                                                    
                                              </select>
                                          </div>
                                      </div>                              
                                  </div>
      
                                  <div class="col-md-4" style="margin-top: 20px">
                                      <div class="pull-right">  
                                          <input type="submit" value="print view"  class="btn btn-success btn-sm">
      
                                      </div>
                                  </div>
                                </div> {{-- end row --}}
                                  
                            </div>{{--end of x_content--}}
                        </form>    
                      </div>    
                    </div>
                </div>
                {{-- end of tab1 --}}
      
                {{-- tab2 --}}
                <div class="tab-pane" id="tab2">
                  
                  <div class="col-md-12 col-sm-6 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Grade-K</h2>
                        <div class="clearfix"></div>
                      </div>
                        <form action="{{ route('teacher.midterm.gradeK.printview', ['student_id'=>$students->id]) }}">
                                <div class="x_content">
                                    <div class="row">
                                          <div class="col-md-4">
                                              <div class="form-group">
                                                  <div class="tab-pane active" id="home">                              
                                                    @if(count($kgrade))
                                                        @foreach($kgrade->slice(0,3) as $kgrades)
                                                            
                                                            <div class="checkbox">
                                                                <label>
                                                                  <input type="radio" name="kgrade[]" class="flat" 
                                                                  value="{{ $kgrades->id }}"> {{ $kgrades->name }}
                                                                </label>
                                                            </div>
      
                                                        @endforeach
                                                        
                                                    @endif
      
                                                  </div>
                                              </div> 
                                          </div>
      
                                          {{-- day present --}}
                                          <div class="col-md-4">
                                              <div class="form-group">
                                                  <h4>Please select Day present</h4>
                                                  <div class="tab-pane active" id="home">              <select name="daypresent" id="" class="form-control">
                                                      @foreach ($daypresent as $daypresents)
                                                      <option value="{{$daypresents->id}}">
                                                          {{$daypresents->quarter_name}} - 
                                                          {{ $daypresents->quarter_day_present }}
                                                      </option>
                                                      @endforeach
                                                          
                                                      </select>
                                                  </div>
                                              </div>                              
                                          </div>
                                          <div class="col-md-4" style="margin-top: 20px">
                                              <div class="pull-right">
                                                  <input type="submit" value="print view" class="btn btn-success btn-sm">
                                              </div>
                                          </div>
                                    </div>
                                </div>
                            </form>  
      
                    </div>
                  </div>            
                </div>
                {{-- end tab2 --}}
      
      
                {{-- tab3 --}}
                <div class="tab-pane" id="tab3">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Primary and Secondary</h2>
                        <div class="clearfix"></div>
                      </div>
                        <form action="{{ route('teacher.midterm.secondaryschool.printview', ['student_id'=>$students->id]) }}">
                
                            <div class="tab-content">
                
                                <div class="row">
                                    <div class="col-md-6">
                                        
                                      <div class="tab-pane active" id="home">
                  
                                          @if(count($secondaryGrade))
                                              @foreach($secondaryGrade as $secondaryGrades)
                  
                                                  
                                                  <div class="checkbox">
                                                      <label>
                                                          <input type="radio" name="secondaryGrade[]" class="flat" 
                                                          value="{{$secondaryGrades->id}}"> {{$secondaryGrades->name}}
                  
                                                      </label>
                                                  </div>
                                                          
                                              @endforeach
                                              
                                          @endif
                  
                                      </div>
      
                                  </div>
                                  <div class="col-md-6">
                                      <div class="row">
                                          <div class="col-md-12 col-sm-6">
                                              <div class="form-group">
                                                  <h4>Please select Day present</h4>
                                                  <div class="tab-pane active" id="home">              <select name="daypresent" id="" class="form-control">
                                                      @foreach ($daypresent as $daypresents)
                                                      <option value="{{$daypresents->id}}">
                                                          {{$daypresents->quarter_name}} - 
                                                          {{ $daypresents->quarter_day_present }}
                                                      </option>
                                                      @endforeach
                                                          
                                                      </select>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="col-md-12" style="margin-top: 10px">
                                              <div >
                                                  <input type="submit" value="print view" class="btn btn-success">
                                              </div>
                                          </div> 
                                      </div>
                                      
                                      
      
                                  </div>
      
                
                                  
                                </div>
                            </div>
                         <!-- end form -->
                        </form>
                
                    </div>
                  </div>
                </div>
      
                {{-- end tab3 --}}
      
                {{-- tab4 --}}
                <div class="tab-pane" id="tab4">
                  <div class="col-md-12 col-sm-6 col-xs-12">
                    <div class="x_panel">
                          <div class="x_title">
                            <h2>High School</h2>
                            <div class="clearfix"></div>
                          </div>
                                 
                    
                        <form action="{{ route('teacher.midterm.yearlyReport.highSchool', ['student_id'=>$students->id]) }}" method="get">
                    
                            {{csrf_field()}}
                            <div class="tab-content">
                    
                                <div class="row">
                                      <div class="col-md-6">
                                          
                                          <div class="tab-pane active" id="home">
                      
                                              @if(count($grade))
                                                  @foreach($grade as $grades)
                      
                                                      
                                                      <div class="checkbox">
                                                          <label>
                                                              <input type="radio" name="grade[]" class="flat" value="{{$grades->id}}"> 
                      
                                                              {{ $grades->grade_name }}
                      
                                                          </label>
                                                      </div>
                                                      
                      
                                                  @endforeach
                                                  
                                              @endif
                      
                                          </div>
                      
                                      </div>
                                      <div class="col-md-6">
                                              <div class="row">
                                                  <div class="col-md-12 col-sm-6">
                                                      <div class="form-group">
                                                          <h4>Please select Day present</h4>
                                                          <div class="tab-pane active" id="home">              <select name="daypresent" id="" class="form-control">
                                                              @foreach ($daypresent as $daypresents)
                                                              <option value="{{$daypresents->id}}">
                                                                  {{$daypresents->quarter_name}} - 
                                                                  {{ $daypresents->quarter_day_present }}
                                                              </option>
                                                              @endforeach
                                                                  
                                                              </select>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <div class="col-md-12" style="margin-top: 10px">
                                                      <div >
                                                          <input type="submit" value="print view" class="btn btn-success">
                                                      </div>
                                                  </div> 
                                              </div>
                                              
                                              
              
                                          </div>
                                    
                                </div>
                                
                    
                                
                    
                            </div> 
                            
                        </from>
                    
                        </div>
                    </div>
                    </div>
                    </div>
                </div>
      
                {{-- end tap4 --}}
              </div>
            </div>
      
            <div class="clearfix"></div>
      
          </div>
        </div>
      </div>


@endif

{{-- ****************** --}}

        
