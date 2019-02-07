

            <div class="row">
                <div class="col-md-12">
                    <div class="bgc-white bd bdrs-3 p-20 mB-20">
                        <h4 class="c-grey-900 mB-20">Student CGPA Record</h4>
                        <div class="dropdown-divider"></div>

                        <ul class="nav nav-tabs">
                          
                            <li class="nav-item">
                                <a class="nav-link" style="color: #227f93; font-weight: bold;"  href="{{ route('student.cgpa910', ['student_id'=>$students->id]) }}" target="_blank" >
                                    Grade 9 to 10
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" style="color: #227f93; font-weight: bold;"  href="{{ route('student.cgpa911', ['student_id'=>$students->id]) }}" target="_blank" >
                                    Grade 9 to 11
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" style="color: #227f93; font-weight: bold;"  href="{{ route('student.cgpa912', ['student_id'=>$students->id]) }}" target="_blank" >
                                    Grade 9 to 12
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" style="color: #227f93; font-weight: bold;"  href="{{ route('student.cgpa1011', ['student_id'=>$students->id]) }}" target="_blank" >                                    
                                    Grade 10 to 11
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" style="color: #227f93; font-weight: bold;"  href="{{ route('student.cgpa1012', ['student_id'=>$students->id]) }}" target="_blank" >
                                    Grade 10 to 12
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" style="color: #227f93; font-weight: bold;"  href="{{ route('student.cgpa1112', ['student_id'=>$students->id]) }}" target="_blank" >
                                    Grade 11 to 12
                                </a>
                            </li>
                          
                        </ul>

                        
                    </div>
                </div>
            </div>

             

