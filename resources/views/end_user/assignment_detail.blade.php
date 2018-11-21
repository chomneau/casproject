<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <title>cas system</title>


    <!-- Bootstrap -->

    <!-- NProgress -->
    <link href="{{ asset('vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ asset('vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="{{ asset('vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{ asset('vendors/jqvmap/dist/jqvmap.min.css') }}" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset('vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('build/css/custom.min.css') }}" rel="stylesheet">

    {{--formwizard style--}}
    <link href="{{ asset('css/formwizard.css') }}" rel="stylesheet">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ"
          crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
          crossorigin="anonymous">


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


    <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top: 5em">
        <div>
            <div class="x_title">
                <h3>{{ $assignments->title }}<span class="pull-right" style="font-size: 12px">posted by teacher <strong>{{ $assignments->teacher->first_name }} {{ $assignments->teacher->last_name }} </strong></span></h3>

                <div class="clearfix"></div>
            </div>
            <ul class="list-unstyled top_profiles scroll-view">

                    <li class="media event">
                        <a href="">

                            <p class="pull-left border-aero profile_thumb">
                                <i class="fa fa-user aero"></i>
                            </p>
                            <div class="media-body">
                                <p class="title" href="#"><strong>{{ $assignments->title }}</strong> posted by teacher <span><strong>{{ $assignments->teacher->first_name }} {{ $assignments->teacher->last_name }} </strong></span></p>
                                <p style="color: #2B2B2B">
                                    {!! $assignments->description !!}
                                </p>
                                <p> <small> {{ $assignments->created_at->diffForHumans() }} </small>
                                </p>
                            </div>
                        </a>
                    </li>
            </ul>
            @if(!$assignments->file_name == '')
            <table class="table" style="margin-top: -5em">
                <thead>
                <tr>
                    <th scope="col">Action</th>
                    <th scope="col">File name</th>
                    <th scope="col">Teacher</th>
                    <th scope="col">upload date</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row"><a href="{{ asset('uploads/assignment_file/'.$assignments->file_name) }}" target="_blank" class="btn btn-primary btn-xs"><i class="fas fa-download"></i> Download  </a></th>
                    <td>{{ substr($assignments->file_name,0, 50) }}</td>
                    <td>{{ $assignments->teacher->first_name }} {{ $assignments->teacher->last_name }}</td>
                    <td>{{ $assignments->created_at }}</td>
                </tr>

                </tbody>
            </table>
            @else

                <table class="table" style="margin-top: -5em">
                    <thead>
                    <tr>
                        <th scope="col">Action</th>
                        <th scope="col">File name</th>
                        <th scope="col">Teacher</th>
                        <th scope="col">upload date</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">There is no attachment file</th>
                        <td>@no data</td>
                        <td>@no data</td>
                        <td>@no data</td>
                    </tr>

                    </tbody>
                </table>

            @endif

        </div>
    </div>


</div>

<script type="text/javascript" src="{{ asset('colortheme/vendor.js') }}"></script>
<script type="text/javascript" src="{{ asset('colortheme/bundle.js') }}"></script>

</body>

</html>