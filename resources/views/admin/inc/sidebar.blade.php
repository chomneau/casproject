<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            @if(Auth::guard('admin')->check())
            <a href="/admin" class="site_title"><i class="fa fa-paw"></i> <span>Admin !</span></a>
            @elseif(Auth::guard('employer')->check())
               <a href="/employer" class="site_title"><i class="fa fa-paw"></i> <span>Employer !</span></a>
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
                    
                    <li><a><i class="fa fa-edit"></i> Teachers <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('admin.showUsers') }}">View all teachers</a></li>
                            <li><a href="{{ route('admin.register') }}">Create new teacher</a></li>
                            {{--<li><a href="{{ route('createjob.index') }}">View all post jobs</a></li>--}}

                        </ul>
                    </li>

                    <li><a><i class="fa fa-edit"></i> Students <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('student.viewAll') }}">View all students</a></li>
                            <li><a href="{{ route('student.register') }}">Register new student</a></li>
                            {{--<li><a href="{{ route('createjob.index') }}">View all post jobs</a></li>--}}

                        </ul>
                    </li>

                    <li><a><i class="fa fa-edit"></i> Page setting <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('about.setting') }}">About</a></li>
                            <li><a href="{{ route('admin.register') }}">Contact</a></li>
                            {{--<li><a href="{{ route('createjob.index') }}">View all post jobs</a></li>--}}

                        </ul>
                    </li>



                    <li><a><i class="fa fa-sliders"></i> Setting <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">

                            <li><a>Grade<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li class="sub_menu"><a href="{{ route('grade.prek') }}">K & Pre-K</a>
                                    </li>
                                    <li><a href="{{ route('grade.primary') }}">Primary School</a>
                                    </li>
                                    <li><a href="{{ route('grade.secondary') }}">Secondary School</a>
                                    </li>
                                    <li><a href="{{ route('grade.index') }}">High School</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a>Subject<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li class="sub_menu"><a href="{{ route('subject.prek') }}">K & Pre-K</a>
                                    </li>
                                    <li><a href="{{ route('subject.primary') }}">Primary to Secondary</a>
                                    </li>
                                    <li><a href="{{ route('subject.index') }}">High Subject</a>
                                    </li>
                                </ul>
                            </li>


                        </ul>

                    </li>

                </ul>


            </div>

{{--
                <div class="menu_section">
                    <h3>Live On</h3>
                    <ul class="nav side-menu">
                        <li><a><i class="fa fa-bug"></i> Additional Pages <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="e_commerce.html">E-commerce</a></li>
                                <li><a href="projects.html">Projects</a></li>
                                <li><a href="project_detail.html">Project Detail</a></li>
                                <li><a href="contacts.html">Contacts</a></li>
                                <li><a href="profile.html">Profile</a></li>
                            </ul>
                        </li>
                        <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="page_403.html">403 Error</a></li>
                                <li><a href="page_404.html">404 Error</a></li>
                                <li><a href="page_500.html">500 Error</a></li>
                                <li><a href="plain_page.html">Plain Page</a></li>
                                <li><a href="login.html">Login Page</a></li>
                                <li><a href="pricing_tables.html">Pricing Tables</a></li>
                            </ul>
                        </li>
                        <li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="#level1_1">Level One</a>
                                <li><a>Level One<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li class="sub_menu"><a href="level2.html">Level Two</a>
                                        </li>
                                        <li><a href="#level2_1">Level Two</a>
                                        </li>
                                        <li><a href="#level2_2">Level Two</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="#level1_2">Level One</a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a></li>
                    </ul>
                </div>

    --}}
        </div>



    @elseif(Auth::guard('employer')->check())

            <div class="profile clearfix">
                <div class="profile_pic">
                    <img src="{{ asset($company->logo) }}" alt="..." class="img-circle profile_img" >
                </div>
                <div class="profile_info">
                    <span>Welcome,</span>
                    <h2>{{ Auth::user()->name }}</h2>
                </div>
            </div>


        <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                <div class="menu_section">
                    <h3>General</h3>
                    <ul class="nav side-menu">
                        <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="/employer">Company profile</a></li>
                                {{--<li><a href="/employer">About Company</a></li>--}}
                            </ul>
                        </li>

                        {{--<li><a><i class="fa fa-tachometer" aria-hidden="true"></i>--}}
                                {{--Job Dashboard <span class="fa fa-chevron-down"></span></a>--}}
                            {{--<ul class="nav child_menu">--}}
                                {{--<li><a href="{{ route('employer.viewAllJobs') }}">View all Jobs</a></li>--}}
                                {{--<li><a href="{{ route('company.create') }}">Post New Job</a></li>--}}
                                {{--<li><a href="{{ route('createjob.index') }}">View all post jobs</a></li>--}}

                            {{--</ul>--}}
                        {{--</li>--}}




                        <li><a><i class="fa fa-bookmark" aria-hidden="true"></i> Your Note <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="fixed_sidebar.html">Your note</a></li>
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
            <a href="{{ route('logout') }}"
               data-toggle="tooltip" data-placement="top" title="Logout"
                   onclick="event.preventDefault();
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