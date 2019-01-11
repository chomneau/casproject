

            <div class="row">
                <div class="col-md-12">
                    <div class="bgc-white bd bdrs-3 p-20 mB-20">
                        <h4 class="c-grey-900 mB-20">Student Absent Report</h4>
                        <div class="dropdown-divider"></div>

                        <ul class="nav nav-tabs">
                          
                          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Grade Pre-K to K</a>
                            <div class="dropdown-menu">
                            @if(count($kgrade)) 
                                @foreach($kgrade as $kgrades)
                                
                               
                                    <a href="{{ route('prek.absentByGrade', ['grade_id'=>$kgrades->id, 'student_id'=>$students->id]) }}" class="dropdown-item">
                                            
                                                {{ $kgrades->name }}
                                            
                                            
                                        </a>
                                
                                <div class="dropdown-divider"></div>

                                @endforeach 
                            @endif
                            </div>
                            
                            
                          </li>
                          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Grade 1 to 8</a>
                            <div class="dropdown-menu">
                                
                                @if(count($secondaryGrade))
                                    @foreach($secondaryGrade as $secondaryGrades)
                                
                               
                                    <a href="{{ route('secondary.absentByGrade', ['grade_id'=>$secondaryGrades->id, 'student_id'=>$students->id]) }}" class="dropdown-item">
                                            
                                        {{ $secondaryGrades->name }}
                                    </a>
                                
                                <div class="dropdown-divider"></div>

                                @endforeach 
                            @endif
                            </div>
                          </li>

                          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Grade 9 to 12</a>
                            <div class="dropdown-menu">
                                @if(count($grade)) 
                                    @foreach($grade as $grades)
                                
                               
                                    <a href="{{ route('highSchool.absentByGrade', ['grade_id'=>$grades->id, 'student_id'=>$students->id]) }}" class="dropdown-item">
                                            
                                        {{ $grades->grade_name }}
                                    </a>
                                
                                <div class="dropdown-divider"></div>

                                @endforeach 
                            @endif
                            </div>
                          </li>


                          
                        </ul>

                        
                    </div>
                </div>
            </div>

             

