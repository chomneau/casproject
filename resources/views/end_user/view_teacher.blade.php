


            <div class="row" >
                <div class="col-md-12">
                    <div class="bgc-white bd bdrs-3 p-20 mB-20">

                         
                        <h3>
                            Staff's Contact              
                        </h3>

                        <div class="dropdown-divider" style="margin-bottom: 20px"></div>
                        
                       

                        
                        <div class="container">
                            
                            <div class="row">

                                @foreach($teacher as $teachers)

                                <div class="col-sm-3">
                                    <div class="card">
                                        <canvas class="header-bg" width="250" height="70" id="header-blur"></canvas>
                                        <div class="avatar">
                                            <img src="{{ asset($teachers->photo) }}" alt="" />
                                        </div>
                                        <div class="content">
                                            <p> 
                                                <span class="font-weight-bold">
                                                    {{ $teachers->first_name }} 
                                                    {{ $teachers->last_name }} 
                                                </span>  

                                            </p>
                                            <p>
                                                <a href="{{ route('endUser.teacher.profile', ['student_id'=>$students->id, 'teacher_id'=>$teachers->id] )}}" class="btn btn-info ">

                                                    View Profile

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

            












           

