<main class="main-content bgc-grey-100">
    <div id="mainContent">
        <div class="container">


            <div class="bgc-white bd bdrs-3 p-20 mB-20">
                <h4 class="c-grey-900 mB-20">Student Profile</h4>
                {{--
                <p>Using the most basic table markup, here’s how </p> --}}
                <!-- page content -->

                <div class="row">
                    {{--start col-container--}}
                    <div class="col-md-2 ">
                        <img src="{{ asset($students->photo) }}" alt="user profile" width="150" height="150">
                    </div>

                    <div class="col-md-5">

                        <div class="x_content" style="margin-top: -10px">
                            <div class="dashboard-widget-content">

                                <ul style="margin-top: 15px; list-style: none; font-size: 14px">
                                    <li style="margin-bottom: 8px"><i class="glyphicon glyphicon-user"></i>
                                        <a href="#">Name : {{ $students->first_name }} {{ $students->last_name }}</a>
                                    </li>
                                    <li style="margin-bottom: 8px"><i class="fa fa-transgender"></i>
                                        <a href="#">Gender : {{ $students->gender }} </a>
                                    </li>

                                    <li style="margin-bottom: 8px"><i class="fa fa-calendar"></i>
                                        <a href="#">Date of birth : {{ $students->date_of_birth }} </a>
                                    </li>

                                    <li style="margin-bottom: 8px"><i class="fa fa-list-ul"></i>
                                        <a href="#">Grade :  </a>
                                        <button type="button" class="btn btn-success btn-xs">

                                                                                            @if(count($gradeProfile))
                                                                                                @foreach($gradeProfile as $grades)
                                                                                                    @if($students->grade_profile_id  == $grades->id)
                                                                                                        {{ $grades->name }}
                                                                                                    @endif
                                                                                                @endforeach
                                                                                            @endif
                                                                                            </button>

                                    </li>
                                    <li style="margin-bottom: 8px"><i class="fa fa-credit-card"></i>
                                        <a href="#">Student id : {{ $students->card_id }} </a>
                                    </li>
                                    <li style="margin-bottom: 8px"><i class="fa fa-flag"></i>
                                        <a href="#">Nationality : {{ $students->nationality }} </a>
                                    </li>

                                    <li style="margin-bottom: 8px"><i class="glyphicon glyphicon-home"></i>
                                        <a href="#">Start date : {{ $students->created_at->format('M d, Y') }}</a>
                                    </li>


                                </ul>


                            </div>
                        </div>
                    </div>

                    <div class="col-md-5">


                        <div class="studentDetail">
                            <div class="dashboard-widget-content">

                                <ul style="margin-top: 5px; list-style: none; font-size: 14px">
                                    <li>
                                        <h4>Parents info</h4>
                                    </li>
                                    <li style="margin-bottom: 8px"><i class="glyphicon glyphicon-user"></i>
                                        <a href="#">parents'name : {{ $students->parents_name }}</a>
                                    </li>
                                    <li style="margin-bottom: 8px"><i class="fa fa-briefcase"></i>
                                        <a href="#">Occupation : {{ $students->occupation }} </a>
                                    </li>

                                    <li style="margin-bottom: 8px"><i class="fa fa-calendar"></i>
                                        <a href="#">Age :
                                                                                            {{ floor((time() - strtotime( $students->parents_dob )) / 31556926) }} years old
                                                                                            </a>
                                    </li>

                                    <li style="margin-bottom: 8px"><i class="fa fa-phone"></i>
                                        <a href="#">Phone : {{ $students->phone }} </a>
                                    </li>

                                    <li style="margin-bottom: 8px"><i class="fa fa-envelope"></i>
                                        <a href="#">email : {{ $students->email }} </a>
                                    </li>
                                    <li style="margin-bottom: 8px"><i class="glyphicon glyphicon-home"></i>
                                        <a href="#">Address : {{ $students->address }}</a>
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