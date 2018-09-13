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


        <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
    <style>
        #loader {
            transition: all .3s ease-in-out;
            opacity: 1;
            visibility: visible;
            position: fixed;
            height: 100vh;
            width: 100%;
            background: #fff;
            z-index: 90000
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
                -webkit-transform: scale(0)
            }
            100% {
                -webkit-transform: scale(1);
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
    </style>
    <link href="{{ asset('colortheme/style.css') }}" rel="stylesheet">
</head>

<body class="app">
    <div id="loader">
        <div class="spinner"></div>
    </div>
    <script>
        window.addEventListener('load', () => {
            const loader = document.getElementById('loader');
            setTimeout(() => {
            loader.classList.add('fadeOut');
            }, 300);
        });
    </script>

    {{-- sidebar --}}
    @include('end_user.end_user_sidebar')

    <div class="page-container">
        {{-- top sidebar --}}
    @include('end_user.end_user_topSidebar')
    


    <!-- page content -->



<main class="main-content bgc-grey-100">
    <div id="mainContent">
        <div class="container">
            


                <div class="bgc-white bd bdrs-3 p-20 mB-20">
                    <h4 class="c-grey-900 mB-20 col-md-8 offset-md-2" >Change Student Password</h4>
                    <form role="form" class="form-group" action="{{ route('student.updatePassword', ['id'=>Auth()->user()->id]) }}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    
                    <!-- page content -->

                    <div class="col-md-8 offset-md-2 {{ $errors->has('password') ? ' has-error' : '' }}" style="margin-bottom: 20px">
                        <label for="exampleInputEmail1">Current Password</label>
                        
                        <input type="password" name="oldPassword" class="form-control" value="{{ old('password') }}" required autofocus placeholder="Current password" >
                            @if ($errors->has('oldPassword'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('oldPassword') }}</strong>
                                </span>
                            @endif
                    </div>

                    <div class="help-block col-md-8 offset-md-2">
                        @if(Session::has('error'))
                            <strong style="color: red;" >{{Session::get('error')}}</strong>
                        @endif

                    </div>

                    

                    

                    <div class="col-md-8 offset-md-2 {{ $errors->has('password') ? ' has-error' : '' }}" style="margin-bottom: 20px">
                        <label for="exampleInputEmail1">New Password</label>
                        <input type="password" name="password" class="form-control" value="{{ old('password') }}" required autofocus placeholder="New password">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif

                    </div>

                    <div class="col-md-8 offset-md-2 {{ $errors->has('address') ? ' has-error' : '' }}" style="margin-bottom: 20px">
                        <label for="exampleInputEmail1">Confirm new password</label>
                        <input type="password" name="password_confirmation" class="form-control" value="" required autofocus placeholder="Confirm new password">
                            </div>

                    <div class="col-md-8 offset-md-2 {{ $errors->has('address') ? ' has-error' : '' }}" style="margin-bottom: 50px">
                        <button class="btn btn-success">
                            <i class="fa fa-edit m-right-xs"></i>
                            Change Password
                        </button>
                    </div>

                    
                    {{--end of col-container container--}}


                    </form>

                </div>

            <!-- /page content -->

                
            </div>
        </div>
    </div>
</main>



    <!-- /page content -->

    </div>

    <script type="text/javascript" src="{{ asset('colortheme/vendor.js') }}"></script>
    <script type="text/javascript" src="{{ asset('colortheme/bundle.js') }}"></script>

    <script>
        <script>
            @if(Session::has('success'))
            toastr.success("{{Session::get('success')}}")
        @endif

         @if(Session::has('error'))
            toastr.error("{{Session::get('error')}}")
        @endif
    </script>

</body>

</html>















