<!DOCTYPE html>
<html lang="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
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
        width: 336px;
        height: 206px;
        /* border:1px solid #043df8; */
        background-repeat: no-repeat, repeat;
        background-size: cover;
        background-position: center;
        font-family: Arial,Helvetica Neue,Helvetica,sans-serif; 
        /* font-family: 'Roboto', sans-serif; */
      
    }
    .print-box{
        top:0;
        right:0;
        bottom:0;
        left:0;
        z-index:99;
        margin:auto;
        text-align:center;
        /* line-height:200px; */
    }

    

    .studentCard {
      display: flex;
      align-items: center;
      justify-content: left;
      width: 336px;
      height: 206px;
      margin:0px 0px 0px 0px;
      padding: 0; 
      /* font-family: 'Roboto', sans-serif; */    
        margin: 0 auto;
        
    }

    .bottom-box{
        /* position:absolute; */
        top:0;
        right:0;
        bottom:0;
        left:0;
        z-index:20;
        margin:auto;
        width: 336px;
        height: 206px;
        border:0.5px solid rgb(62, 165, 250);
        /* text-align:center; */
        line-height:200px;
    }
    .content-left{
        width:240px;
        height: 120px;
        /* margin-left:10px; */
        /* border: solid 3px; */
        float: left;
        font-size: 12px;
        /* text-align:center; */
        line-height:18px;
        margin-top: 50px; 
        color:white;
        margin-left: -10px;
        
    }

    .content-right{
        width:80px;
        height: 110px;
        float: right;
        /* margin-left:10px; */
        /* border: solid #900 1px; */
        margin: 4.5px 4px 0 0;
        padding: 0px;
    }

    .card-ul{
        list-style-type: none;
        margin: 0;
        padding: 0; !important;
        
    }
    ul.reset,
    ul.reset li,
    ul.reset ul li {
   margin:0;
   padding: 0;
   text-indent: 0;
   list-style-type: 0;
   
}



    .image-id{
        /* margin-top: 10px; */
        /* margin-left: 1.5em; */
        float:right;
    }
    .spaceright{
        margin-right: 30px;
    }
    .barcode ul{
        width: 180px;
        height: 50px;
        margin-top:10.0em; 
         margin-left: 14px;
         margin-bottom: 1em;
         float: left;
         /* border:1px solid #000; */
         clear: both;
    }
    .barcode ul li{
        /* border: #043df8 solid 1px; */
        margin-left: -25px;
        margin-top: 5px;
        font-size: 10px;
    }

    page[size="A4"] {  
        width: 21cm;
        height: 29.7cm; 
    }
   
   </style>
    {{-- <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">  --}}
<body>

    

    <div class="container">
        <div class="row">
            <div class="top-box">
                <div class="studentCard">
                    <div class="image">
                        <img src="{{ public_path('/images/CAS-ID.jpg')}}" alt="" style="width: 336px;
                        height: 198px;">
                    </div>
                    <div class="row">
                        <div class="content-left">
                            <ul >
                                <li>Name: {{ $last_name }}, {{ $first_name }}</li>
                                <li>ID: {{ $card_id }}</li>
                                <li>Grade: {{ $grade }}</li>                                                
                                <li>Contact: {{ $contact }}</li>                                                
                                <li>Expiration Date: {{ $expired_date}}</li>                                                
                            </ul>
                        </div>
                        <div class="content-right">
                            <img class="image-id" src="{{ $photo }}" alt="user profile" width="83" height="107">
                        </div>
                    </div>
                    
                
                </div>
                <div class="barcode">
                        
                    <ul style="list-style-type: none;" >
                       <li>
                           {!! $barcode !!}
                           
                       </li>
                       <li style="color: darkblue;margin-top:0px; letter-spacing:11px">{{ $card_id }}</li>
                   </ul>

                </div>  

                

            </div>

        </div>
    </div>


<page size="A4">
    <div class="container">
        <div class="row">
            <div class="bottom-box">
                <div class="image">
                    <img src="{{ public_path('/images/backstudentcard.jpg')}}" alt="" style="width: 336px;
                    height: 206px;">
                </div>
            </div>
        </div>
    </div>
   
</page>   
  


</body>
</html>


