<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            @if(Auth::guard('admin')->check())
                <a href="/admin" class="site_title"><i class="fa fa-paw"></i> <span>Admin !</span></a> 
            @elseif(Auth::guard('teacher')->check())
                <a href="/teacher" class="site_title"><i class="fa fa-paw"></i> <span>Teacher !</span></a> 
            @endif
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        @if(Auth::guard('admin')->check())
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="{{ asset('uploads/logos/1510817755img.png') }}" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{ Auth::user()->name }}</h2>
            </div>
        </div>


        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>ADMIN PANEL</h3>
                <ul class="nav side-menu">
                    <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="/admin">Dashboard</a></li>
                        </ul>
                    </li>

                    <li><a><i class="fas fa-users"></i> Users <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('admin.showUsers') }}">View all users</a></li>
                            <li><a href="{{ route('admin.register') }}">Create new user</a></li>
                            
                        </ul>
                    </li>

                    <li><a><i class="fas fa-user-graduate f2"></i> Students <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('student.viewAll') }}">View all students</a></li>
                            <li><a href="{{ route('student.byGrade') }}">View students by Grade</a></li>
                            <li><a href="{{ route('student.register') }}">Register new student</a></li>


                        </ul>
                    </li>

                    <li><a href="#"><i class="fas fa-book-open"></i> Teachers </a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('teacher.register') }}">Add new teacher</a></li>
                            <li><a href="{{ route('teacher.showAll') }}">View all teachers</a></li>
                            

                        </ul>
                    </li>

                    



                    <li><a><i class="fa fa-sliders"></i> Setting <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">

                            <li><a>Grade<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li class="sub_menu"><a href="{{ route('grade.prek') }}">K & Pre-K</a>
                                    </li>
                                    <!-- <li><a href="{{ route('grade.primary') }}">Primary School</a>
                                    </li> -->
                                    <li><a href="{{ route('grade.secondary') }}">Primary & Secondary</a>
                                    </li>
                                    <li><a href="{{ route('grade.index') }}">High School</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a>Subject<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li class="sub_menu"><a href="{{ route('subject.prek') }}">K & Pre-K</a>
                                    </li>
                                    <li><a href="{{ route('subject.primary') }}">Primary & Secondary</a>
                                    </li>
                                    <li><a href="{{ route('subject.index') }}">High Subject</a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a>Grade Profile<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li class="sub_menu"><a href="{{ route('gradeprofile.index') }}">Grade Profile</a>
                                    </li>

                                </ul>
                            </li>


                        </ul>

                    </li>

                </ul>


            </div>

            
        </div>



        @elseif(Auth::guard('teacher')->check())

        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="{{ asset(Auth()->user()->photo) }}" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome,{{ Auth()->user()->name }}</span>
                
            </div>
        </div>


        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="/teacher">Teacher Profile</a></li>
                            
                        </ul>
                    </li>

                    <li>
                        <a>
                            <i class="fas fa-user-graduate"></i> Students <span class="fa fa-chevron-down"></span>
                        </a>
                        <ul class="nav child_menu">
                            

                            <li>
                            <a href="{{ route('teacher.student.byGrade', ['teacher_id'=>Auth()->user()->id ]) }}">View Student by Grade</a>
                            </li>


                            

                        </ul>
                    </li>

                    <li>
                        <a>
                            <i class="fas fa-book-reader"></i> Assignments <span class="fa fa-chevron-down"></span>
                        </a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('teacher.assignment.show', ['teacher_id'=>Auth()->user()->id ]) }}">View all Assignment</a></li>

                            <li>
                                <a href="{{ route('teacher.assignment.create', ['teacher_id'=>Auth()->user()->id ]) }}">Post Assignment</a>
                            </li>

                        </ul>
                    </li>

                
                </ul>
            </div>





        </div>

        @endif
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a href="{{ route('logout') }}" data-toggle="tooltip" data-placement="top" title="Logout" onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">


                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>

                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>