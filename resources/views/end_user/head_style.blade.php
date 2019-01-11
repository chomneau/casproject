<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <title>cas system</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ"
        crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
        crossorigin="anonymous">





    <style>
    body::-webkit-scrollbar {
    width: 1em;
    }
        #loader {
            transition: all .3s ease-in-out;
            opacity: 1;
            visibility: visible;
            position: fixed;
            height: 100vh;
            width: 100%;
            background: #fff;
            z-index: 200000
        }

        #loader.fadeOut {
            opacity: 0;
            visibility: hidden
        }

        .spinner {
            width: 40px;
            height: 40px;
            position: absolute;
            top: calc(50% - 20px);
            left: calc(50% - 20px);
            background-color: #333;
            border-radius: 100%;
            -webkit-animation: sk-scaleout 1s infinite ease-in-out;
            animation: sk-scaleout 1s infinite ease-in-out
        }

        @-webkit-keyframes sk-scaleout {
            0% {
                -webkit-transform: scale(1)
            }
            100% {
                -webkit-transform: scale(0);
                opacity: 0
            }
        }

        @keyframes sk-scaleout {
            0% {
                -webkit-transform: scale(0);
                transform: scale(0)
            }
            100% {
                -webkit-transform: scale(1);
                transform: scale(1);
                opacity: 0
            }
        }

        .table-wrapper-scroll-y {
            display: block;
            max-height: 900px;
            overflow-y: auto;
            -ms-overflow-style: -ms-autohiding-scrollbar;
            }


    
        .src-image {
          display: none;
        }

        .card {
          overflow: hidden;
          position: relative;
          border: 1px solid rgb(113, 222, 222);
          border-radius: 2px;
          text-align: center;
          padding: 0;
          background-color: #FFF;
          color: rgb(136, 172, 217);
          margin-bottom: 20px;

        }

        .card .header-bg {
          /* This stretches the canvas across the entire hero unit */
          position: absolute;
          top: 0;
          left: 0;
          width: 100%;
          height: 70px;
          border-bottom: 15px solid rgb(113, 222, 222);
          /* This positions the canvas under the text */
          z-index: 1;
        }
        .card .avatar {
          position: relative;
          margin-top: 15px;
          z-index: 100;
        }

        .card .avatar img {
          width: 100px;
          height: 100px;
          -webkit-border-radius: 50%;
          -moz-border-radius: 50%;
          border-radius: 50%;
          border: 3px solid rgb(113, 222, 222);
        }



</style>
            
    
    <link href="{{ asset('colortheme/style.css') }}" rel="stylesheet">
</head>
