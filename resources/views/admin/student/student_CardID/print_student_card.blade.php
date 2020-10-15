<!DOCTYPE html>
<html lang="en">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
   <style>
    .top-box{
        /* position:absolute; */
        top:0;
        right:0;
        bottom:0;
        left:0;
        z-index:50;
        margin:auto;
        width: 530px;
        height: 325px;
        border:1px solid #DF0000;
        /* text-align:center; */
        line-height:200px;
        /* background-image: url("/images/CAS-ID.jpg"); */
        margin-top:30px;
        margin-bottom: 20px;
        /* background-image: url("/images/CAS-ID.jpg"); */
        background-repeat: no-repeat, repeat;
        background-size: cover;
        background-position: center;
      
    }
    .print-box{
        top:0;
        right:0;
        bottom:0;
        left:0;
        z-index:99;
        margin:auto;
        text-align:center;
        line-height:200px;
    }

    

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
      /* font-family: 'Roboto', sans-serif; */
      
    }

    .bottom-box{
        /* position:absolute; */
        top:0;
        right:0;
        bottom:0;
        left:0;
        z-index:20;
        margin:auto;
        width: 530px;
        height: 325px;
        border:1px solid #000;
        /* text-align:center; */
        line-height:200px;
    }

    .card-ul li{
        display: block;
        text-decoration: none;
        font-size: 18px;
        color: #fff;
        margin-left: 10px;
        
    }

    .image-id{
        margin-top: 0;
        margin-left: 2em;
    }
    .spaceright{
        margin-right: 30px;
    }
    .barcode{
        margin-top:-5em;
        margin-left: -2em;
        margin-bottom: -10em;
    }
   
   </style>
   {{--  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">  --}}

{{--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">  --}}
<body>

    <div class="container">
        <div class="row">
            <div class="top-box">
                <div class="studentCard">

                    <table class="table borderless ml-2" style="color: white; margin-top:10px">
                        <tr style="border-top: none !important;">
                            <td class="col-sm-4 border-0">Name</td>
                            
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

                    <div >
                        <img class="image-id" src="https://ibb.co/qRm71jH" alt="user profile" width="130" height="170">
                       {{--  <img class="image-id" src="/images/david.jpeg" alt="user profile" width="130" height="170"> --}}
                    </div>
                    
                
                </div>
                <div class="barcode">
                        
                    <ul class="card-ul">
                       <li>
                           {!! $barcode !!}
                           
                       </li>
                       <li style="color: darkblue;margin-top:-4.5em; letter-spacing:23px">{{ $student->card_id }}</li>
                   </ul>

                </div>  

                

            </div>

            

            <div class="bottom-box">
                {{--  Hello back      --}}
            </div>

            <div class="print-box">
                <a href="{{ route('student.printCardID',['id'=>$student->id]) }}" class="btn btn-primary">Print Student Card</a>  
            </div>

        </div>
    </div>

    


</body>
</html>


