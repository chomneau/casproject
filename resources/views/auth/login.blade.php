{{-- @extends('layouts.app')

@section('content')

<div class="container" style="margin-top: 10em; margin-bottom: 10em">

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading text-center" style="background-color: #1CE1E8">Student Login</div>
                <div class="space"></div>
                <div class="panel-body" style="margin-top: 2em" >
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('student_id') ? ' has-error' : '' }}">
                            <label for="student_id" class="col-md-4 control-label">Student ID</label>

                            <div class="col-md-6">
                                <input id="student_id" type="text" class="form-control" name="student_id" value="{{ old('student_id') }}"  autofocus>

                                @if ($errors->has('student_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('student_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btnSubmit">
                                    <strong><i class="fa fa-lock" aria-hidden="true"></i></strong>
                                    Login N0w
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
 --}}



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login</title>


<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<link href="{{ asset('css/loginstyle.css') }}" rel="stylesheet">


<style type="text/css">
  html body.bg-full-screen-image { background-image: none !important; }
  body { background-color: #b1e8ffd2 !important; }
    
    .ball {
    position: absolute;
    border-radius: 100%;
    opacity: 0.5;
    }

    .fix{
    position:fixed;
    bottom:0px;
    left:0%;
}

</style>
</head>

<body>
<!-- login page start -->
<div id="app">
    <main class="py-4">

        <div class="container">
            <div class="row justify-content-center" style="margin-top: -5em">
                <div class="col-md-4 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">

                    <div class="card-header-logo mt-top">
                        <div class="row justify-content-center pr-3 pl-3">
                            <figure class="m-0">
                             <h2 style="color: azure"></h2>   
                             <span class="login100-form-logo">
                                <!-- <i class="zmdi zmdi-landscape"></i> -->
                                <img src="{{asset('StudentLogin/images/icons/logo.png')}}" alt="" class="rounded-circle" width="120" height="120" >
                            </span>
                            </figure>

                        </div>

                    </div>

                    <div class="card" style="border-radius: 3px">
                        <div class="card-header card-header-admin">{{ __('CAS SYSTEM') }}</div>


                        <div class="card-body">
                            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}

                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label class="label_login" for="login">
                                            {{ __('Student Login') }}
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group row">

                                    <div class="col-md-12">
                                          <label class="sr-only" for="inlineFormInputGroupUsername">Username</label>
                                            <div class="input-group">
                                              <div class="input-group-prepend">
                                                <div class="input-group-text input-icon">
                                                  <i class="fa fa-user text-white" aria-hidden="true"></i>
                                                </div>
                                              </div>
                                              {{-- <input id="student_id" type="text" class="form-control" input-size name="student_id" value="{{ old('student_id') }}"  autofocus> --}}
                                              <input id="student_id" type="text" class="form-control input-size " name="student_id" value="{{ old('student_id') }}" required  autofocus placeholder="Student ID">

                                            @if ($errors->has('student_id'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('student_id') }}</strong>
                                                </span>
                                            @endif
                                            </div>

											
                                    </div>
                                </div>

                                <div class="form-group row">

                                    <div class="col-md-12">
                                      <label class="sr-only" for="inlineFormInputGroupUsername">Username</label>
                                        <div class="input-group">
                                          <div class="input-group-prepend">
                                            <div class="input-group-text input-icon">
                                              <i class="fa fa-lock text-white" aria-hidden="true"></i>
                                            </div>
                                          </div>
                                          <input id="password" type="password" class="form-control input-size " name="password" required  placeholder="Password">
                                          

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                        </div>

                                        @if ($errors->has('password'))
											<span class="help-block">
												<strong>{{ $errors->first('password') }}</strong>
											</span>
										@endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary glow position-relative w-100">
                                            {{ __('Login') }}
                                        </button>

                                    </div>

                                </div>

                            </form>
                            
                                {{-- <div class="text-center mb-2">
                                        
                                            <small class="text-muted">{{ __('Forgot Your Password? Cantact Administrator') }}</small>
                                        
                                </div> --}}
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <img class="fix" src="{{ asset('images/cas-background.svg') }}" alt="background">

    </main>
</div>


<!-- login page ends -->

<script>
    // Some random colors
const colors = ["#3CC157", "#2AA7FF", "#1B1B1B", "#FCBC0F", "#F85F36"];

const numBalls = 50;
const balls = [];

for (let i = 0; i < numBalls; i++) {
  let ball = document.createElement("div");
  ball.classList.add("ball");
  ball.style.background = colors[Math.floor(Math.random() * colors.length)];
  ball.style.left = `${Math.floor(Math.random() * 100)}vw`;
  ball.style.top = `${Math.floor(Math.random() * 2)}vh`;
  ball.style.transform = `scale(${Math.random()})`;
  ball.style.width = `${Math.random()}em`;
  ball.style.height = ball.style.width;
  
  balls.push(ball);
  document.body.append(ball);
}

// Keyframes
balls.forEach((el, i, ra) => {
  let to = {
    x: Math.random() * (i % 2 === 0 ? -11 : 11),
    y: Math.random() * 12
  };

  let anim = el.animate(
    [
      { transform: "translate(0, 0)" },
      { transform: `translate(${to.x}rem, ${to.y}rem)` }
    ],
    {
      duration: (Math.random() + 1) * 5000, // random duration
      direction: "alternate",
      fill: "both",
      iterations: Infinity,
      easing: "ease-in-out"
    }
  );
});
</script>
</body>
</html>


