
            <div class="row">
                <div class="col-md-12">
                    <div class="bgc-white bd bdrs-3 p-20 mB-20">
                        
                        <h3 class="text-center">
                            STUDENT CGPA RECORD              
                        </h3>
                        <div class="dropdown-divider"></div>   
                    </div>
                </div>

                <div class="container">                           
                    <div class="row">
                        
                        
                        <div class="col-sm-4">
                            <div class="card">                                
                                <div>
                                    <a href="{{ route('student.cgpa910', ['student_id'=>$students->id]) }}" target="_blank">
                                    <img src="{{ asset('images/cgpa-icon.png') }}" alt="" width="130" height="100%" />
                                    </a>
                                </div>
                                <div class="content" style="margin-top: 10px">
                                    <p> 
                                        <span class="font-weight-bold">
                                            Grade 9 to 10                                             
                                        </span>  
                                    </p>
                                    <p>
                                    <a href="{{ route('student.cgpa910', ['student_id'=>$students->id]) }}" target="_blank">
                                        <button style="background-color: #0CC1B8; border-radius: 20px; border-color: #7F6FEF; border:3px; padding-top:5px; padding-bottom: 5px; padding-left: 15px; padding-right: 15px; color: #fff">
                                            View CGPA Detail
                                        </button>
                                    </a>
                                    </p>
                                </div>
                            </div>
                        </div> 
                    {{-- Grade 9-11 --}}

                    <div class="col-sm-4">
                        <div class="card">                                
                            <div>
                                <a href="{{ route('student.cgpa911', ['student_id'=>$students->id]) }}" target="_blank">
                                <img src="{{ asset('images/cgpa-icon.png') }}" alt="" width="130" height="100%" />
                                </a>
                            </div>
                            <div class="content" style="margin-top: 10px">
                                <p> 
                                    <span class="font-weight-bold">
                                        Grade 9 to 11                                             
                                    </span>  
                                </p>
                                <p>
                                <a href="{{ route('student.cgpa911', ['student_id'=>$students->id]) }}" target="_blank">
                                    <button style="background-color: #0CC1B8; border-radius: 20px; border-color: #7F6FEF; border:3px; padding-top:5px; padding-bottom: 5px; padding-left: 15px; padding-right: 15px; color: #fff">
                                        View CGPA Detail
                                    </button>
                                </a>
                                </p>
                            </div>
                        </div>
                    </div> 

                    {{-- Grade 9-12 --}}

                    <div class="col-sm-4">
                        <div class="card">                                
                            <div>
                                <a href="{{ route('student.cgpa912', ['student_id'=>$students->id]) }}" target="_blank">
                                <img src="{{ asset('images/cgpa-icon.png') }}" alt="" width="130" height="100%" />
                                </a>
                            </div>
                            <div class="content" style="margin-top: 10px">
                                <p> 
                                    <span class="font-weight-bold">
                                        Grade 9 to 12                                            
                                    </span>  
                                </p>
                                <p>
                                <a href="{{ route('student.cgpa912', ['student_id'=>$students->id]) }}" target="_blank">
                                    <button style="background-color: #0CC1B8; border-radius: 20px; border-color: #7F6FEF; border:3px; padding-top:5px; padding-bottom: 5px; padding-left: 15px; padding-right: 15px; color: #fff">
                                        View CGPA Detail
                                    </button>
                                </a>
                                </p>
                            </div>
                        </div>
                    </div> 

                    {{-- Grade 10-11 --}}
                    <div class="col-sm-4">
                        <div class="card">                                
                            <div>
                                <a href="{{ route('student.cgpa1011', ['student_id'=>$students->id]) }}" target="_blank">
                                <img src="{{ asset('images/cgpa-icon.png') }}" alt="" width="130" height="100%" />
                                </a>
                            </div>
                            <div class="content" style="margin-top: 10px">
                                <p> 
                                    <span class="font-weight-bold">
                                        Grade 10 to 11                                             
                                    </span>  
                                </p>
                                <p>
                                <a href="{{ route('student.cgpa1011', ['student_id'=>$students->id]) }}" target="_blank">
                                    <button style="background-color: #0CC1B8; border-radius: 20px; border-color: #7F6FEF; border:3px; padding-top:5px; padding-bottom: 5px; padding-left: 15px; padding-right: 15px; color: #fff">
                                        View CGPA Detail
                                    </button>
                                </a>
                                </p>
                            </div>
                        </div>
                    </div> 
                {{-- Grade 10-12 --}}

                <div class="col-sm-4">
                    <div class="card">                                
                        <div>
                            <a href="{{ route('student.cgpa1012', ['student_id'=>$students->id]) }}" target="_blank">
                            <img src="{{ asset('images/cgpa-icon.png') }}" alt="" width="130" height="100%" />
                            </a>
                        </div>
                        <div class="content" style="margin-top: 10px">
                            <p> 
                                <span class="font-weight-bold">
                                    Grade 10 to 12                                             
                                </span>  
                            </p>
                            <p>
                            <a href="{{ route('student.cgpa1012', ['student_id'=>$students->id]) }}" target="_blank">
                                <button style="background-color: #0CC1B8; border-radius: 20px; border-color: #7F6FEF; border:3px; padding-top:5px; padding-bottom: 5px; padding-left: 15px; padding-right: 15px; color: #fff">
                                    View CGPA Detail
                                </button>
                            </a>
                            </p>
                        </div>
                    </div>
                </div> 

                {{-- Grade 11-12 --}}
                <div class="col-sm-4">
                    <div class="card">                                
                        <div>
                            <a href="{{ route('student.cgpa1112', ['student_id'=>$students->id]) }}" target="_blank">
                            <img src="{{ asset('images/cgpa-icon.png') }}" alt="" width="130" height="100%" />
                            </a>
                        </div>
                        <div class="content" style="margin-top: 10px">
                            <p> 
                                <span class="font-weight-bold">
                                    Grade 11 to 12                                             
                                </span>  
                            </p>
                            <p>
                            <a href="{{ route('student.cgpa1112', ['student_id'=>$students->id]) }}" target="_blank">
                                <button style="background-color: #0CC1B8; border-radius: 20px; border-color: #7F6FEF; border:3px; padding-top:5px; padding-bottom: 5px; padding-left: 15px; padding-right: 15px; color: #fff">
                                    View CGPA Detail
                                </button>
                            </a>
                            </p>
                        </div>
                    </div>
                </div> 

            </div>
        </div>
    </div>

             

