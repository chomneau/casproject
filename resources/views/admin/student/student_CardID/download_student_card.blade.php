<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>student Card</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
        body, html {
        height: 100%;
        margin: 0;
        position: relative; z-index: 0; left: 0px; top: 0px;
        background-color: rgb(8, 8, 77);
        }
        .front{
            /* border: solid 1px red; */
            width: 252pt;
            height:142.5pt;
            /* background-image: url('images/cas-new-template.jpg'); */
            /* height: 100%;  */

            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative; z-index: 0; left: 0px; top: 0px;
            margin: 0;
            padding: 0;
            
            
            
        }
        .image{
            width: 258pt;
            height:160pt;
            float: left;
            margin: 10px 0px 0px 15px ;
            padding-top: -20px;
            padding-left: 2px;
            /* border: solid 1px green; */
            position: relative; z-index: 0; left: 0px; top: 0px;
        }
        .content-left{
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 12px;
            color: aliceblue;
            height: 90px;
            margin-top: 55px;
            /* border: solid 1px green; */
            padding-bottom: -10px;
            float: left;
            
            clear: both;
        }
        .content-left ul li{
            margin-left: -10px;
            /* border: solid 1px red; */
        }
        .content-right{
            /* border: solid 1px green; */
            width: 75px;
            height: 107px;
            float: right;
            margin-right:11px;
            
            position: relative;
            padding-top: 53px;

        }
        /* .cover{
            width: 252px;
            height: 192px;
            border: solid 2px rgb(213, 216, 13);
        } */

        .back{
            
            /* border: solid 1px red; */
            width: 250.5pt;
            height:142.5pt;
            /* background-image: url('images/backstudentcard.jpg'); */
            /* height: 100%;  */

            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            margin: 0;
            
            
        
        }

        .barcode ul{
        width: 200px;
        height: 40px;
        margin-top:7.8em; 
         margin-left: 14px;
         margin-bottom: -6px;
         position: absolute;
         float: left;
         padding-top: 38px;
         /* border:1px solid #000; */
         clear: both;
    }
    .barcode ul li{
        /* border: #043df8 solid 1px; */
        margin-left: -27px;
        margin-top: -1px;
        margin-bottom: 0px;
        font-size: 10px;
        font-size: 9px;
    }
        .page-break {
            page-break-after: always;
        }


    </style>
</head>
<body>
    <div class="front">
        
        <div class="row cover">
            <div class="image">
                <img class="image-id" src="images/cas-new-template.jpg" alt="user profile" width="340" height="192">
            </div>
            <div class="col-md-7 content-left">
                <ul >
                    <li>Name: {{ $last_name }}, {{ $first_name }}</li>
                    <li>ID: {{ $card_id }}</li>
                    <li>Grade: {{ $grade }}</li>                                                
                    <li>Contact: {{ $contact }}</li>                                                
                    <li>Expiration Date: {{ $expired_date}}</li>                                                
                </ul>
            </div>
            {{-- student photo --}}
            <div class="col-md-5 content-right">
                <img class="image-id" src="{{ $photo }}" alt="user profile" width="80" height="107">
            </div>
        </div>

        <div class="barcode">
                        
            <ul style="list-style-type: none;" >
               <li>
                   {!! $barcode !!}
                   
               </li>
               <li style="margin-top:-3px; letter-spacing:11px">{{ $card_id }}</li>
           </ul>

        </div> 
        
    </div>
    <div class="page-break"></div>
    
    <div class="back">
        <img class="image-id" src="images/backstudentcard.jpg" alt="user profile" width="350" height="220">
    </div>

</body>
</html>