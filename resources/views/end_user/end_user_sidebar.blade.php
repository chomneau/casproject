<div class="sidebar">
    <div class="sidebar-inner">
        <div class="sidebar-logo">
            <div class="peers ai-c fxw-nw">
                <div class="peer peer-greed">
                    <a class="sidebar-link td-n" href="index.html">
                        <div class="peers ai-c fxw-nw">
                            <div class="peer">
                                <div class="logo"><img src="{{ asset('assets/static/images/logo.png') }}" alt=""></div>
                            </div>
                            <div class="peer peer-greed">
                                <h5 class="lh-1 mB-0 logo-text">

                                    <i style="color:#55CBF2" class="fas fa-user-graduate"></i> Student Profile</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="peer">
                    <div class="mobile-toggle sidebar-toggle"><a href="" class="td-n"><i class="ti-arrow-circle-left"></i></a></div>
                </div>
            </div>
        </div>

        <ul class="sidebar-menu scrollable pos-r">
            <li class="nav-item mT-30 active">
                <a class="sidebar-link" href="{{ route('home.profile') }}">
                    <span class="icon-holder">
                        <i style="color:#55CBF2" class="fas fa-address-book"></i>
                    </span>
                    <span class="title">Profile</span>
                </a>
            </li>
            {{-- K and pre-k --}}
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i style="color:#55CBF2"  class="fas fa-user"></i> 
                    </span>
                    <span class="title">
                        Pre-School
                    </span> 
                    <span class="arrow">
                        <i style="color:#55CBF2" class="fas fa-angle-right"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    @if(count($kgrade)) @foreach($kgrade as $kgrades)
                    <li class="nav-item dropdown">
                        <a href="{{ route('student.prekscore', ['grade_id'=>$kgrades->id, 'student_id'=>$students->id]) }}">
                                <span>
                                    {{ $kgrades->name }}
                                </span>
                                <span class="arrow">
                                    <i style="color:#55CBF2" class="ti-angle-right"></i>
                                </span>
                            </a>
                    </li>
                    @endforeach @endif

                </ul>
            </li>
            {{-- primary and seconday school --}}
            <li class="nav-item dropdown"><a class="dropdown-toggle" href="javascript:void(0);"><span class="icon-holder"><i style="color:#55CBF2"  class="fas fa-users"></i> </span><span class="title">
                Primary & Secondary</span> <span class="arrow">
                    <i style="color:#55CBF2" class="fas fa-angle-right"></i></span></a>
                <ul class="dropdown-menu">
                    @if(count($secondaryGrade)) @foreach($secondaryGrade as $secondaryGrades)

                    <li class="nav-item dropdown">
                        <a href="{{ route('student.secondary', ['grade_id'=>$secondaryGrades->id, 'student_id'=>$students->id]) }}">
                                    <span>
                                    {{ $secondaryGrades->name }}
                                    </span>
                                    <span class="arrow">
                                        <i style="color:#55CBF2" class="ti-angle-right"></i>
                                    </span>
                        </a>
                    </li>

                    @endforeach @endif
                </ul>
            </li>
            {{-- High school --}}
            <li class="nav-item dropdown"><a class="dropdown-toggle" href="javascript:void(0);"><span class="icon-holder">
                    <i style="color:#55CBF2"  class="fas fa-user-graduate"></i> </span><span class="title">
                High School</span> <span class="arrow"><i  style="color:#55CBF2" class="fas fa-angle-right"></i></span></a>
                <ul class="dropdown-menu">
                    @if(count($grade)) @foreach($grade as $grades)

                    <li class="nav-item dropdown">
                        <a href="{{ route('student.highschool', ['grade_id'=>$grades->id, 'student_id'=>$students->id]) }}">                            
                            <span>
                                {{ $grades->grade_name }}
                            </span>
                            <span class="arrow">
                                <i style="color:#55CBF2" class="ti-angle-right"></i>
                            </span>
                        </a>
                    </li>

                    @endforeach @endif
                </ul>
            </li>
        </ul>
    </div>
</div>