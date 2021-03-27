
<!-- top navigation -->
<div class="top_nav">
    <div class="nav_menu">
        <nav>
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

   

            <ul class="nav navbar-nav navbar-right">
                @if(Auth::guard('admin')->check())
                

                    <li style="padding-top:-5px">
                        <div class="dropdown">
                            <button class="dropbtn">
                                <a href="" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <img src="{{ asset('uploads/logos/1510817755img.png') }}" alt="admin">{{ Auth::user()->name }}
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                            </button>
                            <div class="dropdown-content">

                                    <a href="/admin/adminProfile/{{ Auth()->user()->id }}">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                        Profile</a>

                                    <a href="{{ route('admin.updatepassword', ['id'=> Auth::user()->id]) }}">
                                            <i class="fa fa-lock" aria-hidden="true"></i>
                                            <span>Change Password</span>
                                    </a>

                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                                     <i class="fa fa-sign-out" aria-hidden="true"></i>
                                     Logout
                                 </a>
 
                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                     {{ csrf_field() }}
                                 </form>
                              
                              
                            </div>
                        </div>
                    </li>
                {{--@endif--}}

                @elseif(Auth::guard('teacher')->check())

                <li style="padding-top:-5px">
                        <div class="dropdown">
                            <button class="dropbtn">
                                <a href="" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <img src="{{ asset(Auth()->user()->photo) }}" alt="admin">{{ Auth::user()->first_name }}
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                            </button>
                            <div class="dropdown-content">

                                    <a href="{{route('teacher.profile', ['teacher_id'=>Auth::user()->id])}}">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                        Profile</a>

                                    <a href="{{ route('teacher.changePassword', ['teacher_id'=>Auth::user()->id]) }}">
                                            <i class="fa fa-lock" aria-hidden="true"></i>
                                            <span>Change Password</span>
                                    </a>

                                    <a href="{{ route('teacher.logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                     <i class="fa fa-sign-out" aria-hidden="true"></i>
                                     Logout
                                    </a>

                                 <form id="logout-form" action="{{ route('teacher.logout') }}" method="POST" style="display: none;">
                                     {{ csrf_field() }}
                                 </form>
                              
                              
                            </div>
                        </div>
                    </li>
                        
                @endif



            </ul>
        </nav>
    </div>
</div>
<!-- /top navigation -->
