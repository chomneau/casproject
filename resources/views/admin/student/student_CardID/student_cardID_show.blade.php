@extends('admin.admin-layout.main') 
<style type="text/css">
    /*.studentCard{
        width: 324px;
        background-color: red;
        height: 204px;
    }*/

    .studentCard {
      display: flex;
      align-items: center;
      justify-content: left;
      width: 530px;
      height: 325px;
      background-image: url("/images/CAS-ID.jpg");
      background-repeat: no-repeat, repeat;
      background-size: cover;
      background-position: center;
      margin:0px 0px 0px 0px;
      padding: 0; 
    }
    .cover{
      
      width: 530px;
      height: 325px;
      /*border: solid red 3px;*/
      margin:0px;
      padding: 10px;
    }
    .card-ul li{
        display: block;
        text-decoration: none;
        font-size: 18px;
        color: #fff;
        margin-left: -15px;
    }

    .image-id{
        margin-top: 6.7em;
        margin-left: 2em;
    }
</style>
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="" style="margin-bottom: 10em">
  
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12" >
                <div class="x_panel">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                
                                <div class="col-md-8">
                                    <div class="cover">
                                        <div class="studentCard">
                                            <ul class="card-ul">
                                                <li>Name : {{ $student->last_name }}, {{ $student->first_name }}</li>
                                                <li>ID : {{ $student->card_id }}</li>
                                                <li>Grade : {{ substr($student->GradeProfile->name,5)  }}</li>
                                                <li>Parent's Contact : {{ $student->father_phone }}-{{ $student->mother_phone }}</li>
                                                <li>Expiration Date : 
                                                    {{ 
                                                        date('d-M-Y', strtotime($student->start_date))
                                                    }}
                                                </li>
                                            </ul>
                                        
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <img class="image-id" src="{{ asset($student->photo) }}" alt="user profile" width="130" height="170">
                                   {{--  <img class="image-id" src="/images/david.jpeg" alt="user profile" width="130" height="170"> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="cover">
                                <div class="studentCard">
                                    <div class="card-front" >
                                        <div class="visible-print text-center" style="margin-top: 30px">
                                            {!! QrCode::size(300)->generate('Hello Chomneau'); !!}
                                            <p>Scan me to return to the original page.</p>
                                        </div>
                                    </div>
                                </div>                              
                            </div>
                        </div>
                    </div>
                    

                    

                    

                    {{-- @include('admin.student.profile.student_profile_info') --}}


                   {{--  <div class="x_title">
                        <div class="clearfix"></div>
                    </div> --}}

                </div>

            </div>
        </div>
    </div>

    <!-- /page content -->
@endsection