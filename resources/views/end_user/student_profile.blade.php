<main class="main-content bgc-grey-100">
    <div id="mainContent" style="color:#16181c">
        <div class="container-fluid">


            <div class="bgc-white bd bdrs-3 p-20 mB-20">
                <h4 class="c-grey-900 mB-20">Student Profile</h4>
                {{--
                <p>Using the most basic table markup, here’s how </p> --}}
                <!-- page content -->

                <div class="row">
                    {{--start col-container--}}
                    <div class="col-md-2 " style="margin-top: 1.5em">
                        <img src="{{ asset($students->photo) }}" alt="user profile" width="150" height="150">
                    </div>

                    <div class="col-lg-4 col-md-4">

                        <div class="x_content" style="margin-top: -10px">
                            <div class="dashboard-widget-content">

                                <ul style="margin-top: 15px; list-style: none; font-size: 14px">
                                    <li>
                                        <h3>Student's info</h3>
                                    </li>
                                    <li style="margin-bottom: 8px"><i class="fas fa-user-graduate"></i>
                                        Name : {{ $students->last_name }}, {{ $students->first_name }} 
                                    </li>
                                    <li style="margin-bottom: 8px"><i class="fa fa-transgender"></i>
                                        Gender : {{ $students->gender }} 
                                    </li>

                                    <li style="margin-bottom: 8px"><i class="fa fa-calendar"></i>
                                        Date of Birth : {{ $students->date_of_birth }} 
                                    </li>

                                    <li style="margin-bottom: 8px"><i class="fa fa-list-ul"></i>
                                       Grade :  
                                        <span class="btn btn-danger btn-sm">

                                            @if(count($gradeProfile))
                                                @foreach($gradeProfile as $grades)
                                                    @if($students->grade_profile_id  == $grades->id)
                                                        {{ $grades->name }}
                                                    @endif
                                                @endforeach
                                            @endif
                                        </span>

                                    </li>
                                    <li style="margin-bottom: 8px"><i class="fa fa-credit-card"></i>
                                        Student ID : {{ $students->card_id }} 
                                    </li>
                                    <li style="margin-bottom: 8px"><i class="fa fa-flag"></i>
                                        Nationality : {{ $students->nationality }} 
                                    </li>

                                    <li style="margin-bottom: 8px"><i class="fas fa-walking"></i>
                                        Admission Date : {{  
                                                date('d-M-Y', strtotime($students->start_date))
                                                }}
                                    </li>


                                </ul>


                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3">


                        <div class="studentDetail">
                            <div class="dashboard-widget-content">

                                <ul style="margin-top: 5px; list-style: none; font-size: 14px">
                                    <li>
                                        <h3>Father's info</h3>
                                    </li>
                                    <li style="margin-bottom: 8px"><i class="fas fa-user-tie"></i>
                                        Father's name : {{ $students->father_name }}
                                    </li>
                                    <li style="margin-bottom: 8px"><i class="fa fa-briefcase"></i>
                                        Occupation : {{ $students->father_occupation }} 
                                    </li>

                                    

                                    <li style="margin-bottom: 8px"><i class="fas fa-mobile-alt"></i>
                                        Phone : {{ $students->father_phone }} 
                                    </li>

                                    <li style="margin-bottom: 8px"><i class="fa fa-envelope"></i>
                                       Email : {{ $students->father_email }} 
                                    </li>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-3 col-md-3">


                        <div class="studentDetail">
                            <div class="dashboard-widget-content">

                                <ul style="margin-top: 5px; list-style: none; font-size: 14px">
                                    <li>
                                        <h3>Mother's info</h3>
                                    </li>
                                    <li style="margin-bottom: 8px">
                                        <i class="fas fa-user-tie"></i>
                                        Mother's name : {{ $students->mother_name }}
                                    </li>
                                    <li style="margin-bottom: 8px"><i class="fa fa-briefcase"></i>
                                        Occupation : {{ $students->mother_occupation }} 
                                    </li>

                                    

                                    <li style="margin-bottom: 8px"><i class="fas fa-mobile-alt"></i>
                                        Phone : {{ $students->mother_phone }} 
                                    </li>

                                    <li style="margin-bottom: 8px"><i class="fa fa-envelope"></i>
                                        Email : {{ $students->mother_email }} 
                                    </li>
                                    <li style="margin-bottom: 8px"><i class="fas fa-home"></i>
                                        Address : {{ $students->address }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>





                    <br />
                </div>
                {{--end of col-container container--}}
            </div>

            <!-- /page content -->

        </div>
    </div>
    </div>
</main>

