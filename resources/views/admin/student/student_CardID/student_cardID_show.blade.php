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
        margin-left: 10px;
        
    }

    .image-id{
        margin-top: 6.7em;
        margin-left: 2em;
    }
    .spaceright{
        margin-right: 30px;
    }
    .borderless td, .borderless th {
    border: 0.25px;
    }

    .barcode{
        margin-top:-5em;
        margin-left: -2em;
    }
</style>
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="" style="margin-bottom: 12em">
  
        <div class="clearfix"></div>

        <div class="row" >
            <div class="col-md-12 col-sm-12 col-xs-12" >
                <div class="x_panel" style="width: auto; height:370px">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                
                                <div class="col-md-8">
                                    <div class="cover">
                                        <div class="studentCard">

                                            <table class="table borderless ml-2" style="color: white">
                                                <tr>
                                                    <td class="col-sm-4">Name</td>
                                                    
                                                    <td>: {{ $student->last_name }}, {{ $student->first_name }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Grade</td>
                                                    
                                                    <td>: {{ substr($student->GradeProfile->name,5)  }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Parent's Contact</td>
                                                    
                                                    <td>: {{ $student->father_phone }}-{{ $student->mother_phone }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Expiration Date </td>
                                                    
                                                    <td>: {{ date('d-M-Y', strtotime($student->start_date))}}</td>
                                                </tr>
                                                

                                            </table>
                                            
                                        
                                        </div>
                                        <div class="barcode">
                                                
                                            <ul class="card-ul">
                                               {{--
                                               <li>Name  <span class="spaceright">:{{ $student->last_name }}, {{ $student->first_name }}</span></li>
                                               <li>ID <span class="spaceright">: {{ $student->card_id }}</span></li>
                                               <li>Grade : {{ substr($student->GradeProfile->name,5)  }}</li>
                                               <li>Parent's Contact : {{ $student->father_phone }}-{{ $student->mother_phone }}</li>
                                               <li>Expiration Date : 
                                                   {{ 
                                                       date('d-M-Y', strtotime($student->start_date))
                                                   }}

                                               </li>
                                               --}}
                                               <li>
                                                   {!! $barcode !!}
                                               </li>
                                               <li style="color: darkblue; letter-spacing:23px">{{ $student->card_id }}</li>
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