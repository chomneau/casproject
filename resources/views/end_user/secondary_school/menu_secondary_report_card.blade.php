


            <div class="row" >
                <div class="col-md-12">
                    <div class="bgc-white bd bdrs-3 p-20 mB-20">

                         
                        <h3>
                            STUDENT REPORT CARD FOR GRADE 1 TO 8             
                        </h3>

                        <div class="dropdown-divider" style="margin-bottom: 20px"></div>
                        
                       

                        
                        <div class="container">
                            
                            <div class="row">

                                @foreach($grade_secondary as $grade_secondarys)

                                <div class="col-sm-3">
                                    <div class="card">
                                        
                                        <div>
                                            <img src="{{ asset('images/report-card.png')}}" alt="" width="130" height="100%" />
                                        </div>
                                        <div class="content" style="margin-top: 10px">
                                            <p> 
                                                <span class="font-weight-bold">
                                                    Grade : {{ $grade_secondarys->name }} 
                                                    
                                                </span>  

                                            </p>
                                            <p>
                                                <a href="{{ route('student.secondary.reportCard.detail', ['student_id'=>$students->id, 'grade_id'=>$grade_secondarys->id]) }}">
                                                    <button style="background-color: #0CC1B8; border-radius: 20px; border-color: #7F6FEF; border:3px; padding-top:5px; padding-bottom: 5px; padding-left: 15px; padding-right: 15px; color: #fff">
                                                        View Report Card
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

            












           

