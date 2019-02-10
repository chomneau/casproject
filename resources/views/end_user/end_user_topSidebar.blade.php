<div class="header navbar">
    <div class="header navbar">
        <div class="header-container">
            <ul class="nav-left">
                <li><a id="sidebar-toggle" class="sidebar-toggle" href="javascript:void(0);">
                            
                        <i  style="color:#55CBF2" class="fa fa-align-justify" aria-hidden="true"></i>
                        
                        <li class="search-box"><a class="search-toggle no-pdd-right" href="javascript:void(0);">
                            <i class="fa fa-search" aria-hidden="true"></i>                     
                        </a></li>
                <li class="search-input">
                    <input class="form-control" type="text" placeholder="Search..."></li>
            </ul>
            <ul class="nav-right">

                <li class="dropdown">
                    <a href="" class="dropdown-toggle no-after peers fxw-nw ai-c lh-1" data-toggle="dropdown">
                        <div class="peer mR-10">
                            <img class="w-2r bdrs-50p" src="{{ asset($students->photo) }}" class="img-circle" width="120" height="100%">
                        </div>
                        <div class="peer">
                            <span class="fsz-sm c-grey-900">
                                {{ auth()->user()->studentProfile->first_name }} <i class="fa fa-angle-down" aria-hidden="true"></i>
                            </span>
                        </div>
                    </a>
                    <ul class="dropdown-menu fsz-sm">
                        {{--
                        <li>
                            <a href="" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                                <i class="ti-settings mR-10"></i> 
                                <span>Setting</span>
                            </a>
                        </li> --}}
                        <li style="margin-top: 7px; margin-bottom:6px">
                            <a href="{{ route('home.profile')}}" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                                    <i style="color:#55CBF2" class="fas fa-address-book"></i> 
                                <span>Profile</span>
                            </a>
                        </li>
                        <li></li>
                        <li role="separator" class="divider"></li>
                        
                        <li>
                            <a href="{{ route('student.passwordFrom', ['id'=>auth()->user()->id])}}" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                                <i class="fa fa-unlock" style="color:#55CBF2"></i>
                                <span>password</span>
                            </a>
                        </li> 
                        <li role="separator" class="divider"></li>
                        <li style="margin-top: 10px; margin-bottom:6px">
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