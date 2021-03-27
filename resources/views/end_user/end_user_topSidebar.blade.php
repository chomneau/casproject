<div class="header navbar">
    <div class="header navbar" style="background-color: #036e92">
        <div class="header-container">
            <ul class="nav-left">
                <li><a id="sidebar-toggle" class="sidebar-toggle" href="javascript:void(0);">
                            
                        <i  style="color:#55CBF2" class="fa fa-align-justify" aria-hidden="true"></i>
                        
                        <li class="d-block d-sx-block d-sm-block" >
                            
                            <h4 style="padding-top: 16px; padding-bottom:-25px; color:aliceblue" >CAS SYSTEM</h4>                   
                        </a>
                        </li>
                <li>
                    
                </li>
            </ul>
            <ul class="nav-right">

                <li class="dropdown">
                    <a href="" class="dropdown-toggle no-after peers fxw-nw ai-c lh-1" data-toggle="dropdown">
                        <div class="peer mR-10">
                            <img class="w-2r bdrs-50p" src="{{ asset(Auth()->user()->studentProfile->photo) }}" class="img-circle" style="border: 1px solid rgb(113, 222, 222);">
                        </div>
                        <div class="peer">
                            <span class="fsz-sm c-grey-900" style="color: aliceblue">
                                {{ auth()->user()->studentProfile->first_name }} <i class="fa fa-angle-down" aria-hidden="true"></i>
                            </span>
                        </div>
                    </a>
                    <ul class="dropdown-menu fsz-sm" style="width: 200px; font-size:16px;">
                        {{--
                        <li>
                            <a href="" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                                <i class="ti-settings mR-10"></i> 
                                <span>Setting</span>
                            </a>
                        </li> --}}
                        <li class="pt-2 pb-2">
                            <a href="{{ route('home.profile')}}" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                                    <i style="color:#55CBF2" class="fas fa-address-book"></i> 
                                <span>Profile</span>
                            </a>
                        </li>
                        <li></li>
                        <li role="separator" class="divider"></li>
                        
                        <li class="pt-2 pb-2">
                            <a href="{{ route('student.passwordFrom', ['id'=>Auth()->user()->StudentProfile->id])}}" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                                <i class="fa fa-lock" style="color:#55CBF2"></i>
                                <span>Change Password</span>
                            </a>
                        </li> 
                        <li role="separator" class="divider"></li>
                        <li class="pt-2 pb-2">
                            <a href="{{ route('user.logout') }}" onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                                 <i class="fa fa-sign-out" aria-hidden="true"></i>
                                 Logout
                             </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>