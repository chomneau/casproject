
@extends('admin.admin-layout.main') 
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Student Profile
                    <span>
                            <a href="{{ route('student.detail.edit', ['id'=>$students->id]) }}" class="btn btn-success btn-sm ">
                               <i class="fa fa-edit m-right-xs"></i>
                                Edit Profile
                            </a>
                        </span>


                </h3>
            </div>


        </div>
        <span class="pull-right" style="margin-right:30px">
                <a href="{{ route('show.absentRecord', ['id'=>$students->id]) }}" class="btn btn-primary btn-sm ">
                   <i class="fa fa-edit m-right-xs"></i>
                    Absent
                </a>
            </span>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                    @include('admin.student.profile.student_profile_info')



                        <div class="x_title">
                            <h3>Transcript </h3>

                            <div class="clearfix"></div>
                        </div>
                        

                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Transcript by Grade</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">CGPA G 9 - 10</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">CGPA G 9 - 11</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content4" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">CGPA G 9 - 12</a>
                        </li>

                        <li role="presentation" class=""><a href="#tab_content5" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">CGPA G 10 - 11</a>
                        </li>

                        <li role="presentation" class=""><a href="#tab_content7" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">CGPA G 10 - 12</a>
                        </li>

                        <li role="presentation" class=""><a href="#tab_content6" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">CGPA G 11 - 12</a>
                        </li>



                      </ul>
                      <div id="myTabContent" class="tab-content">

                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                          <!-- Transcript for high school -->

                            <div class="col-md-3 col-sm-6 col-xs-12" style="margin-left: 1.6em">
                                <div class="x_panel">
                                  <div class="x_title">
                                    <h2>GPA By Grade</h2>
                                    <div class="clearfix"></div>
                                  </div>
                                      <form action="{{ route('highschool.transcript', ['student_id'=>$students->id]) }}" method="GET">
                                          {{ csrf_field() }}
                                            <div class="tab-content">

                                                <div class="row">
                                                    <div class="col-md-8">
                                                        
                                                        <div class="tab-pane active" id="home">

                                                            @if(count($grade))
                                                                @foreach($grade as $grades)


                                                                    <div class="checkbox">
                                                                        <label>
                                                                          <input type="radio" name="grade" id ="radio" class="flat" value="{{$grades->id}}">

                                                                          {{ $grades->grade_name }}

                                                                        </label>
                                                                    </div>


                                                                @endforeach

                                                            @endif

                                                        </div>

                                                    </div>
                                                    <div class="col-md-4" style="margin-top: 12px">
                                                        <div class="pull-right">
                                                            <input type="submit" value="print view" class="btn btn-success btn-sm">
                                                        </div>
                                                    </div>
                                                </div>


                                                

                                            </div>
                                        <!-- end form -->

                                      </form>
                                </div>
                            </div>

                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                          {{--CGPA for Grade 9-10 Hight school--}}
                            <div class="col-md-3 col-sm-6 col-xs-12" style="margin-left: 13.5em">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>CGPA Grade 9-10</h2>
                                        <div class="clearfix"></div>

                                    </div>
                                    <form action="{{ route('transcript910', ['student_id'=>$students->id]) }}" method="GET">
                                        {{ csrf_field() }}
                                        <div class="tab-content">


                                            <div class="row">
                                                <div class="col-md-6">
                                                        
                                                    <div class="tab-pane active" id="home">

                                                    <label for="checkall">
                                                        <input type="checkbox" id="checkall" > Check all
                                                    </label>
                                                    <hr>

                                                        @if(count($grade))
                                                            @foreach($grade as $grades)

                                                                <div class="checkbox">
                                                                    <label>
                                                                        <input type="checkbox" class="checkItem" 
                                                                        name="grade[]"  value="{{$grades->id}}"  >

                                                                        {{ $grades->grade_name }}

                                                                    </label>
                                                                </div>


                                                            @endforeach

                                                        @endif

                                                    </div>


                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="pull-right">
                                                            <input type="submit" value="print view" class="btn btn-success btn-sm">
                                                        </div>
                                                    </div>
                                                </div>



                                            

                                        </div>
                                        <!-- end form -->

                                    </form>
                                </div>
                            </div>
                        {{--end CGPA grade 9-10--}}
                        </div>

                    <!-- CGPA for grade 9-11 -->

                        <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                          {{--CGPA for Grade 9-11 Hight school--}}
                            <div class="col-md-3 col-sm-6 col-xs-12 pull-right" style="margin-right: 39.5em">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>CGPA Grade 9-11</h2>
                                        <div class="clearfix"></div>

                                    </div>
                                    <form action="{{ route('transcript911', ['student_id'=>$students->id]) }}" method="GET">
                                        {{ csrf_field() }}
                                        <div class="tab-content">


                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="tab-pane active" id="home">

                                                        <label for="checkall">
                                                            <input type="checkbox" id="checkall" > Check all
                                                        </label>
                                                        <hr>

                                                            @if(count($grade))
                                                                @foreach($grade as $grades)

                                                                    <div class="checkbox">
                                                                        <label>
                                                                            <input type="checkbox" class="checkItem" 
                                                                            name="grade[]"  value="{{$grades->id}}"  >

                                                                            {{ $grades->grade_name }}

                                                                        </label>
                                                                    </div>


                                                                @endforeach

                                                            @endif

                                                        </div>

                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="pull-right">
                                                            <input type="submit" value="print view" class="btn btn-success btn-sm">
                                                        </div>
                                                    </div>

                                                </div>{{--end row--}}




                                            

                                        </div>
                                        <!-- end form -->

                                    </form>
                                </div>
                            </div>
                        {{--end CGPA grade 9-11--}}
                        </div>


                        <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">
                          

                        {{--CGPA for Hight school--}}
                            <div class="col-md-3 col-sm-6 col-xs-12 pull-right" style="margin-right: 27.5em">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>CGPA Grade 9 - 12</h2>
                                        <div class="clearfix"></div>

                                    </div>
                                    <form action="{{ route('cgpa.school', ['student_id'=>$students->id]) }}" method="GET">
                                        {{ csrf_field() }}
                                        <div class="tab-content">


                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="tab-pane active" id="home">

                                                        <label for="checkall">
                                                            <input type="checkbox" id="checkall"> Check all
                                                        </label>
                                                        <hr>

                                                            @if(count($grade))
                                                                @foreach($grade as $grades)

                                                                    <div class="checkbox">
                                                                        <label>
                                                                            <input type="checkbox" class="checkItem" 
                                                                            name="grade[]"  value="{{$grades->id}}"  >

                                                                            {{ $grades->grade_name }}

                                                                        </label>
                                                                    </div>


                                                                @endforeach

                                                            @endif

                                                        </div>

                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="pull-right">
                                                            <input type="submit" value="print view" class="btn btn-success btn-sm">
                                                        </div>
                                                    </div>
                                                </div>




                                            

                                        </div>
                                        <!-- end form -->

                                    </form>
                                </div>
                            </div>
                        {{--end CGPA--}}


                        </div>


                        {{--CGPA 10-11--}}

                        <div role="tabpanel" class="tab-pane fade" id="tab_content5" aria-labelledby="profile-tab">
                          

                        {{--CGPA for Hight school--}}
                            <div class="col-md-3 col-sm-6 col-xs-12 pull-right" style="margin-right: 15.5em">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>CGPA Grade 10 - 11</h2>
                                        <div class="clearfix"></div>

                                    </div>
                                    <form action="{{ route('transcript1011', ['student_id'=>$students->id]) }}" method="GET">
                                        {{ csrf_field() }}
                                        <div class="tab-content">


                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="tab-pane active" id="home">

                                                            <label for="checkall">
                                                                <input type="checkbox" id="checkall" > Check all
                                                            </label>
                                                            <hr>

                                                                @if(count($grade))
                                                                    @foreach($grade as $grades)

                                                                        <div class="checkbox">
                                                                            <label>
                                                                                <input type="checkbox" class="checkItem" 
                                                                                name="grade[]"  value="{{$grades->id}}"  >

                                                                                {{ $grades->grade_name }}

                                                                            </label>
                                                                        </div>


                                                                    @endforeach

                                                                @endif

                                                            </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="pull-right">
                                                            <input type="submit" value="print view" class="btn btn-success btn-sm">
                                                        </div>
                                                    </div>
                                                </div>



                                    

                                        </div>
                                        <!-- end form -->

                                    </form>
                                </div>
                            </div>
                        


                        </div>

                        {{--end CGPA 10-11 --}}


                        {{--CGPA 11-12--}}

                        <div role="tabpanel" class="tab-pane fade" id="tab_content6" aria-labelledby="profile-tab">
                          

                        {{--CGPA for Hight school--}}
                            <div class="col-md-3 col-sm-6 col-xs-12 pull-right" style="margin-right: 3.5em">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>CGPA Grade 11 - 12</h2>
                                        <div class="clearfix"></div>

                                    </div>
                                    <form action="{{ route('transcript1112', ['student_id'=>$students->id]) }}" method="GET">
                                        {{ csrf_field() }}
                                        <div class="tab-content">



                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="tab-pane active" id="home">

                                                            <label for="checkall">
                                                                <input type="checkbox" id="checkall" > Check all
                                                            </label>
                                                            <hr>

                                                                @if(count($grade))
                                                                    @foreach($grade as $grades)

                                                                        <div class="checkbox">
                                                                            <label>
                                                                                <input type="checkbox" class="checkItem" 
                                                                                name="grade[]"  value="{{$grades->id}}"  >

                                                                                {{ $grades->grade_name }}

                                                                            </label>
                                                                        </div>


                                                                    @endforeach

                                                                @endif

                                                            </div>

                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="pull-right">
                                                            <input type="submit" value="print view" class="btn btn-success btn-sm">
                                                        </div>
                                                    </div>
                                                </div>



                                        </div>
                                        <!-- end form -->

                                    </form>
                                </div>
                            </div>
                        {{--end CGPA--}}


                        </div>

                        {{--end CGPA 10-11 --}}


                        {{--CGPA 10-12--}}

                        <div role="tabpanel" class="tab-pane fade" id="tab_content7" aria-labelledby="profile-tab">
                          

                        {{--CGPA for Hight school--}}
                            <div class="col-md-3 col-sm-6 col-xs-12 pull-right" style="margin-right: 10.5em">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>CGPA Grade 10 - 12</h2>
                                        <div class="clearfix"></div>

                                    </div>
                                    <form action="{{ route('transcript1012', ['student_id'=>$students->id]) }}" method="GET">
                                        {{ csrf_field() }}
                                        <div class="tab-content">



                                            <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="tab-pane active" id="home">

                                                            <label for="checkall">
                                                                <input type="checkbox" id="checkall" > Check all
                                                            </label>
                                                            <hr>

                                                                @if(count($grade))
                                                                    @foreach($grade as $grades)

                                                                        <div class="checkbox">
                                                                            <label>
                                                                                <input type="checkbox" class="checkItem" 
                                                                                name="grade[]"  value="{{$grades->id}}"  >

                                                                                {{ $grades->grade_name }}

                                                                            </label>
                                                                        </div>


                                                                    @endforeach

                                                                @endif

                                                            </div>

                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="pull-right">
                                                            <input type="submit" value="print view" class="btn btn-success btn-sm">
                                                        </div>
                                                    </div>
                                                </div>




                                        </div>
                                        <!-- end form -->

                                    </form>
                                </div>
                            </div>
                        


                        </div>

                        {{--end CGPA 10-12 --}}







                      </div>
                    </div>

                        

                        

                    </div>

                </div>
            </div>
        </div>
    </div>



  



<!-- Latest compiled and minified JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 

	<!-- <script type="text/javascript">
		$("#checkall").change(function(){
			$(".checkItem").prop("checked", $(this).prop("checked"))
		})
	</script> -->

<script>
    $(document).ready(function () {
    var ckbox = $('#checkall');
    var radio = $('#radio');
    $("#submit").hide();
   

    $('#checkall').on('click',function () {
        if (ckbox.is(':checked')) {
            $(".checkItem").prop("checked", true);
            $("#submit").show();
            $(".checkItem").disable();
        } else {
            $(".checkItem").prop("checked", false);
            $("#submit").hide();
        }
    });

});
    
    <!-- /page content -->

</script>

@endsection