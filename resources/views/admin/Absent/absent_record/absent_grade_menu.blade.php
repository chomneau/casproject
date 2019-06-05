@if(Auth::guard('admin')->check())
<div class="x_content" style="margin-top:15px">
    {{--
    <h2><i class="fa fa-bars"></i> Dropdowns <small>Multiple dropdown designs</small></h2>--}}
    <ul class="nav nav-pills" role="tablist">

        

        <li>
                
                <div class="menu">
                      <button class="dropbutton">K and Pre-K 
                        <i class="fa fa-caret-down"></i>
                      </button>
                      <div class="content-2">
                    
                        <div class="row">
                          <div class="column-2">

                              @if(count($kgrade)) 
                                  @foreach($kgrade->slice(0,3) as $kgrades)
                                  <a href="{{ route('prekSchool.absentRecord', ['grade_id'=>$kgrades->id, 'student_id'=>$students->id]) }}">
                                      {{ $kgrades->name }}
                                  </a>
                              @endforeach 
                              @endif

                          </div>
                          <div class="column-2">
                            
                                  @if(count($kgrade)) 
                                  @foreach($kgrade->slice(3,6) as $kgrades)
                                  <a href="{{ route('prekSchool.absentRecord', ['grade_id'=>$kgrades->id, 'student_id'=>$students->id]) }}">
                                      {{ $kgrades->name }}
                                  </a>
                              @endforeach 
                              @endif
                          </div>

                        </div>
                      </div>
                    </div>

              </li>

              <li>
                
                    <div class="menu">
                            <button class="dropbutton">Primary & Secondary 
                              <i class="fa fa-caret-down"></i>
                            </button>
                            <div class="content">
                          
                              <div class="row">
                                <div class="column">

                                    @if(count($secondaryGrade)) 
                                        @foreach($secondaryGrade->slice(0,5) as $secondaryGrades)
                                            <a href="{{ route('secondarySchool.absentRecord', ['grade_id'=>$secondaryGrades->id, 'student_id'=>$students->id]) }}">
                                                {{ $secondaryGrades->name }}
                                            </a>
                                        @endforeach 
                                    @endif
                                  
                                  
                                  
                                  
                                </div>
                                <div class="column">
                                  
                                    @if(count($secondaryGrade)) 
                                        @foreach($secondaryGrade->slice(5,5) as $secondaryGrades)
                                            <a href="{{ route('secondarySchool.absentRecord', ['grade_id'=>$secondaryGrades->id, 'student_id'=>$students->id]) }}">
                                                {{ $secondaryGrades->name }}
                                            </a>
                                        @endforeach 
                                    @endif
                                </div>
                                <div class="column">
                                  
                                    @if(count($secondaryGrade)) 
                                        @foreach($secondaryGrade->slice(10,5) as $secondaryGrades)
                                            <a href="{{ route('secondarySchool.absentRecord', ['grade_id'=>$secondaryGrades->id, 'student_id'=>$students->id]) }}">
                                                {{ $secondaryGrades->name }}
                                            </a>
                                        @endforeach 
                                    @endif
                                </div>

                                <div class="column">
                                        @if(count($secondaryGrade)) 
                                        @foreach($secondaryGrade->slice(15,6) as $secondaryGrades)
                                            <a href="{{ route('secondarySchool.absentRecord', ['grade_id'=>$secondaryGrades->id, 'student_id'=>$students->id]) }}">
                                                {{ $secondaryGrades->name }}
                                            </a>
                                        @endforeach 
                                    @endif
                                </div>
                              </div>
                            </div>
                          </div> 

                    </li>


                    <li style="padding-top:-5px">
                        <div class="dropdown">
                            <button class="dropbtn">High School <i class="fa fa-caret-down"></i></button>
                            <div class="dropdown-content">
                               @if(count($grade)) 
                                @foreach($grade as $grades)
                                    <a href="{{ route('highSchool.absentRecord', ['grade_id'=>$grades->id,'student_id'=>$students->id]) }}">
                                        {{ $grades->grade_name }}
                                    </a>
                                @endforeach 
                                @endif
                              
                              
                            </div>
                        </div>
                    </li>

                </ul>
</div>

@elseif(Auth::guard('teacher')->check())

<div class="x_content" style="margin-top:15px">
    {{--
    <h2><i class="fa fa-bars"></i> Dropdowns <small>Multiple dropdown designs</small></h2>--}}
    <ul class="nav nav-pills" role="tablist">

        

        <li>
                
                <div class="menu">
                      <button class="dropbutton">K and Pre-K 
                        <i class="fa fa-caret-down"></i>
                      </button>
                      <div class="content-2">
                    
                        <div class="row">
                          <div class="column-2">

                              @if(count($kgrade)) 
                                  @foreach($kgrade->slice(0,3) as $kgrades)
                                  <a href="{{ route('teacher.prekSchool.absentRecord', ['grade_id'=>$kgrades->id, 'student_id'=>$students->id]) }}">
                                      {{ $kgrades->name }}
                                  </a>
                              @endforeach 
                              @endif

                          </div>
                          <div class="column-2">
                            
                                  @if(count($kgrade)) 
                                  @foreach($kgrade->slice(3,6) as $kgrades)
                                  <a href="{{ route('teacher.prekSchool.absentRecord', ['grade_id'=>$kgrades->id, 'student_id'=>$students->id]) }}">
                                      {{ $kgrades->name }}
                                  </a>
                              @endforeach 
                              @endif
                          </div>

                        </div>
                      </div>
                    </div>

              </li>

              <li>
                
                    <div class="menu">
                            <button class="dropbutton">Primary & Secondary 
                              <i class="fa fa-caret-down"></i>
                            </button>
                            <div class="content">
                          
                              <div class="row">
                                <div class="column">

                                    @if(count($secondaryGrade)) 
                                        @foreach($secondaryGrade->slice(0,5) as $secondaryGrades)
                                            <a href="{{ route('teacher.secondarySchool.absentRecord', ['grade_id'=>$secondaryGrades->id, 'student_id'=>$students->id]) }}">
                                                {{ $secondaryGrades->name }}
                                            </a>
                                        @endforeach 
                                    @endif
                                  
                                  
                                  
                                  
                                </div>
                                <div class="column">
                                  
                                    @if(count($secondaryGrade)) 
                                        @foreach($secondaryGrade->slice(5,5) as $secondaryGrades)
                                            <a href="{{ route('teacher.secondarySchool.absentRecord', ['grade_id'=>$secondaryGrades->id, 'student_id'=>$students->id]) }}">
                                                {{ $secondaryGrades->name }}
                                            </a>
                                        @endforeach 
                                    @endif
                                </div>
                                <div class="column">
                                  
                                    @if(count($secondaryGrade)) 
                                        @foreach($secondaryGrade->slice(10,5) as $secondaryGrades)
                                            <a href="{{ route('teacher.secondarySchool.absentRecord', ['grade_id'=>$secondaryGrades->id, 'student_id'=>$students->id]) }}">
                                                {{ $secondaryGrades->name }}
                                            </a>
                                        @endforeach 
                                    @endif
                                </div>

                                <div class="column">
                                        @if(count($secondaryGrade)) 
                                        @foreach($secondaryGrade->slice(15,6) as $secondaryGrades)
                                            <a href="{{ route('teacher.secondarySchool.absentRecord', ['grade_id'=>$secondaryGrades->id, 'student_id'=>$students->id]) }}">
                                                {{ $secondaryGrades->name }}
                                            </a>
                                        @endforeach 
                                    @endif
                                </div>
                              </div>
                            </div>
                          </div> 

                    </li>


                    <li style="padding-top:-5px">
                        <div class="dropdown">
                            <button class="dropbtn">High School <i class="fa fa-caret-down"></i></button>
                            <div class="dropdown-content">
                               @if(count($grade)) 
                                @foreach($grade as $grades)
                                    <a href="{{ route('teacher.highSchool.absentRecord', ['grade_id'=>$grades->id,'student_id'=>$students->id]) }}">
                                        {{ $grades->grade_name }}
                                    </a>
                                @endforeach 
                                @endif
                              
                              
                            </div>
                        </div>
                    </li>

                </ul>
</div>


@endif