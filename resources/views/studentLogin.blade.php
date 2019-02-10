<!DOCTYPE html>
<html lang="en">
<head>
	<title>Cas Management System</title>
	<link rel="shortcut icon" href="{{ asset('images/logo.png') }}">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{asset('StudentLogin/images/icons/favicon.ico')}}"/>
	
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('StudentLogin/vendor/bootstrap/css/bootstrap.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('StudentLogin/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('StudentLogin/fonts/iconic/css/material-design-iconic-font.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('StudentLogin/vendor/animate/animate.css') }}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{asset('StudentLogin/vendor/css-hamburgers/hamburgers.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('StudentLogin/vendor/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('StudentLogin/vendor/select2/select2.min.css') }}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('StudentLogin/vendor/daterangepicker/daterangepicker.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('StudentLogin/css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('StudentLogin/css/main.css') }}">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url({{ asset('StudentLogin/images/bg-01.jpg') }});">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
					{{ csrf_field() }}

					<span class="login100-form-logo">
						<!-- <i class="zmdi zmdi-landscape"></i> -->
						<img src="{{asset('StudentLogin/images/icons/logo.png')}}" alt="" class="rounded-circle" width="120" height="120">
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Student Log in
					</span>



					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="student_id" value="{{ old('student_id') }}" placeholder="Student ID">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>

						@if ($errors->has('student_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('student_id') }}</strong>
                            </span>
                        @endif
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password" required>
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>

						@if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif

					</div>

					<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
							Login
						</button>
					</div>

					<div class="text-center p-t-90">
						<a class="txt1" href="#">
							CAS Management System
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->

	<script src="{{ asset('StudentLogin/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('StudentLogin/vendor/animsition/js/animsition.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('StudentLogin/vendor/bootstrap/js/popper.js') }}"></script>
	<script src="{{ asset('StudentLogin/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('StudentLogin/vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('StudentLogin/vendor/daterangepicker/moment.min.js') }}"></script>
	<script src="{{ asset('StudentLogin/vendor/daterangepicker/daterangepicker.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('StudentLogin/vendor/countdowntime/countdowntime.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('StudentLogin/js/main.js') }}"></script>

</body>
</html>