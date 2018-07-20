<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{--Toastr notification--}}
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">

    <title>Admin Panel </title>
    @include('admin.style.cs-admin')


</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">

        @include('admin.inc.sidebar')
        @include('admin.inc.top-sidebar')

        @yield('content')

        
    </div>
</div>
@include('admin.inc.footer')
<!-- jQuery -->
@include('admin.style.js-admin')
<script src="{{ asset('js/toastr.min.js') }}"></script>


<script>
    @if(Session::has('success'))
        toastr.success("{{Session::get('success')}}")
    @endif

     @if(Session::has('error'))
        toastr.error("{{Session::get('error')}}")
    @endif




    //$('#date').datepicker()
</script>
</body>
</html>
