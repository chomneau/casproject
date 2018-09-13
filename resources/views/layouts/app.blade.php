<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>CAS</title>

    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}">

    <link href="https://fonts.googleapis.com/css?family=Abel|Anton|Squada+One" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet"> {{--Toastr notification--}}
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/themestyle.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{URL::asset('assets/js/action.js')}}"></script>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/datepicker.css') }}" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    {{--Toastr notification--}}
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet"> @yield('styles')


</head>
{{-- #E2EBEF--}}

<body style="background-color: #F8F4F4 ">
    {{--
    @include('inc.navbar')--}}
    @include('inc.navbar') 
    @yield('content')

    <!--
    @include('inc.footer') -->

    <!-- Scripts -->
    @yield('scripts')
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>

    <script>
        @if(Session::has('success'))
                toastr.success("{{Session::get('success')}}")
            @endif

            //$('#date').datepicker()
    </script>

</body>

</html>