


            <div class="row" >
                <div class="col-md-12">
                    <div class="bgc-white bd bdrs-3 p-20 mB-20">

                         
                        <h3 class="text-center">
                            STUDENT CGPA BY GRADE (9-12)               
                        </h3>

                        <div class="dropdown-divider" style="margin-bottom: 20px"></div>
                        
                       

                        
                        <div class="container">
                            
                            <div class="row">

                                @foreach($grade_highschool as $grade_highschools)

                                <div class="col-sm-3">
                                    <div class="card">
                                        
                                        <div>
                                            <a href="{{ route('student.cgpaByGrade', ['student_id'=>$students->id, 'grade_id'=>$grade_highschools->id]) }}">
                                            <img src="{{ asset('images/cgpa-icon.png')}}" alt="" width="130" height="100%" />
                                            </a>
                                        </div>
                                        <div class="content" style="margin-top: 10px">
                                            <p> 
                                                <span class="font-weight-bold">
                                                    Grade : {{ $grade_highschools->grade_name }} 
                                                    
                                                </span>  

                                            </p>
                                            <p>
                                                <a href="{{ route('student.cgpaByGrade', ['student_id'=>$students->id, 'grade_id'=>$grade_highschools->id]) }}">
                                                    <button style="background-color: #0CC1B8; border-radius: 20px; border-color: #7F6FEF; border:3px; padding-top:5px; padding-bottom: 5px; padding-left: 15px; padding-right: 15px; color: #fff">
                                                        View CGPA Detail
                                                    </button>

                                                    
                                                </a>

                                            </p>
                                        </div>
                                    </div>
                                </div>
                                
                                @endforeach

                                   
                            </div>
                        </div>

                        
                    </div>
                </div>
            </div>

            
