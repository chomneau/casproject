@extends('admin.admin-layout.main') 
<style type="text/css">
    /*.studentCard{
        width: 324px;
        background-color: red;
        height: 204px;
    }*/

    .studentCard {
        top:0;
        right:0;
        bottom:0;
        left:0;
        z-index:50;
        margin:auto;
        width: 545px;
        height: 320px;
        border:1px solid #0584be;
        font-size: 18px;
        /* text-align:center; */
        line-height:30px;
        background-image: url("/images/CAS-ID.jpg");
        margin-top:40px;
        margin-bottom: 20px;
        /* background-image: url("/images/CAS-ID.jpg"); */
        background-repeat: no-repeat, repeat;
        background-size: cover;
        background-position: center;
 
    }
    .cover{
      height: 500px;
      /*border: solid red 3px;*/
      
      /* border: solid #900 3px; */
      top:0;
        right:0;
        bottom:0;
        left:0;
        z-index:50;
        margin:auto;
    }

    .card-ul li{
        display: block;
        text-decoration: none;
        font-size: 18px;
        color: #fff;
        margin-left: 10px;
    }
    .image-cover{
        top:0;
        right:0;
        bottom:0;
        left:0;
        z-index:50;
        margin: auto;
    }
    .image-id{
        float:right;
        /* float: left; */
        margin-top: -10.8em;
        margin-right: 8px;
    }
    .spaceright{
        margin-right: 30px;
    }
    .borderless td, .borderless th {
    border: 0.01px;
    }
    .barcode{
        top:0;
        right:0;
        bottom:0;
        left:0;
        z-index:50;
        margin:-16px 0 0 -5px;
    }

    
    table.form{width:100%}
    td.label{width:150px;white-space:nowrap;}
    td input{width:55%;}
    td input{color:teal}

    .print{
        top:0;
        right:0;
        bottom:0;
        left:0;
        z-index:50;
        margin:auto;
    }
 

</style>
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="" style="margin-bottom: 5em">
        <div class="clearfix"></div>
                <div class="x_panel">
                    <div class="row" >
            
                    <form action="{{ route('student.printCardID',['id'=>$student->id]) }}" method="GET">
                        {{ csrf_field() }}
                    
                        <div class="cover col-md-12 col-sm-12 col-xs-12">
                            <div class="studentCard">
                                <table class="table borderless ml-2 form" style="color: white; margin-top:5.5em;">
                                    <tr >
                                        <td class="col-sm-3" style="padding-top: 4px; padding-bottom:4px;" >Name</td>
                                        
                                        <td style="padding-top: 4px; padding-bottom:4px;">: {{ $student->last_name }}, {{ $student->first_name }}</td>
                                        <input type="hidden" name="first_name" value="{{ $student->first_name }}">
                                        <input type="hidden" name="last_name" value="{{ $student->last_name }}">
                                    </tr>
                                    <tr>
                                        <td style="padding-top: 4px; padding-bottom:4px;">ID</td>
                                        
                                        <td style="padding-top: 4px; padding-bottom:4px;">: <input type="hidden" name="card_id" value="{{ $student->card_id  }}">{{ $student->card_id  }}</td>
                                    </tr>
                                    <tr>
                                        <td style="padding-top: 4px; padding-bottom:4px;">Grade</td>
                                        
                                        <td style="padding-top: 4px; padding-bottom:4px;">: <input type="text" name="grade" value="{{ ($student->GradeProfile->name)  }}"></td>
                                    </tr>
                                    <tr>
                                        <td style="padding-top: 4px; padding-bottom:4px;">Contact</td>
                                        
                                        <td style="padding-top: 4px; padding-bottom:4px;">: <input type="text" name="contact" value="{{ $student->father_phone }} - {{ $student->mother_phone }}"> </td>
                                    </tr>
                                    <tr>
                                        <td style="padding-top: 4px; padding-bottom:4px;">Expiration Date </td>
                                        
                                        <td style="padding-top: 4px; padding-bottom:4px;">: <input type="text" name="expired_date" value="{{ date('d-M-Y', strtotime($student->start_date))}}"> </td>
                                    </tr>
                                    
                                </table>
                                <div class="image-cover">
                                    <img class="image-id" src="{{ asset($student->photo) }}" alt="user profile" width="130" height="173">
                                </div>
                                <div class="barcode">
                                    
                                    <ul class="card-ul">
                                       <li>
                                           {!! $barcode !!}
                                       </li>
                                       <li style="color: darkblue; letter-spacing:23px">{{ $student->card_id }}</li>
                                    </ul>
                                </div>

                                <div class="print">
                                    <button class="btn btn-success btn-lg btn-block " style="margin-top: 20px">
                                        Print
                                        {{-- <a href="{{ route('student.printCardID',['id'=>$student->id, 'download'=>'pdf']) }}" class="display-4 " style="color: white; font-weight-bold">
                                          PRINT ID CARD 
                                        </a> --}}
                                        {{-- <a href="{{ route('student.showCardID',['id'=>$student->id, 'download'=>'pdf']) }}" class="display-4 " style="color: white; font-weight-bold">
                                          PRINT ID CARD 
                                        </a> --}}
                                        
                                    </button>
                                </div>
                            </div>
                            {{-- end of studentCard --}}
                            
                        </div>

                    </form>    
                               
                    </div>
                </div>
            </div>

    <!-- /page content -->
@endsection