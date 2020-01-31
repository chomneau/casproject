@if(Auth::guard('admin')->check())
<div class="x_content">
   
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
                                    <a href="{{ route('prekschool.score', ['grade_id'=>$kgrades->id, 'student_id'=>$students->id]) }}">
                                        {{ $kgrades->name }}
                                    </a>
                                @endforeach 
                                @endif

                            </div>
                            <div class="column-2">
                              
                                    @if(count($kgrade)) 
                                    @foreach($kgrade->slice(3,6) as $kgrades)
                                    <a href="{{ route('prekschool.score', ['grade_id'=>$kgrades->id, 'student_id'=>$students->id]) }}">
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
                                            <a href="{{ route('score.secondary', ['grade_id'=>$secondaryGrades->id, 'student_id'=>$students->id]) }}">
                                                {{ $secondaryGrades->name }}
                                            </a>
                                        @endforeach 
                                    @endif
                                  
                                  
                                  
                                  
                                </div>
                                <div class="column">
                                  
                                    @if(count($secondaryGrade)) 
                                        @foreach($secondaryGrade->slice(5,5) as $secondaryGrades)
                                            <a href="{{ route('score.secondary', ['grade_id'=>$secondaryGrades->id, 'student_id'=>$students->id]) }}">
                                                {{ $secondaryGrades->name }}
                                            </a>
                                        @endforeach 
                                    @endif
                                </div>
                                <div class="column">
                                  
                                    @if(count($secondaryGrade)) 
                                        @foreach($secondaryGrade->slice(10,5) as $secondaryGrades)
                                            <a href="{{ route('score.secondary', ['grade_id'=>$secondaryGrades->id, 'student_id'=>$students->id]) }}">
                                                {{ $secondaryGrades->name }}
                                            </a>
                                        @endforeach 
                                    @endif
                                </div>

                                <div class="column">
                                        @if(count($secondaryGrade)) 
                                        @foreach($secondaryGrade->slice(15,6) as $secondaryGrades)
                                            <a href="{{ route('score.secondary', ['grade_id'=>$secondaryGrades->id, 'student_id'=>$students->id]) }}">
                                                {{ $secondaryGrades->name }}
                                            </a>
                                        @endforeach 
                                    @endif
                                </div>
                              </div>
                            </div>
                          </div> 

                    </li>

            <li>
                <div class="dropdown">
                    <button class="dropbtn">High School <i class="fa fa-caret-down"></i></button>
                    <div class="dropdown-content">
                       @if(count($grade)) 
                        @foreach($grade as $grades)
                            <a href="{{ route('score.view',['grade_id'=>$grades->id,'student_id'=>$students->id]) }}">
                                {{ $grades->grade_name }}
                            </a>
                        @endforeach 
                        @endif
                      
                      
                    </div>
                  </div>
            </li>

            





        <a href="{{ route('transcript',['student_id'=>$students->id]) }}" class="btn btn-primary pull-right">
            Print Transcript
            <i class="fas fa-print"></i>
        </a>


        <a href="{{ route('select.option',['student_id'=>$students->id]) }}" class="btn btn-success pull-right">
            Print Yearly Report
            <i class="fas fa-print"></i>
        </a>

        <a href="{{ route('midterm.option',['student_id'=>$students->id]) }}" class="btn btn-info pull-right">
            Mid-term
            <i class="fas fa-print"></i>
        </a>

    </ul>
</div>



@elseif(Auth::guard('teacher')->check())



<div class="x_content">
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
                                  <a href="{{ route('teacher.prekschool.score', 
                                  [
                                  'teacher_id'=>auth()->user()->id,
                                  'grade_id'=>$kgrades->id, 
                                  'student_id'=>$students->id
                                  ]) 
                              }}">
                                      {{ $kgrades->name }}
                                  </a>
                              @endforeach 
                              @endif

                          </div>
                          <div class="column-2">
                            
                                  @if(count($kgrade)) 
                                  @foreach($kgrade->slice(3,6) as $kgrades)
                                  <a href="{{ route('teacher.prekschool.score', 
                                  [
                                  'teacher_id'=>auth()->user()->id,
                                  'grade_id'=>$kgrades->id, 
                                  'student_id'=>$students->id
                                  ]) 
                              }}">
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
                                        <a href="{{ route('teacher.score.secondary', 
                                        [
                                        'teacher_id'=>auth()->user()->id,
                                        'grade_id'=>$secondaryGrades->id, 
                                        'student_id'=>$students->id,
                                        ]) 
                                    }}">
                                            {{ $secondaryGrades->name }}
                                        </a>
                                    @endforeach 
                                @endif
                              
                              
                              
                              
                            </div>
                            <div class="column">
                              
                                @if(count($secondaryGrade)) 
                                    @foreach($secondaryGrade->slice(5,5) as $secondaryGrades)
                                        <a href="{{ route('teacher.score.secondary', 
                                        [
                                        'teacher_id'=>auth()->user()->id,
                                        'grade_id'=>$secondaryGrades->id, 
                                        'student_id'=>$students->id,
                                        ]) 
                                    }}">
                                            {{ $secondaryGrades->name }}
                                        </a>
                                    @endforeach 
                                @endif
                            </div>
                            <div class="column">
                              
                                @if(count($secondaryGrade)) 
                                    @foreach($secondaryGrade->slice(10,5) as $secondaryGrades)
                                        <a href="{{ route('teacher.score.secondary', 
                                        [
                                        'teacher_id'=>auth()->user()->id,
                                        'grade_id'=>$secondaryGrades->id, 
                                        'student_id'=>$students->id,
                                        ]) 
                                    }}">
                                            {{ $secondaryGrades->name }}
                                        </a>
                                    @endforeach 
                                @endif
                            </div>

                            <div class="column">
                                    @if(count($secondaryGrade)) 
                                    @foreach($secondaryGrade->slice(15,6) as $secondaryGrades)
                                        <a href="{{ route('teacher.score.secondary', 
                                        [
                                        'teacher_id'=>auth()->user()->id,
                                        'grade_id'=>$secondaryGrades->id, 
                                        'student_id'=>$students->id,
                                        ]) 
                                    }}">
                                            {{ $secondaryGrades->name }}
                                        </a>
                                    @endforeach 
                                @endif
                            </div>
                          </div>
                        </div>
                      </div> 

            </li>


        

            <li>
                <div class="dropdown">
                    <button class="dropbtn">High School <i class="fa fa-caret-down"></i></button>
                    <div class="dropdown-content">
                       @if(count($grade)) 
                        @foreach($grade as $grades)
                            <a href="{{ route('teacher.score.view', 
                            [
                            'teacher_id'=>auth()->user()->id,
                            'grade_id'=>$grades->id, 
                            'student_id'=>$students->id
                            ]) 
                        }}">
                                {{ $grades->grade_name }}
                            </a>
                        @endforeach 
                        @endif
                      
                      
                    </div>
                  </div>
            </li>

            <a href="{{ route('teacher.transcript',['student_id'=>$students->id]) }}" class="btn btn-primary pull-right">
                Print Transcript
                <i class="fas fa-print"></i>
            </a>
    
    
            <a href="{{ route('teacher.select.option',['student_id'=>$students->id]) }}" class="btn btn-success pull-right">
                Print Yearly Report
                <i class="fas fa-print"></i>
            </a>

                  

    </ul>
</div>




@endif
