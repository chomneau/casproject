@extends('admin.admin-layout.main') 
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">

        @if(Auth::guard('admin')->check())
            
        @elseif(Auth::guard('teacher')->check())
            <span class="pull-right" style="margin-right:30px">
                <a href="{{ route('teacher.show.absentRecord', ['id'=>$students->id]) }}" class="btn btn-primary btn-sm ">
                <i class="fa fa-edit m-right-xs"></i>
                Absent
                </a>
            </span>
        @endif

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                    @include('admin.student.profile.student_profile_info')


                    <div class="x_title">
                        
                        <div class="clearfix"></div>
                    </div>


            <div class="row">
                <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="x_panel ">
                        <div class="x_title">
                            <h2>ABSENT RECORD</h2>
                            
                            <div class="clearfix"></div>
                        </div>
    
                        <div class="x_content">
                            <i class="fa fa-square green"></i> 
                            <a href="{{ route('show.absentRecord', ['id'=>$students->id]) }}">Student Absent</a>
                        </div>
                    </div>
                </div>   
                {{-- Mid-term --}}
                <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="x_panel ">
                        <div class="x_title">
                            <h2>MID-TERM</h2>
                            
                            <div class="clearfix"></div>
                        </div>
    
                        <div class="x_content">
                            <i class="fa fa-square blue"></i> 
                            <a href="{{ route('midterm.option',['student_id'=>$students->id]) }}">
                                Mid-Term Report Card
                            </a>
                        </div>
                    </div>
                </div>  

                

                {{-- Transcript --}}

                <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="x_panel ">
                        <div class="x_title">
                            <h2>YEARLY REPORT</h2>
                            
                            <div class="clearfix"></div>
                        </div>
    
                        <div class="x_content">
                            <i class="fa fa-square green"></i> 
                            <a href="{{ route('select.option',['student_id'=>$students->id]) }}">Yearly Report Card</a>
                        </div>
                    </div>
                </div>  


                {{-- other 4 --}}

                
                
                

                

                {{-- Transcript --}}

                <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="x_panel ">
                        <div class="x_title">
                            <h2>TRANSCRIPT</h2>
                            
                            <div class="clearfix"></div>
                        </div>
    
                        <div class="x_content">
                            <i class="fa fa-square green"></i> 
                            <a href="{{ route('transcript',['student_id'=>$students->id]) }}">Transcript</a>
                        </div>
                    </div>
                </div> 

                {{-- student ID Card --}}

                <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="x_panel ">
                        <div class="x_title">
                            <h2>STUDENT CARD</h2>
                            
                            <div class="clearfix"></div>
                        </div>
    
                        <div class="x_content">
                            <i class="fa fa-square blue"></i> 
                            <a href="{{ route('student.showCardID', ['id'=>$students->id]) }}">Student Card</a>
                        </div>
                    </div>
                </div>  
            
            </div>        
                


            @include('admin.student.grade_menu')
                

                </div>

            </div>
        </div>
    </div>

    <!-- /page content -->
@endsection